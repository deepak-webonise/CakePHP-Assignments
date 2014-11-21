<?php
echo $this->Html->script('jquery-ui');
?>
<script type="text/javascript">

    $(document).ready(function(e){

        $("#TaskAddForm").validate({

            rules: {
                "data[Task][title]": {
                    required: true,
                    minlength: 4,
                    maxlength:30
                }
            },
            messages : {
                "data[Task][duration]" :{
                    number : 'Please insert valid number'
                }

            },
            submitHandler: function(form) {

                var formData = $("#TaskAddForm").serialize();
                // alert(formData);

                var formUrl = $("#TaskAddForm").attr('action');
                //alert(formUrl);
                $.ajax({
                    type:'post',
                    url:formUrl,
                    data:formData,
                    success: function(data,textStatus,xhr){

                        if(data == 'success'){
                            alert('Successfully added');
                            window.location = '/tasks/listTasks';
                        }
                    },
                    error: function(xhr,textStatus,errorThrown){
                        alert(errorThrown);

                    }

                });
                return false;
            }


        });
        var  availibletype = [];
        var availibleTech =[];
        $("#types").ready(function(){


            $.ajax({
                url:"/types/autoCompleteList",
                type:"post",
                success:function(data,txtStatus,xhr){
                    types = JSON.parse(data);

                    $.each(types,function(i,val){
                        availibletype.push(types[i]);
                    });
                },
                error:function(xhr,textStatus,errorThrown){
                    alert(errorThrown);
                }

            });


        });

        $("#types").autocomplete({
            source: availibletype

        });

        $("#technology").ready(function(){


            $.ajax({
                url:"/technologies/autoCompleteList",
                type:"post",
                success:function(data,txtStatus,xhr){
                    types = JSON.parse(data);

                    $.each(types,function(i,val){
                        availibleTech.push(types[i]);
                    });
                },
                error:function(xhr,textStatus,errorThrown){
                    alert(errorThrown);
                }

            });


        });

        $("#technology").autocomplete({
            source: availibleTech

        });

    });
</script>

<h1>List of Tasks</h1>
<div style="" id="success"></div>
<div class="col-lg-12">
    <form method="post" id="TaskAddForm" name="TaskAddForm"  action="/tasks/add">
        <div class=" col-lg-2 form-group">
            <input name="data[Task][title]" id="TaskTitle" class="form-control" placeholder="Enter Title">

        </div>
        <div class="col-lg-1 form-group">
            <input type="submit" value="Add">
        </div>

    </form>
    <form id="search" action="/tasks/listTasks" method="post">
        <div class="col-lg-2 form-group">
            <input type="text" id="types" name="data[Task][Type]" placeholder="search by type" autocomplete="off"/>
        </div>
        <div class="col-lg-2 form-group">
            <input type="text" id="technology" name="data[Task][Technology]" placeholder="search by Technology"/>
        </div>
        <div class="col-lg-2 form-group">
            <input type="submit" value="Search"/>
            <a href="/tasks/listTasks">Reset</a>
        </div>
    </form>
</div>
<div  class="col-lg-12" >
    <table class="table">
        <tr id="data">

            <th><?php echo $this->Paginator->sort('task_title','Title'); ?></th>
            <th><?php echo $this->Paginator->sort('technology_id','Technology'); ?></th>
            <th><?php echo $this->Paginator->sort('type_id','Type'); ?></th>
            <th>User</th>
            <th><?php echo $this->Paginator->sort('task_date','Date'); ?></th>
        </tr>

        <?php
        $i = 1;
        if(!empty($tasksList)){
            foreach($tasksList as $task){

                echo '<tr>';
                // echo '<td>'.$this->Html->link($i++,array('action' => 'view',$task['Task']['id'])).'</td>';
                echo '<td>'.$this->Html->link($task['Task']['title'],array('action' => 'view',$task['Task']['id'])).'</td>';
                echo '<td>'.$task['Technology']['name'].'</td>';
                echo '<td>'.$task['Type']['name'].'</td>';
                echo '<td>'.$task['User']['username'].'</td>';
                echo '<td>'.$this->Time->format('d M Y \a\t g:i A',$task['Task']['created']).'</td>';
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
            echo $this->Js->writeBuffer();
            ?>
        </ul>
        <nav>

</div>



