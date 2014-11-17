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
            'rule' => array('minLength',5),
            'required' =>true,
            'allowEmpty'=> false,
            'message' => 'Please enter valid title'
        ),
        'duration' => array(
            'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Please enter valid numeric number'
            )
        ),
        'comments' => array(
            'rule' => array('minLength',5),
            'required' => true,
            'message' => 'Please enter valid comments'
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

    public $actAs = array('Containable','SearchMaster.Searchable');


    /**
     * @return array order by date
     * Description : return current date tasks
     */
    public function taskByDate()
    {
        return $this->find('all',array(
            'recursive' => -1,
            'conditions' => array('created=CURDATE()'),
            'fields' => array('id','title','created'),
            'order' => 'created desc',
            'limit' => 5

        ));
    }

    public function listTasks(){

        return $this->find('all',array(
            'recursive' => -1,
            'fields'=> array('id','title','created'),
            'order' => 'created desc'
        ));

    }

    /**
     * count the number of tasks by grouping created date
     * @return array
     */
   /* public $virtualFields = array(
        'task_count' => 'COUNT(Task.id)'
    );*/
    public function taskByGroup(){

         return $this->find('all', array(
           'recursive' => -1,
           'fields' => array('created', '(COUNT(Task.id)) as task_count'),
           'order' => 'created desc',
           'group' => 'created',
           'limit' => 5

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
                'conditions' => array('Task.id' => $id),
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

    /**
     * @return array
     * Description : Return recent 7 days tasks
     */
    public function recentTasks(){
        $toDateObj = new DateTime();
        $toDateObj->sub(date_interval_create_from_date_string('1 days'));
        $toDate = $toDateObj->format('Y-m-d');
        $fromDateObj = new DateTime();
        $fromDateObj->sub(date_interval_create_from_date_string('7 days'));
        $fromDate = $fromDateObj->format('Y-m-d');
        $condition = "created BETWEEN ' ".$fromDate."' AND '".$toDate." '";

        return $this->find('all',array(
            'recursive' => -1,
            'conditions' => array($condition),
            'fields' => array('id','title','created'),
            'order' => 'created desc',


        ));
    }

}