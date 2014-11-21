<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 3/11/14
 * Time: 11:24 AM
 * To change this template use File | Settings | File Templates.
 */
class User extends AppModel {
    public $hasMany = array(
        'Posts' => array(
            'className' => 'Post',
            'foreignKey' => 'user_id'
        ),
        'Category' => array(
            'className'=>'Category',
            'foreignKey'=>'user_id'
        )
    );

    /**
     * @param null $data
     * @return bool
     * @throws ErrorException
     */
    public function addUser($data = null)
    {

        $this->create();
        if($this->save($data))
        {
            return true;
        }
        return false;
    }
}