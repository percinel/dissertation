<?php
App::uses('AppModel', 'Model');
/**
 * Notification Model
 *
 * @property User $User
 */
class Notification extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'message' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'read' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function handleNotification($process_id,$process,$action){
		$current_step_name = $process['Process']['step'];
		$step_conf = Configure::read('process_road');
		$step_conf = $step_conf[$current_step_name];
		if(!isset($step_conf['actions'][$action]['notify'])) {
			return true;
		}
		$notification_arr = $step_conf['actions'][$action]['notify'];

		$current_process = $this->User->Process->find('first',array(
			'conditions' => array(
				'Process.id' => $process_id
			)
		));
		
		$notification_ids = array();
		foreach($notification_arr as $who => $n) {
			$message = $n['message'] . "<br/>";
			$url = Configure::read('dissertation_url').$n['url'];
			if($n['includeId']) {
				$url = $url ."/" .$process_id;
			}
			$this->create();
			$notification = array(
				'Notification' => array(
					'user_id' => $current_process['Process'][$who],
					'message' => "Proje sahibi:".$current_process['User']['username'] ."<br/>". $message . "Kontrol <a href='".$url."'>linki</a>," 
				)
			);
			$this->save($notification);
			$notification_ids[] = $this->id;
		}
		return $notification_ids;
	}
}
