<?php
	
	namespace Http\Forms;
	
	use Core\ValidationException;
	use Core\Validator;
	
	class LoginForm
	{
		protected $errors = [];
		
		public function __construct(public array $attributes)
		{
			
			if (!Validator::email($attributes['email'])) {
				$this->errors['email'] = 'Please provide a valid email address.';
			}
			
			if (!Validator::string($attributes['password'])) {
				$this->errors['password'] = 'Please provide a valid password.';
			}
		}
		public static function validate($attributes)
		{
			$instance = new static($attributes);
			
			return $instance->hasErrors() ? $instance->throw() : $instance;
			
		}
		
		public function throw()
		{
			ValidationException::throw($this->errors(), $this->attributes);
		}
		
		public function hasErrors()
		{
			return count($this->errors);
		}
		
		public function errors()
		{
			return $this->errors;
		}
		
		public function addError($key, $value)
		{
			$this->errors[$key] = $value;
			return $this;
		}
		
	}