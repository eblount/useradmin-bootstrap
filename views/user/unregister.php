   <h1>Confirm removing your user account</h1>
<?php

echo FORM::open('user/unregister/'.$id, array('style' => 'display: inline;'));

echo FORM::hidden('id', $id);

echo '<p>Are you sure you want to remove your user account?</p>';

echo '<p>'.FORM::radio('confirmation', 'Y').' Yes<br/>';
echo FORM::radio('confirmation', 'N', true).' No<br/></p>';

echo FORM::submit(NULL, 'Confirm', array("class"=>"btn btn-primary"));
echo FORM::close();

echo FORM::open('user/profile', array('style' => 'display: inline; padding-left: 10px;'));
echo FORM::submit(NULL, 'Cancel', array("class"=>"btn"));
echo FORM::close();
?>
