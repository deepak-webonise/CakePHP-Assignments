<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:09 PM
 * To change this template use File | Settings | File Templates.
 */
class TasksController extends AppController {


    public function index(){
        $this->set('tasks',$this->Task->taskByDate());
        $this->set('group',$this->Task->taskByGroup());
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
                    $this->Session->setFlash("Task added successfully.");
                    return $this->redirect(array('action'=>'index'));
                }
            }
        }
    }

    /**
     * @param null $id
     * @throws NotFoundException
     * update tasks
     */
    public function edit($id = null){
        $this->loadModel('Technology');
        $this->loadModel('Type');
        /*Load Technologies*/
        $technologies = $this->Technology->find('list');
        $this->set(compact('technologies'));

        /*Load Types*/
        $types = $this->Type->find('list');
        $this->set(compact('types'));

        $task = $this->Task->findById($id);

        if(!$task){
            throw new NotFoundException(__('Invalid Post'));
        }
        if($this->request->is(array('post','put'))){
            if($this->Task->editTask($this->request->data)){
                $this->Session->setFlash('Updated Successfully');
                $this->redirect(array('action'=>'index'));
            }
        }

        if(!$this->request->data)
        {
            $this->request->data = $task;
        }
    }

    public function view($id=null)
    {
       if(!$id){
           throw new NotFoundException(__('Invalid Post'));
       }
        $this->set('task',$this->Task->taskById($id));
    }

    public function delete($id= null)
    {
        if($this->request->is('get')){
            throw new MethodNotAllowedException(__('Not Allowed to Delete'));
        }
        if($id){
            if($this->Task->deleteTask($id)){
                $this->Session->setFlash('Task Deleted Successfully');
                return $this->redirect(array('action'=>'index'));
            }
        }
    }


}