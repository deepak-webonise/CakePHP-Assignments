<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 3/11/14
 * Time: 9:35 AM
 * To change this template use File | Settings | File Templates.
 */
class CategoriesController extends AppController {
    public $helpers = array('Html', 'Form');
    public function index()
    {
         $this->set('categories', $this->Category->showCategories());
    }
    public function view($id=null)
    {
        $this->set('posts', $this->Category->showByCategoryId($id));
    }
    public function add()
    {
        if($this->request->is('post')){
            if($this->Category->addCategory($this->request->data)){
                $this->Session->setFlash('Added Successfully');
            }
        }

    }
}