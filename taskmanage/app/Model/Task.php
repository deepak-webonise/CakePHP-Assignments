<?php
/**
 * Created by JetBrains PhpStorm.
 * User: root
 * Date: 4/11/14
 * Time: 2:12 PM
 * To change this template use File | Settings | File Templates.
 */

class Task extends AppModel {

     /*public $validate = array(
         'title' => array(
             'rule' => array('minLength',4),
             'required' =>true,
             'allowEmpty'=> false,
             'message' => 'Please enter valid title'
         )
    );*/

    public $belongsTo = array(
        'Technology' => array(
            'className' => 'Technology',
            'foreignKey' => 'Technology_id'
        ),
        'Type' => array(
            'className' => 'Type',
            'foreignKey' => 'Type_id'
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

    public $actAs = array('Search.Searchable');

   /* public $filterArgs = array(
        array('name' => 'title','type'=>'like')
    );*/




    /**
     * @return array order by date
     * Description : return current date tasks
     */
    public function taskByDate()
    {
        $curDateObj = new DateTime();
        $curDateObj = $curDateObj->format('Y-m-d');

        return $this->find('all',array(
            'recursive' => -1,
            'conditions' => array("created LIKE '".$curDateObj."%'"),
            'fields' => array('id','title','created'),
            'order' => 'created desc',
            'limit' => 5

        ));
    }

    /*
     * return list of tasks
     */

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

    public function taskByGroup(){

        $this->virtualFields = array(
            'task_count' => 'COUNT(Task.id)');

         return $this->find('all', array(
           'recursive' => -1,
           'fields' => array('created', 'task_count'),
           'order' => 'created desc',
           'group' => 'DATE(created)',
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

            $this->set(array('created' => date('Y-m-d H-i-s'),
            'modified' => date('Y-m-d H-i-s')));
            $this->create();
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
    public function recentTasks($user_id = null){
        $condition = array();
        $toDateObj = new DateTime();
        $toDateObj->sub(date_interval_create_from_date_string('1 days'));
        $toDate = $toDateObj->format('Y-m-d');
        $fromDateObj = new DateTime();
        $fromDateObj->sub(date_interval_create_from_date_string('7 days'));
        $fromDate = $fromDateObj->format('Y-m-d');

        $condition[0] = "created BETWEEN ' ".$fromDate."' AND '".$toDate." '";

        if(!empty($user_id)){
            $condition[1] = 'user_id = '.$user_id;

        }

        return $this->find('all',array(
            'recursive' => -1,
            'conditions' => $condition,
            'fields' => array('id','title','created'),
            'order' => 'created desc',


        ));
    }

    public function groupByDate(){

        return $this->query("SELECT * FROM tasks GROUP BY created");



    }

}