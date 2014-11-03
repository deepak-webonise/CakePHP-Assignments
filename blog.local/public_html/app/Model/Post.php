<?php

class Post extends AppModel
{
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty'
		),
		'body' => array(
			'rule' => 'notEmpty'
		)
	);
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );

    /**
     * @return array
     */

    public function findPosts(){

       return $this->find('all', array(
           'recursive'=> -1
       ));

    }

    /**
     * @param null $id
     * @return array
     * @throws NotFoundException
     */
    public function findByPostId($id=null)
    {
        if(!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        return $this->find('first', array('conditions'=> array('Post.id' => $id)));
    }

    /**
     * @param null $data
     * @return bool
     */
    public function addPost($data = null)
    {
       if(!$data){
           $this->create();
           if ($this->save($data)) {
               return true;
           }
       }

       return false;
    }

    /**
     * @param null $data
     * @param null $id
     * @return bool
     * @throws NotFoundException
     */
    public function editPost($data=null,$id=null){
        if(!$id)
        {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('id',$id);
        if($data){
            if ($this->save($data)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param $id
     * @return bool
     * @throws NotFoundException
     */
    public function deletePost($id)
    {
        if(!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        if($this->delete($id)){
            return true;
        }
        return false;
    }
}
?>