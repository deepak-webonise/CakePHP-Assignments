<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 12/11/14
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('AppShell', 'Console/Command');
App::uses('CakeEmail', 'Network/Email');
class UserShell extends AppShell{

    public $uses = array('User');

    public function notify(){
        $Email = new CakeEmail();
        $Email->from(array('deepakkabbur@gmail.com' => 'Webonise'));
        $Email->to('deepak.kabbur@weboniselab.com');
        $Email->subject('testing mail');
        $Email->send('Welcome');

        $this->log($this->Email->smtpError, 'debug');
    }
}