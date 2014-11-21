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

    /**
     * @return array
     * Description : Display all the technologies
     */
    public function showAll(){
        return $this->find('all',array(
            'recursive' => -1,
            'fields' => array('id','name')
        ));
    }

    /**
     * @param $data
     * @return bool
     */
    public function addTechynology($data){

        if(!empty($data)){
            $this->create($data);
            if($this->save()){
                return true;
            }
        }
        return false;

    }

    /**
     * @param null $id
     * @return array
     */
    public function findTechById($id=null){

        if(!empty($id)){
            return $this->find('first',array(
                'recursive' => -1,
                'conditions' => array('Technology.id'=> $id),
                'fields' =>array('id',  'name')
            ));
        }

    }

    /**
     * @param $data
     * @return bool
     */

    public function editTechnology($data){
        if(!empty($data)){
            $this->set(array('modified' => date('Y-m-d')));
            if($this->save($data)){
                return true;
            }
        }
        return false;

    }


    /**
     * @param null $id
     * @return bool
     */
    public function deleteTechnology($id = null){

        if(!empty($id)){

            if($this->delete($id,true)){
                return true;
            }

        }
        return false;
    }
}