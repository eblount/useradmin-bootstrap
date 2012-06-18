<div class="span5">
   <h1><?php echo __('User profile') ?></h1>
   <p class="intro">This is your user information, <?php echo $user->username ?>.</p>
</div>
<div class="span3" style="float: right;">
	<ul class="nav nav-pills">
         <li><?php echo Html::anchor('user/profile_edit', __('Edit profile')); ?></li>
         <li><?php echo Html::anchor('user/unregister', __('Delete account')); ?></li>
	</ul>
</div>
<br style="clear: both;">

  <h3>Username &amp; Email Address</h3>
  <p><?php echo $user->username ?> &mdash; <?php echo $user->email ?></p>

  <h3>Login Activity</h3>
  <p>Last login was <?php echo date('F jS, Y', $user->last_login) ?>, at <?php echo date('h:i:s a', $user->last_login) ?>.<br/>Total logins: <?php echo $user->logins ?></p>

  <?php
  $providers = array_filter(Kohana::$config->load('useradmin.providers'));
  $identities = $user->user_identity->find_all();
  if($identities->count() > 0) {
     echo '<h3>Accounts associated with your user profile</h3><p>';
     foreach($identities as $identity) {
        echo '<a class="associated_account" style="background: #FFF url('.URL::site('/img/admin/small/'.$identity->provider.'.png').') no-repeat center center"></a>';
        unset($providers[$identity->provider]);
     }
     echo '<br style="clear: both;"></p>';
  }
  if(!empty($providers)) {
     echo '<h3>Additional account providers</h3><p>Click the provider icon to associate it with your existing account.</p><p>';
     foreach($providers as $provider => $enabled) {
        echo '<a class="associated_account '.$provider.'" href="'.URL::site('/user/associate/'.$provider).'"></a>';
     }
     echo '<br style="clear: both;"></p>';
  }
  ?>
