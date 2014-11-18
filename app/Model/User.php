<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 5/11/14
 * Time: 2:18 PM
 * To change this template use File | Settings | File Templates.
 */

class User extends AppModel{

    public $userGroup;

    public $validate = array(
        'username' => array(
            'isUnique' => array(
                'rule' => 'isUnique',
                'required'=>true,
                'message'=>'Username already taken. Please try other'
            ),
            'between' => array(
                'rule' => array('between',6,10),
                'message' => 'Username Must be between 6-10 characters'
            ),

        ),
        'password' => array(
            'between' => array(
                    'rule' => array('between',6,20),
                    'required'=>true,
                    'message'=>'Password length must be between 6-20 characters'
            )
        ),
        'email' => array(
           'isUnique' => array(
                'rule' => 'isUnique',
                'required'=>true,
                'message'=>'Email already taken. Please try other'
           )

        )
    );

    public $actsAs = array('Acl'=>array('type'=>'requester','enable'=>'false'));

    public $belongsTo = array(
        'Group' => array(
            'className'=>'Group',
        )
    );

    public $hasMany = array(
        'Task' => array(
            'className' => 'Task',
            'foreignKey' => 'user_id'
        )
    );

    /**
     * @return array|null
     */
    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    /**
     * @return array
     * Description : Bind model with Group and Group wise user permission check.
     */

    public function bindNode($user) {
        //$data = AuthComponent::user();

        return array('model' => 'Group', 'id' => $user['User']['User']['group_id'] );
    }

    /**
     * @param null $data
     * @return bool
     */
    public function addUser($data = null){

       $data['User']['group_id']= 2;

       if(!empty($data)){
           $this->create($data);
           if($this->save($data)){
               return true;
           }
       }
        //debug($this->validationErrors); die();
       return false;
    }

    /**
     * @param $username
     * @return array
     */
    public function getGroupId($username){

        $result = $this->find('first', array(
            'conditions'=> array('User.username' => $username),
            'recursive' => -1,
            'fields' => array('User.group_id')
        ));

        return $result;
    }

    /**
     * @param null $data
     * @return bool
     * Description : validate user credentials for login.
     */
    public function userAuthenticate($data = null){

        if(!empty($data)){

            $condition = array (
                'username' => $data['User']
            );
            $result = $this->find('first',array(
                'recursive' => -1,
                'conditions' => $data['User']

            ));
            if($result){

                return $result;
            }
        }

        return false;

    }

    /**
     * send user notification
     */
    public function notify(){

        $this->getEventManager()->dispatch(new CakeEvent('Model.User.afterNotify',$this));
        return;

    }

}