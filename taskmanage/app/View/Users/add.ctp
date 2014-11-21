

<script type="text/javascript">

    $(document).ready(function(e){

        $("#UserAddForm").validate({

            rules: {
                "data[User][first_name]": {
                    required: true,
                    minlength: 4,
                    maxlength:10
                },
                "data[User][last_name]" : {
                    required: true,
                    minlength:2,
                    maxlength:12

                },
                "data[User][username]" : {
                    required: true,
                    maxlength:16,
                    minlength:6

                },
                "data[User][email]" : {
                    email: true,
                    required: true,
                    minlength:5

                },
                "data[User][password]" : {

                    required: true,
                    maxlength:16,
                    minlength:5

                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<div class="col-lg-12">
    <div class="col-lg-6">
        <?php echo $this->Form->create('User',array('novalidate'=>'novalidate')); ?>
        <div class="col-lg-6 no-padding" >


                <?php echo $this->Form->input('first_name',array('class'=>'form-control','label'=>false,'placeholder'=>'Firstname')); ?>

        </div>
        <div class="col-lg-6 padding-left">
            <div class="form-group">

                <?php echo $this->Form->input('last_name',array('class'=>'form-control','label'=>false,'placeholder'=>'LastName')); ?>
            </div>
        </div>
        <div class="form-group">

            <?php echo $this->Form->input('username',array('class'=>'form-control','label'=>false,'placeholder'=>'Username')); ?>
        </div>
        <div class="form-group">
            <?php  echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','label'=>false,'placeholder'=>'password')); ?>

        </div>
        <div class="form-group">
            <?php echo $this->Form->input('email',array('class'=>'form-control','label'=>false,'placeholder'=>'Email')); ?>

        </div>

        <?php
            echo $this->Form->submit('Sign up',array('class'=>'btn btn-primary'));
            echo $this->Form->end();
        ?>

    </div>
    <div class="col-lg-6">
        <?php echo $this->Html->image('signup.png',array('class'=>'img-responsive img-rounded'));?>

    </div>
</div>

