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
				<?php if($authUser['role']=='pia'): ?>
					<?php echo $this->Html->link('All Students',array('controller'=>'processes','action'=>'allstudents')); ?>
				<?php endif; ?>
				<?php if($authUser['role']=='instructor'): ?>
					<?php echo $this->Html->link('Adviced Students',array('controller'=>'processes','action'=>'mystudents')); ?>
					&nbsp;&nbsp;|| &nbsp;&nbsp;
					<?php echo $this->Html->link('SecondReader Students',array('controller'=>'processes','action'=>'srstudents')); ?>
				<?php endif; ?>
				<?php if($authUser['role']=='student'): ?>
					<?php echo $this->Html->link('My Dissertation',array('controller'=>'processes','action'=>'manage')); ?>
				<?php endif; ?>
				&nbsp;&nbsp;|| &nbsp;&nbsp;
				<?php if($notification_count > 0): ?>
					<?php echo $this->Html->link("Notifications ($notification_count)",array('controller'=>'notifications','action'=>'seeall'),array('style'=>'color:red')); ?>
				<?php else: ?>
					<?php echo $this->Html->link('Notifications',array('controller'=>'notifications','action'=>'seeall')); ?>
				<?php endif; ?>
				&nbsp;&nbsp;|| &nbsp;&nbsp;
				<?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout')); ?>
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
