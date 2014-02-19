<div class="hedes index">
	<h2><?php echo __('Hedes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('studentid'); ?></th>
			<th><?php echo $this->Paginator->sort('advisorid'); ?></th>
			<th><?php echo $this->Paginator->sort('sreaderid'); ?></th>
			<th><?php echo $this->Paginator->sort('step'); ?></th>
			<th><?php echo $this->Paginator->sort('zone'); ?></th>
			<th><?php echo $this->Paginator->sort('last_action'); ?></th>
			<th><?php echo $this->Paginator->sort('last_action_time'); ?></th>
			<th><?php echo $this->Paginator->sort('project_header'); ?></th>
			<th><?php echo $this->Paginator->sort('project_intent'); ?></th>
			<th><?php echo $this->Paginator->sort('project_header_perm'); ?></th>
			<th><?php echo $this->Paginator->sort('project_tags'); ?></th>
			<th><?php echo $this->Paginator->sort('first_report'); ?></th>
			<th><?php echo $this->Paginator->sort('first_report_commect'); ?></th>
			<th><?php echo $this->Paginator->sort('is_valid'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hedes as $hede): ?>
	<tr>
		<td><?php echo h($hede['Hede']['id']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['studentid']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['advisorid']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['sreaderid']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['step']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['zone']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['last_action']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['last_action_time']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['project_header']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['project_intent']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['project_header_perm']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['project_tags']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['first_report']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['first_report_commect']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['is_valid']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['created']); ?>&nbsp;</td>
		<td><?php echo h($hede['Hede']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $hede['Hede']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $hede['Hede']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hede['Hede']['id']), null, __('Are you sure you want to delete # %s?', $hede['Hede']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Hede'), array('action' => 'add')); ?></li>
	</ul>
</div>
