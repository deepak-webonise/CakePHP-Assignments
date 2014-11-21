<h2>Add new Task</h2>

<script type="text/javascript">

$(document).ready(function(e){

       $("#TaskAddForm").validate({

          rules: {
              "data[Task][title]": {
                    required: true,
                    minlength: 4,
                    maxlength:30
                },
              "data[Task][duration]" : {
                  required: true,
                  number: true,
                  minlength:1,
                  maxlength:2

              },
              "data[Task][comments]" : {
                  required: true,
                  maxlength:100,
                  minlength:5

              }
            },
            messages : {
                "data[Task][duration]" :{
                    number : 'Please insert valid number'
                }

            },
           submitHandler: function(form) {
               form.submit();
           }
       });

      /*  $("#TaskAddForm").submit(function(){
            var formData = $(this).serialize();

            var formUrl = $(this).attr('action');
            $.ajax({
                type:'POST',
                url:formUrl,
                success: function(data,textStatus,xhr){
                    alert('sucess');
                },
                error: function(data,textStatus,xhr){
                    alert('fail');
                 }
            });
            return false;
        });*/
});
</script>
<?php
/*
    $data = $this->Js->get("#TaskAddForm")->serializeForm();
    $this->Js->get("#TaskAddForm")->event(
        'submit',
        $this->Js->request(
            array('action'=>'add','controller'=>'tasks'),
            array('async'=>true,'update'=>'#status','data'=>$data)
        )


    );
    echo $this->Js->writeBuffer();*/

?>
    <div class="col-lg-3">
        <div id="status"></div>
        <?php echo $this->Form->create('Task',array('novalidate'=>'novalidate','default'=>false)); ?>
            <div class="form-group">
                <label class="control-label" for="TaskTitle">Title*</label>
                <?php echo $this->Form->input('title',array('class'=>'form-control','label'=>false));?>
            </div>
            <div class="form-group">
                <label class="control-label" for="TaskDuration">Duration(hrs)</label>
                <!-- <input  name="data[Task][duration]" id="TaskDuration" type="number" class="form-control"/> -->
                <?php echo $this->Form->input('duration',array('class'=>'form-control','label'=>false));?>
            </div>
            <div class="form-group">
                <label class="control-label" for="TaskComments">Comments</label>
               <!-- <textarea name="data[Task][comments]" id="TaskComments" type="text" class="form-control"/> </textarea> -->
                <?php echo $this->Form->textarea('comments',array('class'=>'form-control','label'=>false));?>
            </div>
            <div class="form-group">
                <label class="control-label">Technology</label>
                <?php
                    echo $this->Form->input('technology_id',array('class'=>'form-control','label'=>false,'name'=>'data[Task][technology_id]'));
                ?>
            </div>
            <div class="form-group">
                <label class="control-label">Project</label>
                <?php
                    echo $this->Form->input('type_id',array('class'=>'form-control','label'=>false,'name'=>'data[Task][type_id]'));
                ?>
            </div>


       <?php

            echo $this->Form->submit('Add',array('class'=>'btn btn-primary'));
            echo $this->Form->end();

       ?>
    </div>


<?php

/*   echo $this->Form->create('Task');
    echo $this->Form->input('title',array('div'=>array('class'=>'form-group')));
    echo $this->Form->input('duration');
    echo $this->Form->input('comments',array('rows'=>2));

    echo $this->Form->input('type_id');
    echo $this->Form->submit('Add',array('Formnovalidate'=>true));*/
?>