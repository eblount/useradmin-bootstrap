<?php
defined('SYSPATH') or die('No direct access allowed.');

/**
 * AppForm class: generate application-specific markup for forms.
 * 
 * @author Mikito Takada
 * @package default
 * @version 1.0
 *
 */
class Userbootstrap_Appform extends Useradmin_Appform {
	/**
	 * Add alert span for error or field info
	 * 
	 * @param string $errorName $this->errors[$name]
	 * @param string $attrInfo  $attributes['info']
	 * @return string
	 */
	protected function addAlertSpan($errorName, $attributes = NULL)
	{
		if (isset($errorName))
		{
			$result = '<span class="error">' 
			        . ucfirst($errorName) 
			        . '</span>';
		}
		else 
		{
			if (isset($attributes['info']))
			{
				// else add info span
				$result = '<span class="'.$this->info_class.'">' 
				        . $attributes['info'] 
				        . '</span>';
			}
		}
		return (string) (isset($result))?$result:'';
	}
	
	/**
	 * Creates a form input. If no type is specified, a "text" type input will
	 * be returned.
	 *
	 * @param   string  input name
	 * @param   string  input value
	 * @param   array   html attributes
	 * @return  string
	 */
	public function input($name, $value = NULL, array $attributes = NULL)
	{
		$attributes = AppfORM::add_class($attributes, 'text');
		$this->load_values($name, $value, $attributes);
		return Kohana_FORM::input($name, $value, $attributes)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}

	/**
	 * Creates a password form input.
	 *
	 * @param   string  input name
	 * @param   string  input value
	 * @param   array   html attributes
	 * @return  string
	 */
	public function password($name, $value = NULL, array $attributes = NULL)
	{
		$attributes = AppfORM::add_class($attributes, 'password');
		$this->load_values($name, $value, $attributes);
		return Kohana_FORM::password($name, $value, $attributes)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}

	/**
	 * Creates a file upload form input.
	 *
	 * @param   string  input name
	 * @param   string  input value
	 * @param   array   html attributes
	 * @return  string
	 */
	public function file($name, array $attributes = NULL)
	{
		$this->load_values($name, $dummy, $attributes);
		return Kohana_FORM::file($name, $attributes)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}

	/**
	 * Creates a checkbox form input.
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 */
	public function checkbox($name, $value = NULL, $checked = FALSE, array $attributes = NULL)
	{
		$this->load_values($name, $value, $attributes);
		return Kohana_FORM::checkbox($name, $value, $checked, $attributes)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}

	/**
	 * Creates a radio form input.
	 *
	 * @param   string   input name
	 * @param   string   input value
	 * @param   boolean  checked status
	 * @param   array    html attributes
	 * @return  string
	 */
	public function radio($name, $value = NULL, $checked = FALSE, array $attributes = NULL)
	{
		$this->load_values($name, $value, $attributes);
		return Kohana_FORM::radio($name, $value, $checked, $attributes)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}

	/**
	 * Creates a textarea form input.
	 *
	 * @param   string   textarea name
	 * @param   string   textarea body
	 * @param   array    html attributes
	 * @param   boolean  encode existing HTML characters
	 * @return  string
	 */
	public function textarea($name, $body = '', array $attributes = NULL, $double_encode = TRUE)
	{
		$this->load_values($name, $body, $attributes);
		return Kohana_FORM::textarea($name, $body, $attributes, $double_encode)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}

	/**
	 * Creates a select form input.
	 *
	 * @param   string   input name
	 * @param   array    available options
	 * @param   string   selected option
	 * @param   array    html attributes
	 * @return  string
	 */
	public function select($name, array $options = NULL, $selected = NULL, array $attributes = NULL)
	{
		$this->load_values($name, $selected, $attributes);
		return Kohana_FORM::select($name, $options, $selected, $attributes)
			. $this->addAlertSpan((isset($this->errors[$name])?$this->errors[$name]:NULL), $attributes);
	}
}
