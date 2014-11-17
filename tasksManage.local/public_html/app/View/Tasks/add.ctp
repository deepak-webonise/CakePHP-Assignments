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
});
    </script>
    <div class="col-lg-3">
        <form action="/tasks/add" method="post" id="TaskAddForm" name='TaskAddForm' novalidate="novalidate">
            <div class="form-group">
                <label class="control-label" for="data[Task][title]">Title</label>
                <input name="data[Task][title]" id="data[Task][title]" type="text" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label" for="data[Task][duration]">Duration</label>
                <input  name="data[Task][duration]" id="data[Task][duration]" type="number" class="form-control"/>
            </div>
            <div class="form-group">
                <label class="control-label" for="data[Task][comments]">Comments</label>
                <textarea name="data[Task][comments]" id="data[Task][comments]" type="text" class="form-control"/> </textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Technology</label>
                <?php
                    echo $this->Form->input('technology_id',array('class'=>'form-control','label'=>false,'name'=>'data[Task][technology_id]'));
                ?>
            </div>
            <div class="form-group">
                <label class="control-label">Category</label>
                <?php
                    echo $this->Form->input('type_id',array('class'=>'form-control','label'=>false,'name'=>'data[Task][type_id]'));
                ?>
            </div>

            <button type="submit" id="sub">Add</button>
        </form>
    </div>


<?php

/*   echo $this->Form->create('Task');
    echo $this->Form->input('title',array('div'=>array('class'=>'form-group')));
    echo $this->Form->input('duration');
    echo $this->Form->input('comments',array('rows'=>2));

    echo $this->Form->input('type_id');
    echo $this->Form->submit('Add',array('Formnovalidate'=>true));*/
?>