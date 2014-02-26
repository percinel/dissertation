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
	echo $this->Form->create('Process',array(
		'action'=>'idecide',
		'inputDefaults' => array(
			'label' => false,
	#		'div' => false
    	)
	)); 
?>
	<fieldset>
	<?php
		echo $this->Form->input('id',array('value'=>$process['Process']['id']));

		$related_fields = $this->Diss->getStepFields($process_step_name);
		$all_fields = Configure::read('allfields');
		foreach($related_fields as $f):
			echo $this->Form->input($f,array(
				'label'=>$all_fields[$f]['trans'],
				'value'=>$process['Process'][$f],
				'readOnly' => true
			
				)
			);
		endforeach;

		echo $this->Form->input('last_action',array('id'=>'last_action_input','type'=>'hidden'));

		$avaliable_actions = $this->Diss->getAvaliableActions($process_step_name);
		foreach($avaliable_actions as $action_name => $action_values):
			echo $this->Form->submit($action_values['trans'], array('div'=>false, 'name'=>'submit','id'=>'button_'.$action_name)); 
		endforeach;
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
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
<?php
	/*
	pr($advisors);
	pr($process_road);
	pr($zone_translations);
	pr($process);
	pr($zones);
	pr($steps);
	*/
