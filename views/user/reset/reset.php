<div class="well">
   <h1><?php echo __('Password reset'); ?></h1>
<?php
echo FORM::open('user/reset');
?>
      <label><?php echo __('Account email address'); ?>:</label>
      <?php echo FORM::input('reset_email', '', array('class' => 'text')) ?>
      <label><?php echo __('Password reset token'); ?>:</label>
      <?php echo FORM::input('reset_token', '', array('class' => 'text')) ?>
<br style="clear:both;">
<?php echo FORM::submit(NULL, __('Reset password'), array("class"=>"btn")); ?>

<?php echo FORM::close() ?>

   </div>
</div>
