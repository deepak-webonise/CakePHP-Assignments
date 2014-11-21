<?php

class TestShell extends AppShell {

    public $uses = array('User');

    public $tasks = array('Test');

    public function main(){
        $this->out('Welcome');
    }

    public function hello(){
      /* $user = $this->User->findByusername($this->args[0]);
       $this->out(print_r($user,true));*/
       $this->Test->backupDB();

    }

}