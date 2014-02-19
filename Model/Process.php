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

		$log['Log']['process_id'] = $current_process['Process']['id'];
		$log['Log']['last_user'] = $user_id;
		unset($log['Log']['id']);
		$this->Process->Log->clear();
		#TODO fix validations
		if($this->Process->Log->save($log)) {
			return true;	
		}
		return false;
	}

}
