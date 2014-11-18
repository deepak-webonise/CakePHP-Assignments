<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 5/11/14
 * Time: 2:20 PM
 * To change this template use File | Settings | File Templates.
 */
class Group extends AppModel {
    public $actAs = array(
        'Acl' => array('type' =>'requester')
    );
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'group_id'
        )
    );

    /**
     * @return null
     * Description : returns null to acl
     */
    public function parentNode(){
        return null;
    }
}