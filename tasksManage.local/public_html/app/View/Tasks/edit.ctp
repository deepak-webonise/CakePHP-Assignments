<h2>Edit Task</h2>
<script type="text/javascript">

    $(document).ready(function(e){

        $("#TaskEditForm").validate({

            rules: {
                "data[Task][title]": {
                    required: true,
                    minlength: 4,
                    maxlength:30
                },
                "data[Task][duration]" : {
                    required: true,
                    minlength:1,
                    maxlength:2

                },
                "data[Task][comments]" : {
                    required: true,
                    maxlength:100,
                    minlength:5

                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<div class="col-lg-3">
    <?php echo $this->Form->create('Task', array('novalidate'=>'novalidate')); ?>
   <!-- <form action="/tasks/add" method="post" id="TaskAddForm" name='TaskAddForm' novalidate="novalidate">-->
        <div class="form-group">
            <label class="control-label" for="data[Task][title]">Title*</label>
            <?php echo $this->Form->input('title',array('class'=>'form-control','label'=>false)); ?>
        </div>
        <div class="form-group">
            <label class="control-label" for="data[Task][duration]">Duration*</label>
           <?php echo $this->Form->input('duration',array('class'=>'form-control','label'=>false)); ?>
        </div>
        <div class="form-group">
            <label class="control-label" for="data[Task][comments]">Comments*</label>
           <?php echo $this->Form->input('comments',array('class'=>'form-control','label'=>false));?>
        </div>
        <div class="form-group">
            <label class="control-label">Technology*</label>
            <?php
            echo $this->Form->input('technology_id',array('class'=>'form-control','label'=>false,'name'=>'data[Task][technology_id]'));
            ?>
        </div>
        <div class="form-group">
            <label class="control-label">Category*</label>
            <?php
                echo $this->Form->input('type_id',array('class'=>'form-control','label'=>false,'name'=>'data[Task][type_id]'));

                echo $this->Form->input('id', array('type'=>'hidden'));
            ?>
        </div>

        <button class="btn btn-primary" type="submit" id="sub">Update</button>
        <?php echo $this->Form->end();?>
    </form>
</div>




<?php
/*

echo $this->Form->input('title');
echo $this->Form->input('duration');
echo $this->Form->input('comments',array('rows'=>2));
echo $this->Form->input('technology_id');
echo $this->Form->input('type_id');
echo $this->Form->input('closed', array('label'=>'Task Completed','minYear' => date('Y') - 0 ,'maxYear'=>date('y') - 1));
echo $this->Form->input('id', array('type'=>'hidden'));
echo $this->Form->end('Update');*/
?>