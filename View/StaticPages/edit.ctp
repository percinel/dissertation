<div class="staticPages form">
<?php echo $this->Form->create('StaticPage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Static Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('key');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php 
$this->start('script'); 
	echo $this->Html->script('plugins/ckeditor/ckeditor');
#	echo $this->Html->script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min');
?>
	<script type="text/javascript">
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('StaticPageContent');
            //bootstrap WYSIHTML5 - text editor
        	//$(".textarea").wysihtml5();
        });
    </script>
<?php 
$this->end(); 
?>
