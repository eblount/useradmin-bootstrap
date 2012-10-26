<?php
$form = new Appform();
if(isset($errors)) {
   $form->errors = $errors;
}
if(isset($username)) {
   $form->values['username'] = $username;
}
// set custom classes to get labels moved to bottom:
$form->error_class = 'error block';
$form->info_class = 'info block';

?>
<?php
echo $form->open('user/login', array('class'=>'well span4'));
echo '<h2>'.__('Login').'</h2>';
echo $form->label('username', __('Email or Username'));
echo $form->input('username', null, array('class' => ''));

echo $form->label('password', __('Password'));
echo $form->password('password', null, array('class' => ''));
echo '<p><small> '.Html::anchor('user/forgot', __('Forgot your password?')).'</small></p>';

$authClass = new ReflectionClass(get_class(Auth::instance()));
if($authClass->hasMethod('auto_login'))
{
	echo '<label for="remember" class="checkbox">'.Kohana_Form::checkbox('remember','remember',false,array()).
            __('Remember me').'</label>'.
            $form->submit(NULL, __('Login'), array("class"=>"btn"));
}
else
{
    echo $form->submit(NULL, __('Login'), array("class"=>"btn"));
}
echo $form->close();

$registerEnabled = Kohana::$config->load('useradmin.register_enabled');
$options = array_filter(Kohana::$config->load('useradmin.providers'));
if($registerEnabled || !empty($options)) {
	echo '<br style="clear:both;" class="visible-phone" /> <div class="well span4">';
	if($registerEnabled)
		echo '<h4>'.__('Don\'t Have An Account?').'</h4><br />'.Html::anchor('user/register', __('Register A New Account')).'.';
	if($registerEnabled && !empty($options))
		echo '<br style="clear: both;"><br style="clear: both;">';
	if(!empty($options)) {
		if($registerEnabled)
	   		echo '<h4>'.__('Register or Log In With Provider').':</h4>';
		else
			echo '<h4>'.__('Log In With Provider').':</h4>';
		if(isset($options['facebook']) && $options['facebook']) {
	    	echo '<a class="login_provider" style="background: #FFF url('.URL::site('/img/admin/facebook.png').') no-repeat center center" href="'.URL::site('/user/provider/facebook').'"></a>';
		}
		if(isset($options['twitter']) && $options['twitter']) {
			echo '<a class="login_provider" style="background: #FFF url('.URL::site('/img/admin/twitter.png').') no-repeat center center" href="'.URL::site('/user/provider/twitter').'"></a>';
		}
		if(isset($options['google']) && $options['google']) {
	    	echo '<a class="login_provider" style="background: #FFF url('.URL::site('/img/admin/google.gif').') no-repeat center center" href="'.URL::site('/user/provider/google').'"></a>';
		}
		if(isset($options['yahoo']) && $options['yahoo']) {
	    	echo '<a class="login_provider" style="background: #FFF url('.URL::site('/img/admin/yahoo.gif').') no-repeat center center" href="'.URL::site('/user/provider/yahoo').'"></a>';
		}
		echo '<br style="clear: both;">';
	}
	echo '</div>';
}
