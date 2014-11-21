<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 3/11/14
 * Time: 9:33 AM
 * To change this template use File | Settings | File Templates.
 */
class Category extends AppModel {
    public $hasMany = array (
        'Post' => array(
            'className' => 'Post',
            'foreignKey'=>'category_id'
        )
    );
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );


    /**
     * show all the categories in the blog
     */
    public function showCategories()
    {
       // $this->unbindModel(array('hasMany' => 'Post'));
        return $this->find('all',array(
            'recursive' => -1
        ));
    }

    /**
     * @param $id
     * @return array
     * @throws NotFoundException
     */
    public function showByCategoryId($id=null)
    {
        if(!$id){
            throw new NotFoundException(__('No Posts or Invalid Category'));
        }
        return $this->find('first',array('conditions'=> array('Category.id'=> $id)));
    }

    /**
     * @param $data
     * @return bool
     */
    public function addCategory($data)
    {
        $this->create();
        if($this->save($data)){
            return true;
        }
        return false;
    }
}