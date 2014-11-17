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

    public $paginate = array(

        'limit' => 5,
        'contain' => 'Technology.name',
        'order' => 'Task.created desc'
    );
    /**
     * Description : categories the tasks by date and group
     */
    public function index(){

        $data = Hash::combine($this->Task->taskByGroup(), '{n}.Task.created','{n}.0.task_count');
        $this->set('group',$data);
        $this->set('tasks',$this->Task->taskByDate());


    }

    public function listTasks(){

        $this->Paginator->paginate('Task');

       // $this->set('tasks2',$this->Task->listTasks());
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

        $this->loadModel('Technology');
        $this->loadModel('Type');
        /*Load Technologies*/
        $technologies = $this->Technology->find('list');
        $this->set(compact('technologies'));

        /*Load Types*/
        $types = $this->Type->find('list');
        $this->set(compact('types'));

        if($this->request->is('post')){
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
                $this->Session->setFlash('Task Deleted Successfully');
                return $this->redirect(array('action'=>'listTasks'));
            }
        }
    }


}