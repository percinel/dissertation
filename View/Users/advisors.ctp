<div class="col-xs-12">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?php echo __('Advisor List'); ?></h3>                                    
		</div><!-- /.box-header -->
		<div class="box-body table-responsive">
			<table id="main_table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
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
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
$this->start('script'); 
	echo $this->Html->script('plugins/datatables/jquery.dataTables');
	echo $this->Html->script('plugins/datatables/dataTables.bootstrap');
?>
<script type="text/javascript">
    $(function() {
        $('#main_table').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "asSorting": true,
            "bAutoWidth": false
        });
    });
</script>
<?php 
$this->end(); 
?>
