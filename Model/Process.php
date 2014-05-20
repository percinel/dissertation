<?php
App::uses('AppModel', 'Model');
/**
 * Process Model
 *
 * @property Student $Student
 * @property Advisor $Advisor
 * @property Sreader $Sreader
 * @property Log $Log
 */
class Process extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Log' => array(
			'className' => 'Log',
			'foreignKey' => 'process_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	public function getStudentProcess($student_id) {
		#TODO you should use containable here
		$s = $this->find('first',array(
			'conditions' => array(
				'Process.student_id' => $student_id,
				'Process.is_valid' => 1
			)
		));
		return $s;
	}

	public function copyToLog($process,$user_id) {

		$log = array(
			'Log' => $process['Process'] 
		);

		$log['Log']['process_id'] = $process['Process']['id'];
		unset($log['Log']['id']);
		$this->Log->clear();
		#TODO fix validations
		if($this->Log->save($log)) {
			return true;	
		}
		return false;
	}

	public function handleFileFields($update_data) {

		$all_fields = Configure::read('allfields');
		$filepath = Configure::read('images');
		
		foreach($update_data as $field => $value) {

			if(!empty($all_fields[$field]['file'])) {

				$upload_report = $value; 

				if($upload_report['error'] != 0) {
					return false;
				}

				$file_name = $upload_report['name']. "_" .rand();
				$file_path = $filepath . $file_name;

				if(!move_uploaded_file($upload_report['tmp_name'], $file_path)) {
					return false;
				}
				$update_data[$field] = $file_name;

			}

		}
		return $update_data;
	}

	public function applyAction($process,$post,$action_user) {
		$update_data = $post['Process'];
		unset($update_data['id']);

		$update_data['step'] = $this->getNextStep($process,$update_data['last_action']);
		$update_data['zone'] = $this->getNextZone($process,$update_data['last_action']);		
		$update_data['last_user'] = $action_user;		

		$update_data = $this->handleFileFields($update_data);
		if($update_data === false) {
			return false;
		}

		$this->clear();
		$this->read(null,$process['Process']['id']);
		$this->set($update_data);
		$notificitions_send = array();
		if($this->save()) {
			$notificitions_send = $this->User->Notification->handleNotification($process['Process']['id'], $process, $update_data['last_action']);
			$update_data = $this->copyFields($process['Process']['id'], $process,$update_data['last_action']);

		}
		
		#TODO fix validations how do you know about it is being saved.
		return $notificitions_send;
	}

	public function copyFields($process_id,$process,$last_action) {
		
		$step = $process['Process']['step'];
		$actions = Configure::read('process_actions');
		$step_action = $actions[$step][$last_action];

		if(!isset($step_action['copy-field'])) {
			return true;
		}
		$copy_fields = $step_action['copy-field'];

		$copy_data = array();

		foreach($copy_fields as $copy_source => $copy_target) {
			$copy_data['Process.'.$copy_target] = 'Process.'.$copy_source;
		}

		$this->updateAll(
			$copy_data,
			array('Process.id'=>$process_id)
		);

		





		

		

		





		/**
		Ya file copyalanicaksa onu da dusunup process_actions tan ne neye kopyalanacak ogren 
		**/
		return $step_action['next-step'];
	}


	public function getNextStep($process,$action){
		$step = $process['Process']['step'];
		$actions = Configure::read('process_actions');
		$step_action = $actions[$step][$action];
		return $step_action['next-step'];
	}

	public function getNextZone($process,$action){
		$step = $process['Process']['step'];
		$actions = Configure::read('process_actions');
		$step_action = $actions[$step][$action];
		return $step_action['next-zone'];
	}

	public function getOwnerRole($process) {
		$process_step = $process['Process']['step'];
		$process_road = Configure::read('process_road');
		return $process_road[$process_step]['owner'];
	}
	public function isOwnerRole($role,$process) {
		return $role == $this->getOwnerRole($process);
	}





}
