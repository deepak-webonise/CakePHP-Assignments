<?php

class PostsController extends AppController {
	public $helpers = array('Html', 'Form');
	public function index() {
		$this->set('posts', $this->Post->findPosts());
	}

	/* To view Post*/
    /**
     * @param null $id
     * @throws NotFoundException
     */
    public function view($id = null) {
		$this->set('post', $this->Post->findByPostId($id));
	}

	/*To add Post*/
    /**
     * @description:
     */
    public function add() {
        if ($this->request->is('post')) {

            if ($this->Post->addPost($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    /**
     * @param null $id
     */

    public function edit($id = null) {
		$post = $this->Post->findByPostId($id);

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->editPost($this->request->data, $id)) {
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}
		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}

    /**
     * @param $id
     * @throws MethodNotAllowedException
     */
    public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Post->deletePost($id)) {
			$this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
			return $this->redirect(array('action' => 'index'));
		}
	}


}