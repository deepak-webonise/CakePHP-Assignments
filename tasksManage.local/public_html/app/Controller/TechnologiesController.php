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
}