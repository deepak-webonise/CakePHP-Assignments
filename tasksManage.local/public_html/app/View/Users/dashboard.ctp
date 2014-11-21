
<div class="col-lg-2"></div>
<div class="col-lg-8">
    <h2>Dashboard</h2>
    <h3>Today Tasks</h3>
    <?php
        if(!empty($todayTasks)){
    ?>
        <table class="table">
            <th>Id</th>
            <th>Title</th>
            <th>Created On</th>
            <th></th>
            <th></th>

            <?php
                $i = 1;
                foreach($todayTasks as $task){

                    echo '<tr>';
                    echo '<td>'.$this->Html->link($i++,array('action' => 'view',$task['Task']['id'])).'</td>';
                    echo '<td>'.$this->Html->link($task['Task']['title'],array('action' => 'view',$task['Task']['id'])).'</td>';
                    echo '<td>'.$this->Time->format('d M Y \a\t g:i A',$task['Task']['created']).'</td>';
                    if($this->Session->read('Auth.User')){
                        echo '<td>'.$this->Html->link('Edit',array('controller'=>'tasks','action'=> 'edit',$task['Task']['id'])).'</td>';
                        echo '<td>'.$this->Form->postLink('Delete',array('controller'=>'tasks','action' => 'delete',$task['Task']['id']),array('confirm'=>'Are you sure')).'</td>';

                    }


                }

            ?>
        </table>
    <?php
        }
        else{
            echo 'No records for today';
        }
    ?>


    <h3>Recent 7 days tasks</h3>
    <table class="table">
        <th>Id</th>
        <th>Title</th>
        <th>Created On</th>
        <th></th>
        <th></th>

        <?php
            $i = 1;
            foreach($recentTasks as $task){

                echo '<tr>';
                echo '<td>'.$this->Html->link($i++,array('controller'=>'tasks','action' => 'view',$task['Task']['id'])).'</td>';
                echo '<td>'.$this->Html->link($task['Task']['title'],array('action' => 'view',$task['Task']['id'])).'</td>';
                echo '<td>'.$this->Time->format('d M Y \a\t g:i A',$task['Task']['created']).'</td>';
                if($this->Session->read('Auth.User')){
                    echo '<td>'.$this->Html->link('Edit',array('controller'=>'tasks','action'=> 'edit',$task['Task']['id'])).'</td>';
                    echo '<td>'.$this->Form->postLink('Delete',array('controller'=>'tasks','action' => 'delete',$task['Task']['id']),array('confirm'=>'Are you sure')).'</td>';

                }


            }

        ?>
    </table>
    <h3>Recent 7 days tasks</h3>
    <table class="table">
        <th>ID</th>
        <th>Title</th>
        <th>Created On</th>
        <th></th>
        <th></th>

        <?php
        $curdate = date('Y-m-d');
        $i = 1;
        foreach($recentTasks as $task){
            if($curdate != $task['Task']['created']){
                echo $task['Task']['created'];
                $curdate = $task['Task']['created'];
            }

            echo '<tr>';
            echo '<td>'.$this->Html->link($i++,array('controller'=>'tasks','action' => 'view',$task['Task']['id'])).'</td>';
            echo '<td>'.$this->Html->link($task['Task']['title'],array('action' => 'view',$task['Task']['id'])).'</td>';
            echo '<td>'.$this->Time->format('d M Y \a\t g:i A',$task['Task']['created']).'</td>';
            if($this->Session->read('Auth.User')){
                echo '<td>'.$this->Html->link('Edit',array('controller'=>'tasks','action'=> 'edit',$task['Task']['id'])).'</td>';
                echo '<td>'.$this->Form->postLink('Delete',array('controller'=>'tasks','action' => 'delete',$task['Task']['id']),array('confirm'=>'Are you sure')).'</td>';

            }


        }

        ?>
    </table>
    <?php
        echo $this->Html->link('Show All', array('controller'=>'tasks','action'=>'listTasks'),array('class'=>'btn'));
    ?>
</div>