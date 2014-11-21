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
<h1>Technologies</h1>
 <form id="TechnologyAddForm" name="TechnologyAddForm">
     <div class="form-control">
         <input type="text" name="data[Technology][name] id="TechnologyName">
     </div>
 </form>
<table class="table">
    <th>id</th>
    <th>Name</th>
    <th></th>
    <?php

    foreach($technologies as $row){

        echo '<tr>';
        echo '<td>'.$this->Html->link($row['Technology']['id'],'#').'</td>';
        echo '<td>'.$this->Html->link($row['Technology']['name'],'#').'</td>';

        if($this->Session->read('Auth.User')){
            echo '<td>'.$this->Html->link('Edit',array('action'=> 'edit',$row['Technology']['id'])).'</td>';
            echo '<td>'.$this->Form->postLink('Delete',array('action' => 'delete',$row['Technology']['id']),array('confirm'=>'Are you sure')).'</td>';

        }


    }

    ?>

</table>