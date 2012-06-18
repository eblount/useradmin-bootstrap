   <h1>Confirm removing your user account</h1>
<?php

echo Form::open('user/unregister/'.$id, array('style' => 'display: inline;'));

echo Form::hidden('id', $id);

echo '<p>Are you sure you want to remove your user account?</p>';

echo '<p>'.Form::radio('confirmation', 'Y').' Yes<br/>';
echo Form::radio('confirmation', 'N', true).' No<br/></p>';

echo Form::submit(NULL, 'Confirm', array("class"=>"btn btn-primary"));
echo Form::close();

echo Form::open('user/profile', array('style' => 'display: inline; padding-left: 10px;'));
echo Form::submit(NULL, 'Cancel', array("class"=>"btn"));
echo Form::close();
?>
