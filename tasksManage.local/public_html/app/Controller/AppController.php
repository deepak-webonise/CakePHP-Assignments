<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Security',
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers/')
            ),
            'authenticate' => array('Form'=> array ('userModel' => 'User')),
        ),

        'Session'
    );

     public function beforeFilter(){

       $this->Security->blackHoleCallback = 'blackhole';
       $user = $this->Session->read('Auth.User');

        if($user) {

            $aco = 'controllers/'.Inflector::camelize($this->request->controller);
            $aro = array('model'=>'Group','foreign_key'=> $user['User']['group_id']);
            if($this->Acl->check($aro,$aco)){

                return;
            }
            $this->Session->setFlash('<p class="text-danger">Permission Denied</p>');
        }

     }

    public function blackhole($type){

        switch($type){
            case 'auth':
                $this->Session->setFlash('<p class="text-danger">Permission Denied</p>');
                break;
        }

    }


}
