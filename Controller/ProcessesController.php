<?php
App::uses('AppController', 'Controller');
class ProcessesController extends AppController {

	public $components = array('Paginator');

	public function index() {
		$this->Process->recursive = 0;
		$this->set('processes', $this->Paginator->paginate());
	}

	public function manage() {
		$user = $this->Auth->user();
		$process = $this->Process->getStudentProcess($user['id']);
		$this->set(compact('process'));
	}

	public function view($id = null) {
		if (!$this->Process->exists($id)) {
			throw new NotFoundException(__('Invalid process'));
		}
		$options = array('conditions' => array('Process.' . $this->Process->primaryKey => $id));
		$this->set('process', $this->Process->find('first', $options));
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
