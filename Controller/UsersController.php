<?php
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','login');
    }

	public function login() {
		if($this->request->is('post')) {
			if($this->Auth->login()){
				
				$user = $this->Auth->user();
				$role = $user['role'];
				
				if($role == 'student'):
					$this->redirect(array('controller'=>'processes','action'=>'manage'));
				elseif($role == 'instructor'):
					$this->redirect(array('controller'=>'processes','action'=>'mystudents'));
				elseif($role == 'pia'):
					$this->redirect(array('controller'=>'users','action'=>'manage'));
				elseif($role == 'bpdk'): 
					$this->redirect(array('controller'=>'users','action'=>'manage'));
				endif; 

				$this->Session->setFlash(__('Something went wrong ERR:101'));
				return $this->redirect($this->Auth->redirect(array(
					'controller'=>'users','action'=>'manage'
				)));
			}
			$this->Session->setFlash(__('Invalid username or passwd, try again'));
		}
	}

	public function home(){
		$user = $this->Auth->user();
		$role = $user['role'];
		
		if($role == 'student'):
			$this->redirect(array('controller'=>'processes','action'=>'manage'));
		elseif($role == 'instructor'):
			$this->redirect(array('controller'=>'users','action'=>'mystudents'));
		elseif($role == 'pia'):
			$this->redirect(array('controller'=>'users','action'=>'manage'));
		elseif($role == 'bpdk'): 
			$this->redirect(array('controller'=>'users','action'=>'manage'));
		endif; 
	}

	public function logout() {
		$this->redirect($this->Auth->logout());
	}


    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The user could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        $this->request->onlyAllow('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}
