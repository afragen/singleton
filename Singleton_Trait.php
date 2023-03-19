<?php

namespace Fragen;

trait Singleton_Trait {
    public static $instances = array();

    public static function get_instance( ...$args ) {
        $class = get_called_class();

		if ( ! isset( self::$instances[ $class ] ) ) {
			self::$instances[ $class ] = new $class( ...$args );
		}

		return self::$instances[ $class ];
    }

    public function __construct( $args ) {
        if ( ! empty( class_parents( $this ) ) ) {
            parent::__construct( ...$args );
        }

        $class = get_called_class();

        if ( isset( self::$instances[ $class ] ) ) {
            return self::$instances[ $class ];
        }

        self::$instances[ $class ] = $this;
    }
}
