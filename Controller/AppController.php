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
			$email_validated = $authUser['email_validated'];
			$action = $this->request->params['action'];
			$controller = $this->request->params['controller'];
			
			if(!($controller == 'users' and $action == 'logout')) {
				if(!($controller == 'users' and $action == 'get_mail')) {
					if($email_validated == 0) {
						$this->redirect("/users/get_mail");
					}
				}
				if(!($controller == 'users' and $action == 'confirm')) {
					if($email_validated == 1) {
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
		$this->set('advisors', $this->User->find(
			'list',
			array(
				#TODO username will not be here, it needs to be firstname + lastname
				'fields' => array('id','username'),
				'conditions' => array(
					'role' => 'instructor'
				)
			)
		));
	}
}
