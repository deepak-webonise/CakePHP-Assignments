<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 12/11/14
 * Time: 6:34 PM
 * To change this template use File | Settings | File Templates.
 */
App::uses('CakeEventListener', 'Event');

class UserListener implements CakeEventListener{

    public function implementedEvents(){
        return array(
            'Model.User.afterNotify' => 'userNote'
        );
    }

    public function userNote(){
        CakeResque::enqueue(
            'default',
            'UserShell',
            array('notify'),1
        );
    }

}