<?php 
	$process_step_name = $process['Process']['step'];

	foreach($zone_translations as $key => $translation):
		if($process['Process']['zone'] == $key):
			echo '<span class="zone_name current_zone_name">'.$translation.'</span>&nbsp;&nbsp;'; 
		else:
			echo '<span class="zone_name">'.$translation.'</span>&nbsp;&nbsp;'; 
		endif;
	endforeach;
?>
<br/>
<div class="progress">
	<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    	<span class="sr-only">80% Complete</span>
    </div>
	<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    	<span class="sr-only">80% Complete</span>
    </div>
	<div class="progress-bar progress-bar-blue" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    	<span class="sr-only">80% Complete</span>
    </div>
	<div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
    	<span class="sr-only">80% Complete</span>
    </div>
</div>

<div class="hedes form">
	<?php
		$related_fields = $this->Diss->getStepFields($process_step_name);
		$all_fields = Configure::read('allfields');
		foreach($related_fields as $f):
			if(!empty($all_fields[$f]['relateddata'])):
				$user_idsi = $process['Process'][$f];
				eval('$field_value = $'. $all_fields[$f]['relateddata'] .'['.$user_idsi.'];');
				echo $all_fields[$f]['trans'] . ':' .$field_value;
			else:
				echo $all_fields[$f]['trans'] . ':' .$process['Process'][$f];
			endif;
			echo '<br/>';
		endforeach;
	?>
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
