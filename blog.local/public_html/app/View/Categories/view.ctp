<h2><?php echo $posts['Category']['name']; ?></h2>

<?php
    foreach($posts['Post'] as $post){
        echo $this->html->link($post['title'],array('controller'=>'posts','action'=>'view', $post['id']));
    }

?>