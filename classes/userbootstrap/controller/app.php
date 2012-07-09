<?php defined('SYSPATH') or die('No direct script access.');

class Userbootstrap_Controller_App extends Useradmin_Controller_App {
	public function after() {
		if ($this->auto_render === TRUE)
		{
            $styles = array(
                'css/style.css' => 'screen',
                'css/bootstrap.min.css' => 'screen',
            );
            $scripts = array(
                'js/jquery-1.7.2.min.js',
                'js/bootstrap.min.js',
            );
			$this->template->styles = array_merge($this->template->styles, $styles);
			$this->template->scripts = array_merge($scripts, $this->template->scripts);
		}
		parent::after();
	}
}