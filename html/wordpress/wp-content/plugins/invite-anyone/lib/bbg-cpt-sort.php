<?php

if ( !class_exists( 'BBG_CPT_Sort' ) ) :

class BBG_CPT_Sort {
	/**
	 * The full column data
	 */
	var $columns;
	
	var $column_count;
	var $current_column;
	var $column;
	var $in_the_loop;
	
	/**
	 * Default orderby column
	 */
	var $default_orderby;
	
	/**
	 * The desired $_GET keys for orderby and order
	 */
	var $get_orderby_key;
	var $get_order_key;
	
	/**
	 * The values of orderby and order as retrieved from $_GET
	 */
	var $get_orderby;
	var $get_order;
	
	var $sortable_keys;
	
	/**
	 * PHP 4 constructor
	 *
	 * @package Boone's Sortable Columns
	 * @since 1.0
	 */
	function bbg_cpt_sort( $cols = false ) {
		$this->__construct( $cols );
	}

	/**
	 * PHP 5 constructor
	 *
	 * @package Boone's Sortable Columns
	 * @since 1.0
	 *
	 * $columns should be an array of arrays. That is, an array of args for each column. See
	 * $defaults below for an explanation of these arrays.
	 */	
	function __construct( $cols = false ) {
		$defaults = array(
			'name'		=> false,
			'title'		=> false,
			'is_sortable'	=> true,
			'css_class'	=> false,
			'default_order'	=> 'asc',
			'posts_column'	=> false,
			'is_default'	=> false
		);
	
		$this->columns = array();
		$this->sortable_keys = array();
	
		foreach( $cols as $col ) {
			// You need at least a name and a title to continue
			if ( empty( $col['name'] ) || empty( $col['title'] ) )
				continue;
				
			$r = wp_parse_args( $col, $defaults );
			
			// If the css_class is not set, just use the name param
			if ( empty( $r['css_class'] ) )
				$r['css_class'] = $r['name'];
		
			// Check to see whether this is a default. Providing more than one default
			// will mean that the last one overrides the others
			if ( !empty( $r['is_default'] ) )
				$this->default_orderby = $r['name'];
		
			// Compare the default order against a whitelist of 'asc' and 'desc'
			if ( 'asc' == strtolower( $r['default_order'] ) || 'desc' == strtolower( $r['default_order'] ) ) {
				$r['default_order'] = strtolower( $r['default_order'] );
			} else {
				$r['default_order'] = 'asc';
			}
			
			// If it's sortable, add the name to the $sortable_keys array
			if ( $r['is_sortable'] )
				$this->sortable_keys[] = $r['name'];
		
			// Convert to an object for maximum prettiness
			$col_obj = new stdClass;
			
			foreach( $r as $key => $value ) {
				$col_obj->$key = $value;
			}
			
			$this->columns[] = $col_obj;
		}
					
		// Now, set up some values for the loop
		$this->column_count = count( $this->columns );
		$this->current_column = -1;
		
		// If a default orderby was not found, just choose the first item in the array
		if ( empty( $this->default_orderby ) && !empty( $cols[0]['name'] ) ) {
			$this->default_orderby = $cols[0]['name'];
		}
		
		// Set up the $_GET keys (which are customizable)
		$this->setup_get_keys();
		
		// Get the pagination parameters out of $_GET
		$this->setup_get_params();
		
		// Set up the next orders (asc or desc) depending on current state
		$this->setup_next_orders();
	}
	
	/**
	 * Sets up the $_GET param keys.
	 *
	 * You can either override this function in your own extended class, or filter the default
	 * values. I have provided both options because I love you so very much.
	 *
	 * @package Boone's Sortable Columns
	 * @since 1.0
	 */
	function setup_get_keys() {
		$this->get_orderby_key	= apply_filters( 'bbg_cpt_sort_orderby_key', 'orderby' );
		$this->get_order_key 	= apply_filters( 'bbg_cpt_sort_order_key', 'order' );
	}
	
