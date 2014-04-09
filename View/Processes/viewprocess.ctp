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
		$related_fields = $this->Diss->getStepFields($process_step_name);
		$all_fields = Configure::read('allfields');
		foreach($related_fields as $f):
			$hede_value = '';
			if(!empty($all_fields[$f]['relateddata'])):
				$user_idsi = $process['Process'][$f];
				eval('$field_value = $'. $all_fields[$f]['relateddata'] .'['.$user_idsi.'];');
				$hede_value = $field_value;
			else:
				$hede_value = $process['Process'][$f];
			endif;
	?>
					<div class="box ">
						<div class="box-header">
							<h3 class="box-title"><?php echo $all_fields[$f]['trans']?></h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<?php echo $hede_value; ?>
						</div>
					</div>
	<?php
		endforeach;
	?>
	</div>
</div>

<div class="hedes form">
</div>
<?php
	/*
	pr($advisors);
	pr($process_road);
	pr($zone_translations);
	pr($process);
	pr($zones);
	pr($steps);
	*/
