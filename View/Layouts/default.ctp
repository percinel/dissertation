<?php
$cakeDescription = __d('cake_dev', 'Dissertation Management');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('dissertation');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-1.11.0');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Dissertation Thesis Management</h1>
			<?php if(!empty($authUser)): ?> 
			<div id="menu_controls">
				<?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'login')); ?>
			</div>
			<?php endif; ?>
		</div>
		<hr/>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			Istanbul Bilgi University
		</div>
	</div>
</body>
</html>
