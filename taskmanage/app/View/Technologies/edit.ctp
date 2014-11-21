<script type="text/javascript">

    $(document).ready(function(e){

        $("#TechnologyEditForm").validate({

            rules: {
                "data[Technology][name]": {
                    required: true,
                    minlength: 3,
                    maxlength:30
                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<h1>Edit Technology</h1>
<div class="col-lg-3">
    <?php
    echo $this->Form->create('Technology',array('novalidate'=>'novalidate'));
    /*  echo $this->Form->input('name');
      echo $this->Form->input('id', array('type'=>'hidden'));
      echo $this->Form->submit('Update', array('Formnovalidate'=>true));*/
    ?>
    <div class="form-group">
        <label class="control-label" id="data[Technology][name]">Name of Technology*</label>
        <?php
            echo $this->Form->input('name',array('class'=>'form-control','label'=>false));
            echo $this->Form->input('id', array('type'=>'hidden'));
        ?>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
        <?php echo $this->Form->end();?>
    </div>
    </form>

</div>
