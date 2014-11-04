<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:21 PM
 * To change this template use File | Settings | File Templates.
 */
class Technology extends AppModel {
    public $hasMany = array(
        'Tasks'=> array(
            'className' =>'Task',
            'foreignKey' => 'technology_id'
        )
    );

    public function showAll(){
        return $this->find('all',array(
            'recursive' => 1,
            'fields' => array('id','name')
        ));
    }
}