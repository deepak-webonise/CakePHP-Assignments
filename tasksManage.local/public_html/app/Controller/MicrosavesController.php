<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 7/11/14
 * Time: 2:50 PM
 * To change this template use File | Settings | File Templates.
 */
class MicrosavesController extends AppController{

    public function beforeFilter(){
        $this->Auth->allow('index');
        $this->Auth->allow('logout');
    }
    public function index(){
        $this->layout ='MicroSave.default';
        $this->view='MicroSave.index';
    }
}