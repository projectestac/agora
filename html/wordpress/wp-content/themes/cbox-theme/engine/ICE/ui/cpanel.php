<?php
/**
 * ICE API: UI control panel class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage ui
 * @since 1.0
 */

ICE_Loader::load( 'dom/script' );

/**
 * Make cool control panels easy
 *
 * @package ICE
 * @subpackage ui
 */
final class ICE_Ui_Cpanel extends ICE_Base
{
	/**
	 * The screens policy instance
	 *
	 * @var ICE_Screen_Policy
	 */
	private $policy;

	/**
	 * The CSS id of the control panel (also used as a prefix)
	 *
	 * @var string
	 */
	private $id_prefix;

	/**
	 * Constructor
	 *
	 * @param ICE_Screen_Policy $policy
	 */
	public function __construct( ICE_Screen_Policy $policy )
	{
		$this->policy = $policy;
	}

	/**
	 * Render the opening element of the control panel
	 *
	 * @param string $id_prefix The CSS id prefix for dynamic elements
	 */
	public function render_begin( $id_prefix )
	{
		$this->id_prefix = esc_attr( $id_prefix );
	}

	/**
	 * Render the closing element of the control panel
	 */
	public function render_end()
	{
		// buttons script
		$this->render_scripts();
	}

	/**
	 * Render a css id for a control panel element
	 *
	 * @param string $token,... Suffix tokens
	 */
	public function render_id()
	{
		$tokens = func_get_args();

		if ( !empty( $tokens ) ) {
			foreach( (array) $tokens as $key => $token ) {
				$tokens[$key] = esc_attr( $token );
			}
		} else {
			$tokens = array();
		}

		print $this->id_prefix . implode( '-', $tokens );
	}

	/**
	 * Render the control panel menu items
	 *
	 * @param array $items An array of screen objects to render
	 */
	public function render_menu_items( $items = null )
	{
		$close = false;

		if ( empty( $items ) ) {
			$items = $this->policy->registry()->get_roots();
		} else {
			$close = true; ?>
			<ul><?php
		}

		// sort em
		$items = ICE_Position::sort_priority( $items );

		foreach( $items as $item ) {
			$children = $this->policy->registry()->get_children( $item );
			$children_cnt = count( $children ); ?>
			<li>
				<a target="<?php if ( !$children_cnt ) $this->render_button_target( $item ); ?>" id="<?php $this->render_id( 'menu', 'item', $item->property( 'name' ) ) ?>" href="<?php if ( !$children_cnt ) print esc_attr( $item->property( 'url' ) ) ?>" title="<?php print esc_attr( $item->property( 'title' ) ) ?>"><?php print esc_attr( $item->property( 'title' ) ) ?></a>
				<?php if ( $children_cnt ): ?>
					<?php $this->render_menu_items( $children ) ?>
				<?php endif; ?>
			</li><?php
		}

		if ( $close ) : ?>
			</ul>
		<?php endif;
	}

	/**
	 * Render a button target
	 *
	 * @param ICE_Component $item
	 */
	protected function render_button_target( ICE_Component $item )
	{
		// get target
		$target = $item->property( 'target' );

		// was a target set explicitly?
		if ( $target ) {
			// use that target
			print esc_attr( $target );
		} else {
			// generate a tab target from the name
			$this->render_id( 'tab', $item->property( 'name' ) );
		}
	}

	/**
	 * Render the control panel toolbar buttons
	 */
	public function render_toolbar_buttons()
	{
		$items = $this->policy->registry()->get_all();
		$items = ICE_Position::sort_priority( $items );

		foreach( $items as $item ): ?>
			<?php if ( $item->property( 'toolbar' ) ): ?>
				<a target="<?php $this->render_id( 'tab', $item->property( 'name' ) ) ?>" id="<?php $this->render_id( 'toolbarbutton', $item->property( 'name' ) ) ?>" href="<?php print esc_attr( $item->property( 'url' ) ) ?>" title="<?php print esc_attr( $item->property( 'title' ) ) ?>"><?php print esc_attr( $item->property( 'title' ) ) ?></a>
			<?php endif;
		endforeach;
	}

	/**
	 * Print dynamic buttons javascript
	 */
	protected function render_scripts()
	{
		// get all screens from the registry
		$items = $this->policy->registry()->get_all();

		// make sure we got some items
		if ( count( $items ) ) {

			// new script helper
			$script = new ICE_Script();
			$script->begin_logic();

			foreach( $items as $item ) {
				$conf = null;
				$icons = $item->icon()->config();
				if ( $icons ) {
					$conf = sprintf( '{%s}', $icons );
				}
				// menu button and maybe toolbar button ?>
				$('a#<?php $this->render_id( 'menu', 'item', $item->property( 'name' ) ) ?>').button(<?php print $conf ?>);
				<?php if ( $item->property( 'toolbar' ) ): ?>
					$('a#<?php $this->render_id( 'toolbarbutton', $item->property( 'name' ) ) ?>').button(<?php print $conf ?>);
				<?php endif;
			}

			$logic = $script->end_logic();
			$logic->set_property( 'alias', true );
			$logic->set_property( 'ready', true );

		} else {
			return null;
		}

		// begin rendering ?>
		<script type="text/javascript">
			<?php print $script->export(); ?>
		</script><?php
	}

	/**
	 * Print available tabs widget setting
	 */
	public function render_available_tabs()
	{
		// get all screens from the registry
		$items = $this->policy->registry()->get_all();

		// make sure we got some items
		if ( count( $items ) ) {

			// new script helper
			$script = new ICE_Script();
			$logic = $script->logic();

			foreach( $items as $item ) {
				// add variable
				$logic->av( $item->property( 'name' ), $item->property( 'title' ) );
			}

			print $logic->export_variables( true );

		} else {
			print '{}';
		}
	}
}
