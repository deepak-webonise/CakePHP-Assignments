<h2>Signup/ Registration</h2>
<?php
    echo $this->Form->create('User');
    echo $this->Form->input('email');
    echo $this->Form->input('password', array('type'=>'password'));
    echo $this->Form->input('firstName');
    echo $this->Form->input('lastName');
    echo $this->Form->end('Register');
?>