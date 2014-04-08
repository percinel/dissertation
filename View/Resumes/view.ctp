<div class="resumes view">
<h2><?php echo __('Resume'); ?> 
</h2>
	<?php 
		if($authUser['role'] == 'instructor') {
			echo $this->Html->link('edit','/resumes/edit/'.$authUser['id']); 
		}
	?>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resume['User']['id'], array('controller' => 'users', 'action' => 'view', $resume['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Areas'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['areas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resume'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['resume']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['contact']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($resume['Resume']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resume'), array('action' => 'edit', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resume'), array('action' => 'delete', $resume['Resume']['id']), null, __('Are you sure you want to delete # %s?', $resume['Resume']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resume'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
