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

	public function beforeFilter() {
		$this->set('authUser',$this->Auth->user());
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
