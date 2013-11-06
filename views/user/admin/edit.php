<?php

$form = new Appform();
if(isset($errors)) {
   $form->errors = $errors;
}
if(isset($data)) {
   unset($data['password']);
   unset($data['password_confirm']);
   $form->values = $data;
}
echo $form->open('admin_user/edit/'.$id);
?>
<?php
  echo $form->hidden('id', $id);
?>
<h1><?php echo __('Edit/Add User') ?></h1>
<label><?php echo __('Username'); ?></label>
<?php echo $form->input('username', null, array('info' => __('Length between 1-32 characters. Letters, numbers, dot and underscore are allowed characters.'))); ?>
<label><?php echo __('Email address'); ?></label>
<?php echo $form->input('email') ?>
<label><?php echo __('Password'); ?></label>
<?php echo $form->password('password', null, array('info' => __('Password should be between 6-42 characters.'))) ?>
<label><?php echo __('Re-type Password'); ?></label>
<?php echo $form->password('password_confirm') ?>
<h2><?php echo __('Roles'); ?></h2>
<table class="table">
  <tr><th></th><th><?php echo __('Role'); ?></th><th><?php echo __('Description'); ?></th></tr>
  <?php
      foreach($all_roles as $role => $description) {
         echo '<tr>';
         echo '<td>'.Form::checkbox('roles['.$role.']', $role, (in_array($role, $user_roles) ? true : false)).'</td>';
         echo '<td>'.ucfirst($role).'</td><td>'.$description.'</td>';
         echo '</tr>';
      }
   ?>
         </table>
<?php
echo $form->submit(NULL, __('Save'), array("class"=>"btn"));
echo $form->close();
?>
