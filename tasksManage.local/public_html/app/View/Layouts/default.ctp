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
        echo $this->Html->script('jquery-1.11.1.min');
        echo $this->Html->script('jquery.validate');
        echo $this->Html->script('bootstrap');

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
            <?php if($this->Session->read('Auth.User')){ ?>

                <li><?php echo $this->Html->link('Home','/') ?></li>
                <li class="dropdown">
                    <a href="tasks/" class="dropdown-toggle" data-toggle="dropdown">Tasks <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo $this->Html->link('List All',array('controller'=>'tasks','action'=>'listTasks')) ?></li>
                        <li><?php echo $this->Html->link('Add',array('controller'=>'tasks','action'=>'add')) ?></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="tasks/" class="dropdown-toggle" data-toggle="dropdown">Technologies <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo $this->Html->link('List All',array('controller'=>'technologies','action'=>'index')) ?></li>
                        <li><?php echo $this->Html->link('Add',array('controller'=>'technologies','action'=>'add')) ?></li>

                    </ul>
                </li>

                <?php
                    }

                    if($this->Session->read('Auth.User')){
                        $user = $this->Session->read('Auth.User');

                        echo '<li class="dropdown">';
                        echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$user['User']['username'].'<span class="caret"></span></a>';
                        echo '<ul class="dropdown-menu" role="menu">';

                        echo '<li>';
                        echo $this->Html->link('Dashboard',array('controller'=>'Users','action'=>'dashboard'));
                        echo '</li>';


                        echo '<li>';
                        echo $this->Html->link('Logout',array('controller'=>'Users','action'=>'logout'));
                        echo '</li>';

                        echo '</ul></li>';

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



		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
