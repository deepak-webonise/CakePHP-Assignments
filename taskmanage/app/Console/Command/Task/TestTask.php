<?php
class TestTask extends Shell{
    public $uses = array('User');

    public function execute(){

        $this->stdout->styles('Error', array('text'=>'red','blink'=>true, 'underline'=> true));
        $this->stdout->styles('success', array('text'=>'green','blink'=>true, 'underline'=> true));
        $user = $this->User->findByusername($this->args[0]);

        if($user){
            $this->hr(1,63);
            $this->out('<success>User Details</success>');
            $this->hr(1,63);
            $this->out("<success>%s</success>",pr($user));

            exit;
        }

        $this->out('<Error>User not Found</Error>');
    }

    public function backupDB(){
        $this->dispatchShell('schema dump');
    }
}