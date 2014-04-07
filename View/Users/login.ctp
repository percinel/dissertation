<?php $this->layout = 'login_pages'; ?>
<div class="header"><?php echo __('Dissertation Management'); ?></div>
<?php echo $this->Form->create('User',
	array('action'=>'login',
		'inputDefaults'=> array(
			'label'=>false,
			'div'=>false
		)
	)
); ?>
	<div class="body bg-gray">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->Form->input('username',array(
			'type'=>'text',
			'div'=>'form-group',
			'placeholder'=>'Username',
			'class'=>'form-control',
		)); ?>
		<?php echo $this->Form->input('password',array(
			'type'=>'password',
			'div'=>'form-group',
			'placeholder'=>'Password',
			'class'=>'form-control',
		)); ?>
	</div>
	<div class="footer">
		<button type="submit" class="btn bg-olive btn-block">
			<?php echo __('Login'); ?>
		</button>  
	</div>
</form>
