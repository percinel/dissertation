<div class="users index">
	<h2><?php echo __('Advisors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link("Cv Goruntule", array('controller' => 'resumes', 'action' => 'view', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
