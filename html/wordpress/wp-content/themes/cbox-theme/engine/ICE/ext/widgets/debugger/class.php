<?php
/**
 * ICE API: widget extensions, debugger widget class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE-extensions
 * @subpackage widgets
 * @since 1.0
 */

/**
 * Debugger widget
 *
 * @package ICE-extensions
 * @subpackage widgets
 */
class ICE_Ext_Widget_Debugger
	extends ICE_Widget
{
	/**
	 * @var ICE_Map
	 */
	private $__id_stack__;

	/**
	 */
	protected function init()
	{
		parent::init();

		$this->__id_stack__ = new ICE_Stack();
	}

	/**
	 */
	public function init_styles()
	{
		parent::init_styles();

		// slurp admin styles
		$this->style()
			->section( 'admin' )
			->cache( 'admin', 'admin.css' );
	}

	/**
	 */
	public function init_scripts()
	{
		parent::init_scripts();

		if ( is_admin() ) {
			wp_enqueue_script( 'jquery-jstree' );
		}
	}

	/**
	 * Render all items
	 */
	public function render_items()
	{
		// render scheme stuff
		$this->render_scheme(
			ICE_Scheme::instance()->directives()
		);

		// render component stuff
		$this->render_components(
			ICE_Policy::all()
		);
	}

	/**
	 * Render an array of directives
	 *
	 * @param array $directives
	 */
	protected function render_directives( $directives )
	{
		// open list ?>
		<ul><?php

		// loop all directives
		foreach( $directives as $directive_name => $directive_map ) {
			// detemine groupiness
			$is_group = false;
			// loop current map
			foreach ( $directive_map as $directive ) {
				// is map's value a map?
				if ( $directive->get_value() instanceof ICE_Map ) {
					// yes, so its a group
					$is_group = true;
				}
			}
			
			// render item ?>
			<li id="<?php $this->render_item_id( $directive_name ) ?>">
				<?php if ( $is_group ): ?>
					<a>[<?php print $directive_name ?>]</a>
				<?php else: ?>
					<a><?php print $directive_name ?></a>
				<?php endif; ?>	
				<?php $this->render_directive( $directive_map ); ?>
			</li><?php

			$this->render_item_id();
		}

		// close list ?>
		</ul><?php
	}

	/**
	 * Render values of one directive for each scheme in stack
	 *
	 * @param ICE_Map $directive_map
	 */
	protected function render_directive( ICE_Map $directive_map )
	{
		// get the theme stack from the scheme
		$stack = ICE_Scheme::instance()->theme_stack();

		$map_last = null;

		// open list ?>
		<ul><?php
		foreach( $stack as $theme ):
			if ( $directive_map->contains($theme) ):
				$directive = $directive_map->item_at($theme);
				$map_child = new ICE_Map();
				$map_child->add( $directive->get_name(), $directive->get_value() );
				// render item ?>
				<li id="<?php $this->render_item_id( $theme ) ?>" class="jstree-open">
					<a><?php print $theme ?></a>
					<?php $this->render_value_map( $map_child, $map_last ); ?>
				</li><?php
				$map_last = $map_child;
				$this->render_item_id();
			else:
				$map_last = null;
			endif;
		endforeach; ?>
		</ul><?php
	}

	/**
	 * Render scheme configuration items
	 *
	 * @param array $directives
	 */
	protected function render_scheme( $directives )
	{
		// open list ?>
		<ul>
			<li id="<?php $this->render_item_id( 'scheme' ) ?>">
				<a><?php _e( 'Scheme', infinity_text_domain ); ?></a>
				<?php $this->render_directives( $directives ); ?>
			</li>
		</ul><?php
		
		$this->render_item_id();
	}

	/**
	 * Render all component items for an array of policies
	 *
	 * @param array $policies
	 */
	protected function render_components( $policies )
	{
		// open list ?>
		<ul><?php

		// loop all components
		foreach( $policies as $policy ) {
			// render item ?>
			<li id="<?php $this->render_item_id( $policy->get_handle() ) ?>">
				<a><?php print ucfirst( $policy->get_handle() ) ?></a>
				<?php $this->render_component( $policy->registry() ); ?>
			</li><?php

			$this->render_item_id();
		}

		// close list ?>
		</ul><?php
	}

	/**
	 * Render all components for one component registry
	 * 
	 * @param type $registry
	 */
	protected function render_component( $registry )
	{
		// open list ?>
		<ul><?php

		// loop all components
		foreach( $registry->get_all(true) as $component ) {
			// render item ?>
			<li id="<?php $this->render_item_id( $component->property( 'name' ) ) ?>">
				<a><?php print $component->property( 'name' ) ?></a>
				<?php $this->render_directives( $component->directives() ); ?>
			</li><?php

			$this->render_item_id();
		}
		
		// close list ?>
		</ul><?php
	}

	/**
	 * Recursively render a map of values
	 *
	 * @param ICE_Map $map
	 * @param ICE_Map $map_last
	 */
	protected function render_value_map( ICE_Map $map, ICE_Map $map_last = null )
	{
		// open list ?>
		<ul><?php

		foreach( $map as $key => $value ) {

			// inline styles
			$style_attr = null;
			
			// strike through the text?
			if ( $map_last instanceof ICE_Map ) {
				if ( $map_last->contains($key) ) {
					// get the value
					$map_value = $map_last->item_at($key);
					// strike or not?
					if ( $map_value instanceof ICE_Map ) {
						// map to compare on next loop
						$map_next = $map_value;
					} elseif ( $map_value !== $value ) {
						// strike it!
						$style_attr = ' style="text-decoration: line-through;"';
					}
				}
			}

			// render item ?>
			<li id="<?php $this->render_item_id( $key ) ?>" class="jstree-open"<?php print $style_attr ?>>
				<?php if ( $value instanceof ICE_Map ): ?>
					<a>[<?php print $key ?>]</a>
					<?php
						$this->render_value_map( $value, $map_next );
					?>
				<?php else: ?>
					<span>
						<em><?php print $key ?> </em> =
						<?php if ( is_scalar( $value ) && null !== $value ): ?>
							<?php $this->render_value( $value ) ?>
						<?php else: ?>
							<?php _e( 'null', infinity_text_domain ) ?>
						<?php endif; ?>
					</span>
				<?php endif; ?>
			</li><?php

			$this->render_item_id();
		}
		
		// close list ?>
		</ul><?php
	}

	/**
	 * Render the value of a directive
	 *
	 * @param string $value
	 */
	protected function render_value( $value )
	{
		if ( $value == "1" ) {
			_e('Yes|On|true');
		} elseif ( $value == "" ) {
			_e('No|Off|false|null');
		} elseif ( is_numeric( $value ) ) {
			printf( __( '(integer)&nbsp;%d', infinity_text_domain ), $value );
		} elseif ( defined( $value ) ) {
			print $value;
		} else {
			printf ( '"%s"', $value );
		}
	}

	/**
	 * Render a unique item element id based on depth
	 *
	 * @param string $string
	 */
	protected function render_item_id( $string = null )
	{
		if ( null !== $string ) {

			$this->__id_stack__->push( $string );
			
			print $this->element()->id( $this->__id_stack__->to_array() );
			
		} else {
			$this->__id_stack__->pop();
		}
	}

}
