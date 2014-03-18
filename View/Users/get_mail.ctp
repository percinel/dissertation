<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>You have not validate your email</legend>
        <?php echo $this->Form->input('email'); ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
