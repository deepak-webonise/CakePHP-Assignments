<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:12 PM
 * To change this template use File | Settings | File Templates.
 */

class Task extends AppModel {

    public $validate = array(
        'title' => array(
            'required'=> 'true',
        ),
        'duration' => array(
            'required' => 'true'
        ),
        'comments' => array(
            'required' => 'true'
        ),
        'technology_id' => array(
            'required' => 'true'
        ),
        'type_id' => array(
            'required' =>'true'
        )
    );
    public $belongsTo = array(
        'Technology' => array(
            'className' => 'Technology',
            'foreignKey' => 'Technology_id'
        ),
        'Type' => array(
            'className' => 'Type',
            'foreignKey' => 'Type_id'
        )
    );
    public $virtualFields = array(
        'task_count' => 'COUNT(id)'
    );

    /**
     * @return array order by date
     */
    public function taskByDate()
    {
        return $this->find('all',array(
            'recursive' => -1,
            'conditions' => array('created=CURDATE()'),
            'fields' => array('id','title','created'),
            'order' => 'created desc',
            'limit' => 10,

        ));
    }

    /**
     * count the number of tasks by grouping created date
     * @return array
     */
    public function taskByGroup(){

        return $this->find('all', array(
           'recursive' => -1,
           'fields' => array('created', 'task_count'),
           'order' => 'created desc',
           'group' => 'created'
        ));
    }

    
    /**
     * @param null $id
     * @return array
     */
    public function taskById($id = null)
    {
        if(!empty($id)){
            return $this->find('first',array(
                'recursive' => -1,
                'condition' => array('Task.id' => $id)
            ));
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function addTask($data) {

        if(!empty($data)){
            $this->create($data);
            $this->set(array('created' => date('Y-m-d'),
            'modified' => date('Y-m-d')));
            if($this->save($data)){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $data
     * @return bool
     */
    public function editTask($data){
        if(!empty($data))
        {
            $this->id = $data['Task']['id'];
            $this->set(array('modified' => date('Y-m-d')));
            $this->save($data);
            return true;
        }
        return false;
    }

    public function deleteTask($id = null)
    {
        if(!empty($id))
        {
            if($this->delete($id)){
                return true;
            }
        }
        return false;
    }

}