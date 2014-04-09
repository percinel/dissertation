<div class="">
	<div class="box">
		<div class="box-header">
			<h3 class="box-title"><?php echo __('All Students'); ?></h3>                                    
		</div><!-- /.box-header -->
		<div class="box-body table-responsive">
			<table id="main_table" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>State</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($processes as $p): ?>
						<tr>
							<td><?=$p['User']['firstname']?></td>
							<td><?=$p['User']['lastname']?></td>
							<td><?=$this->Diss->getZoneTrans($p['Process']['zone'])?></td>
							<td>
								<?php 
									if($this->Diss->hasWorkToDo('instructor',$p)) {
										echo $this->Html->link('Ilgilenmeniz Gerekiyor',array('controller'=>'processes','action'=>'pmanage',$p['Process']['id']),array('style'=>'color:red'));
									}else {
										if($p['Process']['zone'] == 'submitted') : 
											echo '<span style="color:green">Tamamlanmis</span>';
										else:
											echo '<span style="color:green">Surec Devam Ediyor</span>';
										endif;
									}
								?>
							</td>
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
