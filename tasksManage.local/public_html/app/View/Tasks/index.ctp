<h2>Tasks</h2>
<h1>Today Tasks</h1>
<?php echo $this->Html->link('Add Task',array('controller'=>'tasks','action'=>'add'));?>
<table>
    <th>Id</th>
    <th>Title</th>
    <th>Created On</th>
    <th></th>

    <?php

        foreach($tasks as $task){

            echo '<tr>';
            echo '<td>'.$this->Html->link($task['Task']['id'],array('action' => 'view',$task['Task']['id'])).'</td>';
            echo '<td>'.$this->Html->link($task['Task']['title'],array('action' => 'view',$task['Task']['id'])).'</td>';
            echo '<td>'.$task['Task']['created'].'</td>';
            echo '<td>'.$this->Html->link('Edit',array('action'=> 'edit',$task['Task']['id'])).'</td>';
            echo '<td>'.$this->Form->postLink('Delete',array('action' => 'delete',$task['Task']['id']),array('confirm'=>'Are you sure')).'</td>';


        }

    ?>
</table>
<h1>Tasks Listing By Date</h1>
<table>
    <th>Date</th>
    <th>Number of Tasks</th>
    <?php
        foreach($group as $row){

            echo '<tr><td>'.$row['Task']['created'].'</td><td>'.$row['Task']['task_count'].'</td></tr>';
        }

    ?>

</table>
