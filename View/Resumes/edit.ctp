<div class="resumes form">
<?php echo $this->Form->create('Resume'); ?>
	<fieldset>
		<legend><?php echo __('Edit Resume',array(
			'action'=> 'resumes/edit/'.$authUser['id']
		)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('areas');
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$authUser['id']));
		echo $this->Form->input('resume');
		echo $this->Form->input('contact');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Resume.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Resume.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
