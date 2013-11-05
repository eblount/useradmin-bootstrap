<h1>Delete user?</h1>
<?php

echo FORM::open('admin_user/delete/'.$id, array('style' => 'display: inline;'));

echo FORM::hidden('id', $id);

echo '<p>'.__('Are you sure you want to delete user ":user"', array(':user' => $data['username'])).'</p>';

echo '<p>'.FORM::radio('confirmation', 'Y', false, array('id' => 'conf_y')).' <label for="conf_y" style="display: inline;">'.__('Yes').'</label><br/>';
echo FORM::radio('confirmation', 'N', true, array('id' => 'conf_n')).' <label for="conf_n" style="display: inline;">'.__('No').'</label><br/></p>';
echo FORM::submit(NULL, __('Delete'), array("class"=>"btn btn-primary"));
echo FORM::close();

echo FORM::open('admin_user/index', array('style' => 'display: inline; padding-left: 10px;'));
echo FORM::submit(NULL, __('Cancel'), array("class"=>"btn"));
echo FORM::close();
?>
