<h1>Add Technologies</h1>
<script type="text/javascript">

    $(document).ready(function(e){

        $("#TechnologyAddForm").validate({

            rules: {
                "data[Technology][name]": {
                    required: true,
                    minlength: 4,
                    maxlength:30
                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<div class="col-lg-4">
   <?php echo $this->Form->create('Technology');?>
       <div class="form-group">
           <label class="control-label" for="TechnologyName">Name of Technology*</label>
           <?php echo $this->Form->input('name',array('class'=>'form-control','label'=>false));?>
       </div>
       <button class="btn btn-primary">Add</button>

  <?php echo $this->Form->end();?>
</div>
<?php
   /* echo $this->Form->create('Technology',array('novalidate'=>'novalidate'));
    echo $this->Form->input('name',array('class'=>'form-control'));
    echo $this->Form->submit('Add',array('Formnovalidate'=>true));*/
?>