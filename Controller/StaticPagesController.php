<?php
App::uses('AppController', 'Controller');
/**
 * StaticPages Controller
 *
 * @property StaticPage $StaticPage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StaticPagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StaticPage->recursive = 0;
		$this->set('staticPages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($key = null) {
		$options = array('conditions' => array('StaticPage.key' => $key));
		$static_page = $this->StaticPage->find('first', $options);
		if(empty($static_page)) {
			$this->Session->setFlash(__('There is no page like that.'));
			return $this->redirect(array('controller'=>'users', 'action'=>'home'));
		}

		$this->set(compact('static_page'));
		$this->set('title_for_layout', $static_page['StaticPage']['title']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaticPage->create();
			if ($this->StaticPage->save($this->request->data)) {
				$this->Session->setFlash(__('The static page has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The static page could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($key = null) {
		$authUser = $this->Auth->user();
		if($authUser['role']!='pia') {
			$this->Session->setFlash(__('Editing is disabled for your account'));
			return $this->redirect(array('controller'=>'users', 'action'=>'logout'));
		}
		$options = array('conditions' => array('StaticPage.key' => $key));
		$static_page = $this->StaticPage->find('first', $options);
		$authUser = $this->Auth->user();
		if(empty($static_page)) {
			$this->Session->setFlash(__('There is no page like that.'));
			return $this->redirect(array('controller'=>'users', 'action'=>'home'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->StaticPage->save($this->request->data)) {
				$this->Session->setFlash(__('The static page has been saved.'));
				return $this->redirect(array('action' => 'view',$static_page['StaticPage']['key']));
			} else {
				$this->Session->setFlash(__('The static page could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('StaticPage.key' => $key));
			$this->request->data = $this->StaticPage->find('first', $options);
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
		$this->StaticPage->id = $id;
		if (!$this->StaticPage->exists()) {
			throw new NotFoundException(__('Invalid static page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StaticPage->delete()) {
			$this->Session->setFlash(__('The static page has been deleted.'));
		} else {
			$this->Session->setFlash(__('The static page could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
