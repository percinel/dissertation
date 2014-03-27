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

	public function applyAction($process,$post,$action_user) {
		$update_data = $post['Process'];
		unset($update_data['id']);

		$update_data['step'] = $this->getNextStep($process,$update_data['last_action']);
		$update_data['zone'] = $this->getNextZone($process,$update_data['last_action']);		
		$update_data['last_user'] = $action_user;		

		$this->clear();
		$this->read(null,$process['Process']['id']);
		$this->set($update_data);
		$notificitions_send = array();
		if($this->save()) {
			$notificitions_send = $this->User->Notification->handleNotification($process['Process']['id'],$process,$update_data['last_action']);
		}
		
		#TODO fix validations how do you know about it is being saved.
		return $notificitions_send;
	}

	public function getNextStep($process,$action){
		$current_step_name = $this->getCurrentStepName($process);
		$step_conf = Configure::read('process_road');
		$step_conf = $step_conf[$current_step_name];
		$next_step = $step_conf['actions'][$action]['next-step'];
		$numeric_step = Configure::read('process_steps_num');
		return $numeric_step[$next_step];
	}

	public function getNextZone($process,$action){
		$current_step_name = $this->getCurrentStepName($process);
		$step_conf = Configure::read('process_road');
		$step_conf = $step_conf[$current_step_name];
		$next_zone = $step_conf['actions'][$action]['next-zone'];
		$numeric_zones = Configure::read('process_zones_num');
		return $numeric_zones[$next_zone];
	}

	public function getProcessOwner($process) {
		$process_step = $process['Process']['step'];
		$process_steps = Configure::read('process_steps');	
		$process_step_name = $process_steps[$process_step];
		#project-intent
		$process_road = Configure::read('process_road');
		return $process_road[$process_step_name]['owner'];
		
	}
}
