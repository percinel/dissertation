<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>Please enter the validation code we have send to your email box</legend>
        <?php echo $this->Form->input('passcode'); ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
