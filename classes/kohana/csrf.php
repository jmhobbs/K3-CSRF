<?php defined('SYSPATH') or die('No direct script access.');

	// Inspiration from https://github.com/synapsestudios/kohana-csrf/blob/develop/classes/csrf.php
	class Kohana_CSRF {

		public static function get ( $name = 'default' ) {
			$token = Session::instance()->get( 'kohana-csrf-' . $name );
			if( ! $token ) {
				$token = Text::random( 'alnum', rand( 20, 30 ) );
				Session::instance()->set( 'kohana-csrf-' . $name, $token );
			}
			return $token;
		}

		public static function clear ( $name = 'default' ) {
			Session::instance()->delete( 'kohana-csrf-' . $name );
		}

		public static function check ( $values, $name = 'default', $purge = true ) {
			$token = self::get( $name );
			if( $purge ) { self::clear( $name );
			return ( isset( $values['kohana-csrf-' . $name ] ) and $values['kohana-csrf-' . $name] === $token );
		}

	}
