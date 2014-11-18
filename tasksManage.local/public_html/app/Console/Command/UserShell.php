<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 12/11/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AppShell', 'Console/Command');
class UserShell extends AppShell{
    public $uses = array('User');

    public function notify(){
       // $this->User->notify();
    }
}