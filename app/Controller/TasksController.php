<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:09 PM
 * To change this template use File | Settings | File Templates.
 */
class TasksController extends AppController {

    public $components = array('Paginator');

    public $presetVars = array(
        'title' => array(
            'type' => 'like'
        )
    );



    /**
     * Description : categories the tasks by date and group
     */
    public function index(){
        $result = $this->Task->groupByDate();
        $data = Hash::combine($this->Task->taskByGroup(), '{n}.Task.created','{n}.0.task_count');
        $this->set('group',$data);
    }

    /**
     * Description : return list of tasks
     */
    public function listTasks(){

        $user_id = $this->Auth->user('User.id');

        if($user_id == 1){
            $this->redirect(array('action'=>'adminListTasks'));
        }
        $condition = array('user_id = '.$user_id);

        $technologies = $this->Task->Technology->find('list');
        $this->set(compact('technologies'));

        /*Load Types*/
        $types = $this->Task->Type->find('list');
        $this->set(compact('types'));

        // Setting search options

        if($this->request->is('post')){

            if(!empty($this->request->data['type_id'])){
                if(count($condition) >= 1){
                    $condition[count($condition)] = 'Task.type_id ='.$this->request->data['type_id'];
                }
                else{
                    $condition[0]  = 'Task.type_id ='.$this->request->data['type_id'];
                }
            }
            if(!empty($this->request->data['technology_id'])){
                if(count($condition) >= 1){
                    $condition[count($condition)] = ' Task.technology_id ='.$this->request->data['technology_id'];
                }
                else{
                    $condition[0]  = 'Task.technology_id ='.$this->request->data['technology_id'];
                }
            }
            if(!empty($this->request->data['created'])){
                if(count($condition) >= 1){
                    $condition[count($condition)] = "Task.created LIKE '".$this->request->data['created']." %' ";
                }
                else{
                    $condition[0]  = "Task.created LIKE  '".$this->request->data['created']." %' ";
                }
            }

        }

        $this->paginate = array(
            'limit' => 5,
            'fields' => array('Task.id','Task.title','Task.created','Technology.name','Type.name'),
            'conditions' => $condition,
            'order' => 'Task.created desc'
        );

        $this->set('tasksList',$this->paginate());


    }

    /**
     * Description : Display all tasks to admin
     */
    public function adminListTasks(){

        $condition = array();

        $technologies = $this->Task->Technology->find('list');
        $this->set(compact('technologies'));

        /*Load Types*/
        $types = $this->Task->Type->find('list');
        $this->set(compact('types'));

        if($this->request->is('post')){

            if(!empty($this->request->data['type_id'])){
                if(count($condition) >= 1){
                    $condition[count($condition)] = 'Task.type_id ='.$this->request->data['type_id'];
                }
                else{
                    $condition[0]  = 'Task.type_id ='.$this->request->data['type_id'];
                }
            }
            if(!empty($this->request->data['technology_id'])){
                if(count($condition) >= 1){
                    $condition[count($condition)] = ' Task.technology_id ='.$this->request->data['technology_id'];
                }
                else{
                    $condition[0]  = 'Task.technology_id ='.$this->request->data['technology_id'];
                }
            }
            if(!empty($this->request->data['created'])){
                if(count($condition) >= 1){
                    $condition[count($condition)] = "Task.created =  ' ".$this->request->data['created']." ' ";
                }
                else{
                    $condition[0]  = "Task.created =  ' ".$this->request->data['created']." ' ";
                }
            }

        }

        $this->paginate = array(
            'limit' => 5,
            'fields' => array('Task.id','Task.title','Task.created','Technology.name','Type.name','User.username'),
            'conditions' => $condition,
            'order' => 'Task.created desc'
        );

        $this->set('tasksList',$this->paginate());
    }

    /**
     * Allow index action to all
     */

    public function beforeFilter(){
        $this->Auth->allow('index', 'view','listTasks');
    }

    /**
     * Add new task
     */
    public function add(){

        $user_id = $this->Auth->user('User.id');


        /*Load Technologies*/
        $technologies = $this->Task->Technology->find('list');
        $this->set(compact('technologies'));

        /*Load Types*/
        $types = $this->Task->Type->find('list');
        $this->set(compact('types'));

        if($this->request->is('post')){
            $this->request->data['Task']['user_id'] = $user_id;
            if(!empty($this->request->data)){
                if($this->Task->addTask($this->request->data)){
                    $this->Session->setFlash('<p class="text-success">Task added successfully.</p>');
                    return $this->redirect(array('action'=>'listTasks'));
                }
            }
            $this->Session->setFlash('<p class="text-danger">Unsuccessul to add new task. Try Again.</p>');
        }
    }


    /**
     * @param null $id
     * @throws NotFoundException
     * Description : update tasks
     */
    public function edit($id = null){

        /*Load Technologies*/
        $technologies = $this->Task->Technology->find('list');
        $this->set(compact('technologies'));

        /*Load Types*/
        $types = $this->Task->Type->find('list');
        $this->set(compact('types'));

        $task = $this->Task->findById($id);

        if(empty($task)){
            throw new NotFoundException(__('Invalid Post'));
        }
        if($this->request->is(array('post','put'))){
            if($this->Task->editTask($this->request->data)){
                $this->Session->setFlash('<p class="text-success">Updated Successfully</p>');
                $this->redirect(array('action'=>'listTasks'));
            }
            $this->Session->setFlash('<p class="text-danger">Updated Unsuccessful.</p>');

        }

        if(empty($this->request->data))
        {
            $this->request->data = $task;
        }
    }


    /**
     * @param null $id
     * @throws NotFoundException
     */
    public function view($id=null)
    {
       if(!empty($id)){
           $task = $this->Task->taskById($id);
           if(!empty($task)){
               $this->set('task',$task);
           }
           else{
               $this->Session->setFlash('<p class="text-danger">Please select valid task from following</p>');
               $this->redirect(array('action'=>'listTasks'));
           }

       }
       else
       {
           $this->Session->setFlash('<p class="text-danger">Please select valid task from following</p>');
           $this->redirect(array('action'=>'listTasks'));
       }


    }


    /**
     * @param null $id
     * @throws MethodNotAllowedException
     */
    public function delete($id= null)
    {
        if($this->request->is('get')){
            throw new MethodNotAllowedException(__('Not Allowed to Delete'));
        }
        if($id){
            if($this->Task->deleteTask($id)){
                $this->Session->setFlash('<p class="text-success">Task Deleted Successfully</p>');
                return $this->redirect(array('action'=>'listTasks'));
            }
            else{
                $this->Session->setFlash('<p class="text-success">Unsuccessfull to Delete</p>');
                return $this->redirect(array('action'=>'listTasks'));
            }
        }
    }


}