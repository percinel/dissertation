<?php
App::uses('AppModel', 'Model');
/**
 * Log Model
 *
 * @property Student $Student
 * @property Advisor $Advisor
 * @property Sreader $Sreader
 * @property Process $Process
 */
class Log extends AppModel {

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
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Advisor' => array(
			'className' => 'Advisor',
			'foreignKey' => 'advisor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Sreader' => array(
			'className' => 'Sreader',
			'foreignKey' => 'sreader_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Process' => array(
			'className' => 'Process',
			'foreignKey' => 'process_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
