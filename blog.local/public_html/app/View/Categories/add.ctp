<h2>Add Category</h2>
 <div style="width:200px">
<?php
    echo $this->Form->create('Category');
    echo $this->Form->input('name');
    echo $this->Form->end('Add');
?>
 </div>