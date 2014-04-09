<div class="resumes form">
<?php echo $this->Form->create('Resume',array('inputDefaults'=>array('div'=>false))); ?>
	<fieldset>
		<legend><?php echo __('Edit Resume',array(
			'action'=> 'resumes/edit/'.$authUser['id']
		)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('areas');
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$authUser['id']));
		echo $this->Form->input('resume');
		echo $this->Form->input('contact');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php
$this->start('script'); 
	echo $this->Html->script('plugins/ckeditor/ckeditor');
?>
	<script type="text/javascript">
        $(function() {
            CKEDITOR.replace('ResumeAreas');
            CKEDITOR.replace('ResumeResume');
            CKEDITOR.replace('ResumeContact');
        });
    </script>
<?php 
$this->end(); 
?>
