<?php defined('SYSPATH') or die('No direct script access.');

	class Kohana_CSRF_Form extends Kohana_Form {

		public static function open($action = NULL, array $attributes = NULL) {
			return parent::open( $action, $attributes ) . 
			'<input type="hidden" name="kohana-csrf" value="' . CSRF::get() . '" />';
		}

	}
