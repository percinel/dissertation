<div class="">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?php echo __('All Instructors'); ?></h3>                                    
		</div><!-- /.box-header -->
		<div class="box-body table-responsive">
			<table id="main_table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Instructor Name</th>
						<th>Advised Student Count</th>
						<th>Second Reader Student Count</th>
						<th>Cv link</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($users as $u): ?>
						<tr>
							<td><?=$this->Diss->getFullName($u['User'])?></td>
							<td><?=$u['User']['acount']?></td>
							<td><?=$u['User']['srcount']?></td>
							<td><?=$this->Html->link('cv',array('controller'=>'resumes','action'=>'view',$u['User']['id']))?></td>
						</tr>
					<?php endforeach;?>
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
