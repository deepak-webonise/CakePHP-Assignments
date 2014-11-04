<h2>Add new Task</h2>
<?php

    echo $this->Form->create('Task');
    echo $this->Form->input('title');
    echo $this->Form->input('duration');
    echo $this->Form->input('comments',array('rows'=>2));
    echo $this->Form->input('technology_id');
    echo $this->Form->input('type_id');
    echo $this->Form->end('Add');
?>