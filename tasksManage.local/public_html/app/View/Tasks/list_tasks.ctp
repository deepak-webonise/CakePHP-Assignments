
<h1>List of Tasks</h1>

<div  class="col-lg-12">
    <?php echo $this->Form->create('Task',array('action' => 'listTasks')); ?>
        <div class="col-lg-2 form-group">

            <?php echo $this->Form->input('technology_id',array('class'=>'form-control','placeholder'=>'Technology')) ?>
        </div>
        <div class="col-lg-2 form-group padding-left ">
            <?php echo $this->Form->input('type_id',array('class'=>'form-control','placeholder'=>'Type')) ?>
        </div>
        <div class="col-lg-2 form-group padding-left">
            <label>Date Created</label>
            <input class="form-control" type="date" name="created" id="created" >

        </div>

        <div class="col-lg-2 form-group">
            <input type="submit" value="search" class="btn btn-primary">
            <?php echo $this->Form->end();?>
        </div>



</div>

<div  class="col-lg-12">
    <table class="table">
        <th><?php echo $this->Paginator->sort('task_id','ID'); ?></th>
        <th><?php echo $this->Paginator->sort('task_title','Title'); ?></th>
        <th><?php echo $this->Paginator->sort('technology_id','Technology'); ?></th>
        <th><?php echo $this->Paginator->sort('type_id','Type'); ?></th>
        <th><?php echo $this->Paginator->sort('task_date','Date'); ?></th>

        <?php
        if(!empty($tasksList)){
            foreach($tasksList as $task){

                echo '<tr>';
                echo '<td>'.$this->Html->link($task['Task']['id'],array('action' => 'view',$task['Task']['id'])).'</td>';
                echo '<td>'.$this->Html->link($task['Task']['title'],array('action' => 'view',$task['Task']['id'])).'</td>';
                echo '<td>'.$task['Technology']['name'].'</td>';
                echo '<td>'.$task['Type']['name'].'</td>';
                echo '<td>'.$task['Task']['created'].'</td>';
                if($this->Session->read('Auth.User')){
                    echo '<td>'.$this->Html->link('Edit',array('action'=> 'edit',$task['Task']['id'])).'</td>';
                    echo '<td>'.$this->Form->postLink('Delete',array('action' => 'delete',$task['Task']['id']),array('confirm'=>'Are you sure')).'</td>';

                }

            }
        }else{
            echo '<p class="text-danger">No records found.</p>';
        }

        ?>
    </table>

    <nav>
        <ul class="pagination">
            <?php
            echo $this->Paginator->prev( '<<', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ),array('tag'=>'span') );
            echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );
            echo $this->Paginator->next( '>>', array( 'class' => '', 'tag' => 'li' ), null, array( 'class' => 'disabled', 'tag' => 'li' ) );
            ?>
        </ul>
        <nav>

</div>


