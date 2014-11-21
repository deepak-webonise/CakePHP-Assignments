<div class="col-lg-6 ">
    <h2>Tasks</h2>
    <?php echo $this->Html->image('tasks2.png',array('class'=>'img-rounded'));?>
</div>
<div class="col-lg-6">

    <h3>Tasks count By Date</h3>
    <table class="table">
        <th>Date</th>
        <th>Number of Tasks</th>
        <?php

        foreach($group as $row){
        echo '<tr><td>'.$this->Time->format('d-m-Y',$row['Task']['created']).'</td><td>'.$row['Task']['task_count'].'</td></tr>';
        }

        ?>

    </table>
</div>

