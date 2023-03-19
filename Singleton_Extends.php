<?php
/**
 * Singleton class
 *
 * @since 0.1.0
 *
 * @package my-package
 */

namespace Fragen;

defined( 'ABSPATH' ) || die;

/**
 * Abstract base class for singletons.
 *
 * @since 0.1.0
 */
abstract class Singleton_Extends {
	/**
	 * Our static instances.
	 *
	 * @since 0.1.0
	 *
	 * @var array Singleton subclasses
	 */
	public static $instances = array();

	/**
	 * Get our static instance.
	 *
	 * @since 0.1.0
	 *
	 * @param mixed ...$args Optional arguments.  Declaring this here with the spread operator
	 *                    allows sub-classes to declare specific arguments.
	 * @return Singleton sub-class instance.
	 */
	public static function get_instance( ...$args ) {
		// get "Late Static Binding" class name.
		$class = get_called_class();

		if ( ! isset( self::$instances[ $class ] ) ) {
			self::$instances[ $class ] = new $class( ...$args );
		}

		return self::$instances[ $class ];
	}

	/**
	 * Constructor.
	 *
	 * @since 0.1.0
	 *
	 * @param mixed ...$args Optional arguments.  Declaring this here with the spread operator
	 *                    allows sub-classes to declare specific arguments.
	 */
	protected function __construct( ...$args ) {
		// get "Late Static Binding" class name.
		$class = get_called_class();

		if ( isset( self::$instances[ $class ] ) ) {
			return self::$instances[ $class ];
		}

		self::$instances[ $class ] = $this;
	}
}
