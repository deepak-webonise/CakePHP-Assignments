<?php


$cakeDescription = __d('cake_dev', 'Task Management System');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div class="nav navbar navbar-default">
            <div class="navbar-brand">
                <?php echo $this->Html->link($cakeDescription, '#'); ?>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo $this->Html->link('Home','/') ?></li>
                <li><?php echo $this->Html->link('Tasks',array('controller'=>'tasks')) ?></li>
                <li><?php echo $this->Html->link('Technologies',array('controller'=>'technologies')) ?></li>
                <?php
                    if($this->Session->read('Auth.User')){
                        echo '<li>';
                        echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout'));
                        echo '</li>';
                    }
                    else{
                        echo '<li>';
                        echo $this->Html->link('Login',array('controller'=>'Users','action'=>'login'));
                        echo '</li>';
                    }

                ?>


            </ul>

		</div>
		<div class="row">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">


				<?php $this->Html->script('bootstrap');?>

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
