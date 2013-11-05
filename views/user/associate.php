<div class="block">
   <h1>Confirm associating your user account</h1>
   <div class="content">
<?php

echo FORM::open('user/associate/'.$provider_name, array('style' => 'display: inline;'));

echo '<p>You are about to associate your user account with your '.ucfirst($provider_name).' account. After this, you can log in using that account. Are you sure?</p>';

echo FORM::hidden('confirmation', 'Y');

echo FORM::submit(NULL, 'Yes');
echo FORM::close();

echo FORM::open('user/profile', array('style' => 'display: inline; padding-left: 10px;'));
echo FORM::submit(NULL, 'Cancel');
echo FORM::close();
?>
   </div>
</div>