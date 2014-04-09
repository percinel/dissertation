<?php
App::uses('AppController', 'Controller');
/**
 * Resumes Controller
 *
 * @property Resume $Resume
 * @property PaginatorComponent $Paginator
 */
class ResumesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Resume->recursive = 0;
		$this->set('resumes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($userid = null) {
		$resume = $this->Resume->find('first',array(
			'conditions'=>array(
				'Resume.user_id'=>$userid,
			)
		));
		if(empty($resume)) {
			$this->Session->setFlash(__('There is no resume found for your name'),'login_error');
			return $this->redirect(array('controller'=>'users','action' => 'logout'));
		}
		
		$this->set(compact('resume'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Resume->create();
			if ($this->Resume->save($this->request->data)) {
				$this->Session->setFlash(__('The resume has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.'));
			}
		}
		$users = $this->Resume->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit() {
		if($this->Auth->user('role') != 'instructor') {
			$this->Session->setFlash(__('Only instructors allowed !!'),'login_error');
			return $this->redirect(array('controller'=>'users','action' => 'logout'));
		}

		$resume = $this->Resume->find('first',array(
			'conditions'=>array(
				'Resume.user_id'=>$this->Auth->user('id'),
			)
		));

		if(empty($resume)) {
			$this->Session->setFlash(__('There is no resume found for your name'),'login_error');
			return $this->redirect(array('controller'=>'users','action' => 'logout'));
		}


		if ($this->request->is(array('post', 'put'))) {
			$this->request->data['Resume']['user_id'] = $resume['Resume']['user_id'];
			if ($this->Resume->save($this->request->data)) {
				$this->Resume->User->Notification->sendSaveCv($this->Auth->user('firstname')." ".$this->Auth->user('lastname'),9);

				$this->Session->setFlash(__('The resume has been saved.'));
				return $this->redirect(array('controller'=>'resumes', 'action' => 'view', $resume['Resume']['user_id']));
			} else {
				$this->Session->setFlash(__('The resume could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $resume;
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Resume->id = $id;
		if (!$this->Resume->exists()) {
			throw new NotFoundException(__('Invalid resume'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Resume->delete()) {
			$this->Session->setFlash(__('The resume has been deleted.'));
		} else {
			$this->Session->setFlash(__('The resume could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
