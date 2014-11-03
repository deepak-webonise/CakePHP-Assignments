<h1><?php echo ($post['Post']['title']); ?></h1>
<?php //echo ($post['Category']['name']);?>
<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>
<p><?php echo ($post['Post']['body']); ?></p>
<?php print_r($post);?>