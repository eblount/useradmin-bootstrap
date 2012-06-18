<?php defined('SYSPATH') or die('No direct access allowed.');

// Static file serving (CSS, JS, images)
Route::set('css2', '<dir>(/<file>)', array('file' => '.+', 'dir' => '(css|img|js)'))
   ->defaults(array(
		'controller' => 'user',
		'action'     => 'media',
		'file'       => NULL,
		'dir'       => NULL,
	));

