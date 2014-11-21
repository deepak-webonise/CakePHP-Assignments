<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 3/11/14
 * Time: 11:23 AM
 * To change this template use File | Settings | File Templates.
 */

class UsersController extends AppController {

    public function index(){

    }

    public function register()
    {

        if($this->request->is('post')){


            if($this->User->addUser($this->request->data))
            {
                $this->Session->setFlash(__('Registered Successfully'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Registered Unsuccessfully'));
        }

    }
}