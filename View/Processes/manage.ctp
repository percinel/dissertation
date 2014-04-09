<div style='margin-bottom:5px;font-size:17px;'>
<?php 

	$process_step_name = $process['Process']['step'];

	$before = true;
	$main_state_trans = '';
	foreach($zone_translations as $key => $translation):
		if($process['Process']['zone'] == $key):
			echo '<span class="label label-primary">'.$translation.'</span>'; 
			$main_state_trans = $translation;
			$before = false;
		else:
			if($before) {
				echo '<span class="label label-success">'.$translation.'</span>'; 
			} else {
				echo '<span class="label label-danger">'.$translation.'</span>'; 
			}
		endif;
		echo "&nbsp;";
	endforeach;
?>

</div>


	<div class="box box-warning">
		<div class="box-body">
			<?php 
				echo $this->Form->create('Process',array(
					'action'=>$action,
					'inputDefaults' => array(
						'label' => false,
						'div' => false
					),
					'role'=>"form",
					
				)); 
			?>
			<?php
				echo $this->Form->input('id',array('value'=>$process['Process']['id']));

				$related_fields = $this->Diss->getStepFields($process_step_name);
				$restricted_fields = $this->Diss->getRestrictedFields($process_step_name);
				$all_fields = Configure::read('allfields');
				foreach($related_fields as $f):
					if(!in_array($f, $restricted_fields)) {
						echo $this->Form->input($f,array(
							'label'=>$all_fields[$f]['trans'],
							'value'=>$process['Process'][$f],
							'div'=>'form-group',
							'class'=>'form-control',
						));
					}
				endforeach;
				foreach($related_fields as $f):
					if(in_array($f, $restricted_fields)) {
				?>
					<div class="box box-warning">
						<div class="box-header">
							<h3 class="box-title"><?php echo $all_fields[$f]['trans']?></h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<?php echo $process['Process'][$f]; ?>
						</div>
					</div>
				<?php
					}
				endforeach;


				echo $this->Form->input('last_action',array('id'=>'last_action_input','type'=>'hidden'));
			?>

			<?php
				$avaliable_actions = $this->Diss->getAvaliableActions($process_step_name);
				foreach($avaliable_actions as $action_name => $action_values):
					echo $this->Form->submit($action_values['trans'], array('div'=>false, 'name'=>'submit','id'=>'button_'.$action_name,'class'=>'btn btn-primary btn-lg')); 
					echo "&nbsp;";
				endforeach;
			?>
			<?php echo $this->Form->end(); ?>
		</div><!-- /.box-body -->
	</div><!-- /.box -->


<?php
$this->start('script'); 
	echo $this->Html->script('plugins/ckeditor/ckeditor');
?>
<script type='text/javascript'>
	<?php 
		foreach($avaliable_actions as $action_name => $action_values):
			#TODO bazi fieldlar bos olamaz. Onlari confige yaz ve burda alert attirip yeni level e gecmesini onle
	?>
			$('#button_<?=$action_name?>').click(function(){
				$('#last_action_input').val('<?=$action_name?>');
			});
	<?
		endforeach;
	?>
</script>
<script type="text/javascript">
    $(function() {
	<?php 
		foreach($related_fields as $f):
			if(!in_array($f, $restricted_fields) && isset($all_fields[$f]['ckeditor'])) {
				echo "CKEDITOR.replace('Process".Inflector::camelize($f)."');";
			} 
		endforeach;
	?>
    });
</script>
<?php 
$this->end(); 
?>
