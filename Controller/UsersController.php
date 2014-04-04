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
			$this->Session->setFlash(__('Invalid username or password '),'login_error');
		}
	}

	public function get_mail() {
        if ($this->request->is('post')) {
			$this->User->id = $this->Auth->user('id'); 
            if ($this->User->validates(array('fieldList'=>array('email')))) {
				$email = $this->request->data['User']['email'];
				$email_code = Security::hash(rand(1000,10000000).$email.rand(1000,10000000), NULL, true);
				$message = "You can either follow the <a href='".Router::fullbaseUrl()."/users/confirm/".$email_code."'>link</a><br/>Or you can confirm your email by entering this code $email_code to your ";
				if($this->sendMail($email,'Email Confirmation Link',$message)) {
                	$this->Session->setFlash(__('Please check your mail box , we have send a confirmation link.'));
					$this->User->saveField('email',$email);
					$this->User->saveField('email_code',$email_code);
					$this->User->saveField('email_validated',1);
					$this->Session->write('Auth', $this->User->read(null, $this->Auth->user('id')));
                	return $this->redirect(array('action' => 'confirm'));
				}
                $this->Session->setFlash(__('There is a serious error, please contact with the it help desk'));
            } else {
                $this->Session->setFlash(__('Please enter a valid email account.'));
                return $this->redirect('get_mail');
			}
        }
	}

	public function confirm($passcode = null) {
		if($this->request->is('post')) {
			$passcode = $this->request->data['User']['passcode'];
		}
        if (!is_null($passcode)) {
			$user_count = $this->User->find('count',array(
				'conditions'=>array(
					'User.id' => $this->Auth->user('id'),
					'User.email_code' => $passcode
				)
			));

			#TODO what if we have user_count == 2
			if($user_count == 1) {
				$this->User->id = $this->Auth->user('id'); 
                $this->Session->setFlash(__('You have successfully validated your email'));
				$this->User->saveField('email_validated',2);
				$this->Session->write('Auth', $this->User->read(null, $this->Auth->user('id')));
                return $this->redirect(array('action' => 'home'));
				
			} else {
                $this->Session->setFlash(__('You have a very serious error with your account, please contact with the ithelpdesk'));
                return $this->redirect(array('action' => 'logout'));
			}
        }
	}

	public function home(){
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
