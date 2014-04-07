<?php $this->layout = 'login_pages'; ?>
<div class="header"><?php echo __('Confirm Your Email'); ?></div>
<?php echo $this->Form->create('User',
	array('action'=>'get_mail',
		'inputDefaults'=> array(
			'label'=>false,
			'div'=>false
		)
	)
); ?>
	<div class="body bg-gray">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->input('email',array(
			'type'=>'text',
			'div'=>'form-group',
			'placeholder'=>'Email',
			'class'=>'form-control',
		)); ?>
	</div>
	<div class="footer">
		<button type="submit" class="btn bg-olive btn-block">
			<?php echo __('Submit'); ?>
		</button>  
	</div>
</form>
