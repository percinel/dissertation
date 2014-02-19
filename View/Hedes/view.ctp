<div class="hedes view">
<h2><?php echo __('Hede'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Studentid'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['studentid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Advisorid'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['advisorid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sreaderid'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['sreaderid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Step'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['step']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zone'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['zone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Action'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['last_action']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Action Time'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['last_action_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Header'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['project_header']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Intent'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['project_intent']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Header Perm'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['project_header_perm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Tags'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['project_tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Report'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['first_report']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Report Commect'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['first_report_commect']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Valid'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['is_valid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($hede['Hede']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hede'), array('action' => 'edit', $hede['Hede']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hede'), array('action' => 'delete', $hede['Hede']['id']), null, __('Are you sure you want to delete # %s?', $hede['Hede']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hedes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hede'), array('action' => 'add')); ?> </li>
	</ul>
</div>
