<?php
/
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
/* ADD, delete and edit Blog Posts*/
class AppController extends Controller {
	public $helpers = array(’Html’, ’Form’);
	public function index() {
		$this->set(’posts’, $this->Post->find(’all’));
	}
	/* To view Post*/
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__(’Invalid post’));
		}
		$post = $this->Post->findById($id);
		if (!$post) {
		throw new NotFoundException(__(’Invalid post’));
		}
		$this->set(’post’, $post);
	}

}

