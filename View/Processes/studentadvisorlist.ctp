<div class="">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?php echo __('Student Advisor List'); ?></h3>                                    
		</div><!-- /.box-header -->
		<div class="box-body table-responsive">
			<table id="main_table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Student Name</th>
						<th>Advisor Name</th>
						<th>Second Reader Name</th>
						<th>Proje Konusu</th>
						<th>State</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($processes as $p): ?>
						<tr>
							<td><?=$this->Diss->getFullName($p['User'])?></td>
							<td><?=$this->Diss->getFullName($p['Advisor'])?></td>
							<td><?=$this->Diss->getFullName($p['Sreader'])?></td>
							<td><?=$p['Process']['project_header_perm']?></td>
							<td><?=$this->Diss->getZoneTrans($p['Process']['zone'])?></td>
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
