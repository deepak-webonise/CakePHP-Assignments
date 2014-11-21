<h2>Categories</h2>

<?php
    foreach($categories as $category)
    {
        echo $this->html->link( $category['Category']['name'],array('controller'=>'categories','action'=>'view',$category['Category']['id'])).'</br>';
    }

?>