<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 5/11/14
 * Time: 2:17 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('UserListener', 'Event');
class UsersController extends AppController {


    public function beforeFilter(){

        parent::beforeFilter();

        $this->Auth->allow('index','logout','add');
        $user = ClassRegistry::init('User');
        $user->getEventManager()->attach(new UserListener());


    }
    public function index(){


    }

    /**
     * Login Action
     */
    public function login() {
        if($this->Session->read('Auth.User')){
                $this->redirect(array('action'=>'dashboard'));
        }
        if ($this->request->is('post')) {
            if(!empty($this->request->data)){
                $userData = $this->User->userAuthenticate($this->request->data);
                if($userData){
                    if ($this->Auth->login($userData)) {
                       $this->redirect(array('controller'=>'users','action'=>'dashboard'));
                    }
                }
                $this->Session->setFlash(__('<p class="text-danger text-center">Invalid username or password.</p>'));
            }
        }
    }

    /**
     * logout action
     */
    public function logout() {

        $this->Auth->logout();

        $this->redirect(array('controller'=>'users','action'=>'login'));

    }

    /**
     * New user registration
     */
    public function add(){

        if($this->request->is('post')){

            if($this->User->addUser($this->request->data)){
                $this->Session->setFlash('<p class="text-success">Successfully Registered</p>');

            } else {

                if(empty($this->User->validationErrors)){
                    $this->Session->setFlash('<p class="text-danger">Unsuccessful, Please Try again.</p>');
                }

            }
        }

    }

    /**
     * User profile edit
     */
    public function edit(){

    }

    /**
     * User Delete
     */
    public function delete(){

    }

    /*
     * Normal user dashboard
     */
    public function dashboard(){
       $user_id = $this->Auth->user('User.id');

       if($user_id == '1'){
           $this->redirect(array('action' => 'adminDashboard'));
       }

       $this->loadModel('Task');
       $this->set('todayTasks',$this->Task->taskByDate());
       $this->set('recentTasks',$this->Task->recentTasks($user_id));


    }

    /*
     * admin dashboard
     */
    public function adminDashboard(){

        $this->loadModel('Task');
        $this->set('todayTasks',$this->Task->taskByDate());
        $this->set('recentTasks',$this->Task->recentTasks());


    }




}

