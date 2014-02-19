<?php
App::uses('Controller', 'Controller');

class AppController extends Controller {
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
	}
}
