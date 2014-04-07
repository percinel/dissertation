<?php
App::uses('AppController', 'Controller');
class ProcessesController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->Process->recursive = 0;
		$this->set('processes', $this->Paginator->paginate());
	}

	public function srstudents() {
		#TODO only instructors allowed here
		$user_id = $this->Auth->user('id');
		$processes = $this->Process->find('all',array('conditions'=>array(
			'Process.sreader_id'=>$user_id
		)));
		$this->set(compact('processes'));
	}

	public function allstudents() {
		#TODO only instructors allowed here
		$user_id = $this->Auth->user('id');
		$processes = $this->Process->find('all',array('conditions'=>array(
			'Process.pia_id'=>$user_id
		)));
		$this->set(compact('processes'));
	}

	public function mystudents() {
		#TODO only instructors allowed here
		$user_id = $this->Auth->user('id');
		$processes = $this->Process->find('all',array('conditions'=>array(
			'Process.advisor_id'=>$user_id
		)));
		$this->set(compact('processes'));
	}

	public function manage() {
		$user = $this->Auth->user();
		$process = $this->Process->getStudentProcess($user['id']);
		$this->set(compact('process'));
		if(!$this->Process->isOwnerRole('student',$process)) {
			$this->render('viewprocess');
		}
	}

	public function imanage($id=null) {
		$user = $this->Auth->user();
		$process = $this->Process->find('first',array('conditions' => array('Process.id'=>$id)));
		$this->set(compact('process'));
		if(!$this->Process->isOwnerRole('instructor',$process)){
			$this->render('viewprocess');
		}
	}

	public function pmanage($id=null) {
		$user = $this->Auth->user();
		$process = $this->Process->find('first',array('conditions' => array('Process.id'=>$id)));
		$this->set(compact('process'));
		if(!$this->Process->isOwnerRole('pia',$process)){
			$this->render('viewprocess');
		}
	}

	public function srmanage($id=null) {
		$user = $this->Auth->user();
		$process = $this->Process->find('first',array('conditions' => array('Process.id'=>$id)));
		$this->set(compact('process'));
		if(!$this->Process->isOwnerRole('sreader',$process)){
			$this->render('viewprocess');
		}
	}

	public function view($id = null) {
		if (!$this->Process->exists($id)) {
			throw new NotFoundException(__('Invalid process'));
		}
		$options = array('conditions' => array('Process.' . $this->Process->primaryKey => $id));
		$this->set('process', $this->Process->find('first', $options));
	}

	# is only for pia
	public function srdecide() {
		if ($this->request->is('post')) {
			$post = $this->request->data;
			$student_id = $this->Auth->user('id');

			$current_process = $this->Process->find('first',array('conditions' => array('Process.' . $this->Process->primaryKey => $post['Process']['id'])));

			#copy to log
			if(!$this->Process->copyToLog($current_process,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'srstudents'));
			}

			if(!$this->Process->applyAction($current_process,$post,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'srstudents'));
			}
			$this->Session->setFlash(__('Ok you are done'));
			return $this->redirect(array('action' => 'srstudents'));
		}
	}
	# is only for pia
	public function pdecide() {
		if ($this->request->is('post')) {
			$post = $this->request->data;
			$student_id = $this->Auth->user('id');

			$current_process = $this->Process->find('first',array('conditions' => array('Process.' . $this->Process->primaryKey => $post['Process']['id'])));

			#copy to log
			if(!$this->Process->copyToLog($current_process,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'allstudents'));
			}

			if(!$this->Process->applyAction($current_process,$post,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'allstudents'));
			}
			$this->Session->setFlash(__('Ok you are done'));
			return $this->redirect(array('action' => 'allstudents'));
		}
	}
	# is only for students
	public function idecide() {
		if ($this->request->is('post')) {
			$post = $this->request->data;
			$student_id = $this->Auth->user('id');

			$current_process = $this->Process->find('first',array('conditions' => array('Process.' . $this->Process->primaryKey => $post['Process']['id'])));


			#copy to log
			if(!$this->Process->copyToLog($current_process,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'mystudents'));
			}

			if(!$this->Process->applyAction($current_process,$post,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'mystudents'));
			}
			$this->Session->setFlash(__('Ok you are done'));
			return $this->redirect(array('action' => 'mystudents'));
		}
	}
	# is only for students
	public function decide() {
		if ($this->request->is('post')) {
			$post = $this->request->data;
			$student_id = $this->Auth->user('id');

			#validation if this process is for this student
			$current_process = $this->Process->getStudentProcess($student_id);	
			if($current_process['Process']['id'] != $post['Process']['id'] || $current_process['Process']['student_id'] != $student_id):
				#TODO fix turkish traslations
				$this->Session->setFlash(__('You can not manage this dissertation process'));
				return $this->redirect(array('action' => 'manage'));
			endif;

			#copy to log
			if(!$this->Process->copyToLog($current_process,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'manage'));
			}

			if(!$this->Process->applyAction($current_process,$post,$student_id)){
				$this->Session->setFlash(__('This is a serious error, please contact to the developers.'));
				return $this->redirect(array('action' => 'manage'));
			}
			return $this->redirect(array('action' => 'manage'));
		}
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Process->create();
			if ($this->Process->save($this->request->data)) {
				$this->Session->setFlash(__('The process has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The process could not be saved. Please, try again.'));
			}
		}
		$students = $this->Process->Student->find('list');
		$advisors = $this->Process->Advisor->find('list');
		$sreaders = $this->Process->Sreader->find('list');
		$this->set(compact('students', 'advisors', 'sreaders'));
	}

	public function edit($id = null) {
		if (!$this->Process->exists($id)) {
			throw new NotFoundException(__('Invalid process'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Process->save($this->request->data)) {
				$this->Session->setFlash(__('The process has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The process could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Process.' . $this->Process->primaryKey => $id));
			$this->request->data = $this->Process->find('first', $options);
		}
		$students = $this->Process->Student->find('list');
		$advisors = $this->Process->Advisor->find('list');
		$sreaders = $this->Process->Sreader->find('list');
		$this->set(compact('students', 'advisors', 'sreaders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Process->id = $id;
		if (!$this->Process->exists()) {
			throw new NotFoundException(__('Invalid process'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Process->delete()) {
			$this->Session->setFlash(__('The process has been deleted.'));
		} else {
			$this->Session->setFlash(__('The process could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
