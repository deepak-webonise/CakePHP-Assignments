<script type="text/javascript">

    $(document).ready(function(e){

        $("#UserLoginForm").validate({

            rules: {
                "data[User][username]": {
                    required: true,
                    minlength: 4,
                    maxlength:30
                },
                "data[User][password]":{
                    required:true
                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-3">
        <?php echo $this->Html->image('login.png');?>
    </div>
    <div class="col-lg-3">
        <h2>Login</h2>

        <?php echo $this->Form->create('User',array('action'=>'login','novalidate'=>'novalidate','input-defaults'=>array('class'=>'form-group'))); ?>
        <div class="form-group">
            <?php echo $this->Form->input('username',array('class'=>'form-control','label'=>false,'placeholder'=>'Username')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('password',array('type'=>'password','class'=>'form-control','label'=>false,'placeholder'=>'Password')); ?>

        </div>

        <?php
            echo $this->Form->submit('Login',array('class'=>'btn btn-primary'));
            echo $this->Form->end();
        ?>

        <p>New user can <a href="/users/add" class="btn-link">Sign Up</a> </p>
    </div>

</div>
