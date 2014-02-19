<div class="hedes form">
<?php echo $this->Form->create('Process'); ?>
	<fieldset>
		<legend><?php echo __('Process Form'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('student_id');
		echo $this->Form->input('advisor_id');
		echo $this->Form->input('sreader_id');
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
