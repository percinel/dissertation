<div class="hedes form">
<?php echo $this->Form->create('Hede'); ?>
	<fieldset>
		<legend><?php echo __('Edit Hede'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('studentid');
		echo $this->Form->input('advisorid');
		echo $this->Form->input('sreaderid');
		echo $this->Form->input('step');
		echo $this->Form->input('zone');
		echo $this->Form->input('last_action');
		echo $this->Form->input('last_action_time');
		echo $this->Form->input('project_header');
		echo $this->Form->input('project_intent');
		echo $this->Form->input('project_header_perm');
		echo $this->Form->input('project_tags');
		echo $this->Form->input('first_report');
		echo $this->Form->input('first_report_commect');
		echo $this->Form->input('is_valid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Hede.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Hede.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hedes'), array('action' => 'index')); ?></li>
	</ul>
</div>