	/**
	 * Gets params out of $_GET global
	 *
	 * Does some basic checks to ensure that the values are integers and that they are non-empty
	 *
	 * @package Boone's Sortable Columns
	 * @since 1.0
	 */
	function setup_get_params() {
		// Orderby
		$orderby = isset( $_GET[$this->get_orderby_key] ) ? $_GET[$this->get_orderby_key] : false;
		
		// If an orderby param is provided, check to see that it's permitted.
		// Otherwise set the current orderby to the default
		if ( $orderby && in_array( $orderby, $this->sortable_keys ) ) {
			$this->get_orderby = $orderby;
		} else {
			$this->get_orderby = $this->default_orderby;		
		}
		
		// Order	
		$order = isset( $_GET[$this->get_order_key] ) ? $_GET[$this->get_order_key] : false;
		
		// If an order is provided, make sure it's either 'desc' or 'asc'
		// Otherwise set current order to the orderby's default order
		if ( $order && ( 'desc' == strtolower( $order ) || 'asc' == strtolower( $order ) ) ) {
			$order = strtolower( $order );
		} else {
			// Loop through to find the default order for this bad boy
			// This is not optimized because of the way the array is keyed
			foreach( $this->columns as $col ) {
				if ( $col->name == $this->get_orderby ) {	
					$order = $col->default_order;
					break;
				}
			}
		}
		
		// There should only be two options, 'asc' and 'desc'. We'll cut some slack for
		// uppercase variants
		$order = 'desc' == strtolower( $order ) ? 'desc' : 'asc';
		
		$this->get_order = $order;
	}
	
	function setup_next_orders() {
		foreach( $this->columns as $name => $col ) {
			if ( $col->name == $this->get_orderby ) {
				$current_order = $this->get_order;
			} else {
				$current_order = $col->default_order;
			}
			
			$this->columns[$name]->next_order = 'asc' == $current_order ? 'desc' : 'asc';
		}
	}
	
	function have_columns() {
		// Compare against the column_count - 1 to account for the 0 array index shift
		if ( $this->column_count && $this->current_column < $this->column_count - 1 )
			return true;

		return false;
	}

	function next_column() {
		$this->current_column++;
		$this->column = $this->columns[$this->current_column];

		return $this->column;
	}

	function rewind_columns() {
		$this->current_column = -1;
		if ( $this->column_count > 0 ) {
			$this->column = $this->columns[0];
		}
	}

	function the_column() {
		$this->in_the_loop = true;
		$this->column = $this->next_column();

		if ( 0 == $this->current_column ) // loop has just started
			do_action('loop_start');
	}
	
	function the_column_css_class( $type = 'echo' ) {
		// The column-identifying class
		$class = array( $this->column->css_class );
		
		// Sortable logic
		if ( $this->column->is_sortable ) {
			// Add the sorted/sortable class, based on whether this is the current sort
			if ( $this->column->name == $this->get_orderby ) {
				$class[] = 'sorted';
				$class[] = $this->get_order;
			} else {
				$class[] = 'sortable';
				$class[] = $this->column->next_order;
			}
		}
		
		$class = implode( ' ', $class );
		
		if ( 'echo' == $type )
			echo $class;
		else
			return $class;
	}
	
	function the_column_next_link( $type = 'echo', $html_or_url = 'html' ) {
		$args = array(
			$this->get_orderby_key	=> $this->column->name,
			$this->get_order_key	=> $this->column->next_order
		);
		
		$url = add_query_arg( $args );
		
		// Assemble the html link, if necessary
		if ( 'html' == $html_or_url ) {
			$html = sprintf( '<a title="%1$s" href="%2$s">%3$s</a>', $this->column->name, $url, $this->the_column_title( 'return' ) );
			
			$link = $html;
		} else {
			$link = $url;
		}
		
		if ( 'echo' == $type )
			echo $link;
		else
			return $link;
	}
	
	function the_column_title( $type = 'echo' ) {
		$name = $this->column->title;
		
		if ( 'echo' == $type )
			echo $name;
		else
			return $name;
	}
	
	function the_column_th( $type = 'echo' ) {
		if ( $this->column->is_sortable ) {
			$td_content = sprintf( '<a href="%1$s"><span>%2$s</span><span class="sorting-indicator"></span></a>', $this->the_column_next_link( 'return', 'url' ), $this->the_column_title( 'return' ) );
		} else {
			$td_content = $this->the_column_title( 'return' );
		
		}
	
		$html = sprintf( '<th scope="col" class="manage-column %1$s">%2$s</th>', $this->the_column_css_class( 'return' ), $td_content );
		
		if ( 'echo' == $type )
			echo $html;
		else
			return $html;
	}
}

endif;

?>