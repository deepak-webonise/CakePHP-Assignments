<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:26 PM
 * To change this template use File | Settings | File Templates.
 */
class TypesController extends AppController {

    public function index(){

    }

    public function autoCompleteList(){
        $this->layout='ajax';
        $this->autoRender =false;
        if($this->request->is('ajax')){
            $result = $this->Type->find('list');
            echo json_encode($result);
        }
    }
}