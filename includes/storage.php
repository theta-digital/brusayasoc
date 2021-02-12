<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'justitia_storage_get' ) ) {
	function justitia_storage_get( $var_name, $default = '' ) {
		global $JUSTITIA_STORAGE;
		return isset( $JUSTITIA_STORAGE[ $var_name ] ) ? $JUSTITIA_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'justitia_storage_set' ) ) {
	function justitia_storage_set( $var_name, $value ) {
		global $JUSTITIA_STORAGE;
		$JUSTITIA_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'justitia_storage_empty' ) ) {
	function justitia_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $JUSTITIA_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $JUSTITIA_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $JUSTITIA_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $JUSTITIA_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'justitia_storage_isset' ) ) {
	function justitia_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $JUSTITIA_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $JUSTITIA_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $JUSTITIA_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $JUSTITIA_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'justitia_storage_inc' ) ) {
	function justitia_storage_inc( $var_name, $value = 1 ) {
		global $JUSTITIA_STORAGE;
		if ( empty( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = 0;
		}
		$JUSTITIA_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'justitia_storage_concat' ) ) {
	function justitia_storage_concat( $var_name, $value ) {
		global $JUSTITIA_STORAGE;
		if ( empty( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = '';
		}
		$JUSTITIA_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'justitia_storage_get_array' ) ) {
	function justitia_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $JUSTITIA_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) ? $JUSTITIA_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $JUSTITIA_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $JUSTITIA_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'justitia_storage_set_array' ) ) {
	function justitia_storage_set_array( $var_name, $key, $value ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$JUSTITIA_STORAGE[ $var_name ][] = $value;
		} else {
			$JUSTITIA_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'justitia_storage_set_array2' ) ) {
	function justitia_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$JUSTITIA_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$JUSTITIA_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'justitia_storage_merge_array' ) ) {
	function justitia_storage_merge_array( $var_name, $key, $value ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$JUSTITIA_STORAGE[ $var_name ] = array_merge( $JUSTITIA_STORAGE[ $var_name ], $value );
		} else {
			$JUSTITIA_STORAGE[ $var_name ][ $key ] = array_merge( $JUSTITIA_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'justitia_storage_set_array_after' ) ) {
	function justitia_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			justitia_array_insert_after( $JUSTITIA_STORAGE[ $var_name ], $after, $key );
		} else {
			justitia_array_insert_after( $JUSTITIA_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'justitia_storage_set_array_before' ) ) {
	function justitia_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			justitia_array_insert_before( $JUSTITIA_STORAGE[ $var_name ], $before, $key );
		} else {
			justitia_array_insert_before( $JUSTITIA_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'justitia_storage_push_array' ) ) {
	function justitia_storage_push_array( $var_name, $key, $value ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $JUSTITIA_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) ) {
				$JUSTITIA_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $JUSTITIA_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'justitia_storage_pop_array' ) ) {
	function justitia_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $JUSTITIA_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $JUSTITIA_STORAGE[ $var_name ] ) && is_array( $JUSTITIA_STORAGE[ $var_name ] ) && count( $JUSTITIA_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $JUSTITIA_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) && is_array( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) && count( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $JUSTITIA_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'justitia_storage_inc_array' ) ) {
	function justitia_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( empty( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ][ $key ] = 0;
		}
		$JUSTITIA_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'justitia_storage_concat_array' ) ) {
	function justitia_storage_concat_array( $var_name, $key, $value ) {
		global $JUSTITIA_STORAGE;
		if ( ! isset( $JUSTITIA_STORAGE[ $var_name ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ] = array();
		}
		if ( empty( $JUSTITIA_STORAGE[ $var_name ][ $key ] ) ) {
			$JUSTITIA_STORAGE[ $var_name ][ $key ] = '';
		}
		$JUSTITIA_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'justitia_storage_call_obj_method' ) ) {
	function justitia_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $JUSTITIA_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $JUSTITIA_STORAGE[ $var_name ] ) ? $JUSTITIA_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $JUSTITIA_STORAGE[ $var_name ] ) ? $JUSTITIA_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'justitia_storage_get_obj_property' ) ) {
	function justitia_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $JUSTITIA_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $JUSTITIA_STORAGE[ $var_name ]->$prop ) ? $JUSTITIA_STORAGE[ $var_name ]->$prop : $default;
	}
}
