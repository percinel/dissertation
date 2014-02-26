<?php 
	$process_step_name = $steps[$process['Process']['step']];

	foreach($zone_translations as $key => $translation):
		if($process['Process']['zone'] == $key):
			echo '<span class="zone_name current_zone_name">'.$translation.'</span>&nbsp;&nbsp;'; 
		else:
			echo '<span class="zone_name">'.$translation.'</span>&nbsp;&nbsp;'; 
		endif;
	endforeach;
?>
<br/>

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
