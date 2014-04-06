<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $helpers = array('Form', 'Html', 'Js', 'Time','Diss');
	public $components = array(
		'DebugKit.Toolbar',
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'users',
                'action' => 'home'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login',
            )
        )
	); 

	public function sendMail($email,$subject,$message) {
		$Email = new CakeEmail('gmail');
		$Email->from(array('bilgi-dissertation@bilgi.edu.tr' => 'Bilgi University Dissertation Management'));
		$Email->to($email);
		$Email->subject($subject);
		return $Email->send($message);
	}

	public function beforeFilter() {
		$authUser = $this->Auth->user();
		if(!empty($authUser)) {
			$action = $this->request->params['action'];
			$controller = $this->request->params['controller'];
			if(!($controller == 'users' and $action == 'logout')) {
				$email_validated = $authUser['email_validated'];
				if($email_validated == 0) {
					if(!($controller == 'users' and $action == 'get_mail')) {
						$this->redirect("/users/get_mail");
					}
				}
				if($email_validated == 1) {
					if(!($controller == 'users' and $action == 'confirm')) {
						$this->redirect("/users/confirm");
					}
				}
			}

		}

		
		App::uses('CakeEmail', 'Network/Email');


		$this->set('authUser',$authUser);
		$this->set('zones', Configure::read('process_zones'));
		$this->set('steps', Configure::read('process_steps'));
		$this->set('zone_translations', Configure::read('process_zones_translations'));
		$this->set('process_road', Configure::read('process_road'));
		$this->loadModel('User');
		$advisors =  $this->User->find(
			'list',
			array(
				#TODO username will not be here, it needs to be firstname + lastname
				'fields' => array('id','username'),
				'conditions' => array(
					'role' => 'instructor'
				)
			)
		);
		array_unshift($advisors,"Henuz Belirlenmemis");
		$this->set('advisors',$advisors);
		$sreaders =  $this->User->find(
			'list',
			array(
				#TODO username will not be here, it needs to be firstname + lastname
				'fields' => array('id','username'),
				'conditions' => array(
					'role' => 'instructor'
				)
			)
		);
		array_unshift($sreaders,"Henuz Belirlenmemis");
		$this->set('sreaders',$sreaders);


		if(!empty($authUser)) {
			$this->set('notification_count',$this->User->Notification->find(
				'count',
				array(
					'conditions'=>array(
						'Notification.user_id' => $authUser['id'],
						'Notification.read' => 0,
					)
				)
			));
		}
	}
}
