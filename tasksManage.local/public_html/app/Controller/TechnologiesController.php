<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:20 PM
 * To change this template use File | Settings | File Templates.
 */
class TechnologiesController extends AppController {



    public function index(){
       $this->set('technologies', $this->Technology->showAll());
    }

    public function add(){
        if($this->request->is('post')){
            if($this->Technology->addTechynology($this->request->data)){
                $this->Session->setFlash('<p class="text-success">Successfully Added</p>');
                $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash('<p class="text-danger">Unsuccessfull to save. Please Try again.</p>');
        }

    }

    public function edit($id = null){

        $tech = $this->Technology->findTechById($id);
        if(empty($tech) || $tech == null){
            throw new NotFoundException(__('Invalid Technology'));
        }
        if($this->request->is(array('post','put'))){

            if($this->Technology->editTechnology($this->request->data)){
                $this->Session->setFlash('<p class="text-success">Updated Successfully</p>');
                $this->redirect(array('action'=>'index'));

            }
            $this->Session->setFlash('<p class="text-danger">Unsuccessful. Please Try once again.</p>');
        }

        if(empty($this->request->data)){
            $this->request->data = $tech;
        }


    }

    public function delete($id = null){


        if($this->request->is('get')){
            $this->Session->setFlash('Invalid Operation');
            return $this->redirect(array('action'=>'index'));
        }
        if($id){
            if($this->Technology->deleteTechnology($id)){
                $this->Session->setFlash('Technology Deleted Successfully');
                $this->redirect(array('action'=>'index'));
            }
        }
        $this->Session->setFlash('Technology Deleted Unsuccessfully');
        $this->redirect(array('action'=>'index'));

    }

}