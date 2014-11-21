<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:27 PM
 * To change this template use File | Settings | File Templates.
 */
class Type extends AppModel {
    public $hasMany = array(
        'Task' => array(
            'className' => 'Task',
            'foreignKey' => 'type_id'
        )
    );
}