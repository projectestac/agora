<?php
/**
 * ICE API: docs class file
 *
 * @author Marshall Sorenson <marshall@presscrew.com>
 * @link http://infinity.presscrew.com/
 * @copyright Copyright (C) 2010-2011 Marshall Sorenson
 * @license http://www.gnu.org/licenses/gpl.html GPLv2 or later
 * @package ICE
 * @subpackage utils
 * @since 1.0
 */

/**
 * Make documentation easy
 *
 * @package ICE
 * @subpackage utils
 */
class ICE_Docs extends ICE_Base
{
	/**
	 * The default page name
	 */
	const DEFAULT_PAGE = 'index';

	/**
	 * HTML markup type
	 *
	 * No markup parsing is done. Good in, good out.
	 */
	const MARKUP_HTML = 'html';

	/**
	 * Markdown markup type
	 * @link http://daringfireball.net/projects/markdown/
	 */
	const MARKUP_MARKDOWN = 'md';
	/**
	 * Markdown markup type (long)
	 * @see MARKUP_TEXTILE
	 */
	const MARKUP_MARKDOWN_LONG = 'markdown';

	/**
	 * Textile markup type
	 * @link http://textile.thresholdstate.com/
	 */
	const MARKUP_TEXTILE = 'text';
	/**
	 * Textile markup type (long)
	 * @see MARKUP_TEXTILE
	 */
	const MARKUP_TEXTILE_LONG = 'textile';

	/**
	 * Directories which may contain the docs
	 * @var array
	 */
	private $doc_dirs;

	/**
	 * The page name
	 * @var string
	 */
	private $page;

	/**
	 * The page file to parse
	 * @var string
	 */
	private $page_file;

	/**
	 * The page markup format
	 * @var string
	 */
	private $page_markup;

	/**
	 * The callback to filter markup before parsing
	 * @var string|array
	 */
	private $pre_parse_callback;

	/**
	 * The callback to filter markup after parsing
	 * @var string|array
	 */
	private $post_parse_callback;

	/**
	 * Initialize the doc parser
	 *
	 * @param string|array $dir Directory or directories which may contain the doc page, in the order in which they should be searched
	 * @param string $page The page to locate and parse from the doc dirs stack
	 */
	public function __construct( $dir, $page = null )
	{
		if ( is_array( $dir ) ) {
			$this->doc_dirs = $dir;
		} else {
			$this->doc_dirs = array( $dir );
		}

		$this->set_page( $page );
	}

	/**
	 * Parse and return formatted contents of page file
	 *
	 * @return string Valid HTML markup
	 */
	public function parse()
	{
		// grab entire contents of file
		$contents = file_get_contents( $this->page_file );

		// call pre parse filter if exists
		if ( $this->pre_parse_callback ) {
			$contents = call_user_func( $this->pre_parse_callback, $contents );
		}

		// parse content based on markup format
		switch ( $this->page_markup ) {
			// HTML
			case self::MARKUP_HTML:
				break;
			// Markdown
			case self::MARKUP_MARKDOWN:
			case self::MARKUP_MARKDOWN_LONG:
				ICE_Loader::load( 'parsers/markdown' );
				$contents = ICE_Markdown::parse( $contents );
				break;
			// Textile
			case self::MARKUP_TEXTILE:
			case self::MARKUP_TEXTILE_LONG:
				ICE_Loader::load( 'parsers/textile' );
				$contents = ICE_Textile::parse( $contents );
				break;
			// Invalid
			default:
				throw new Exception( sprintf( 'The markup format "%s" is not valid', $this->page_markup ) );
		}

		// call post parse filter if exists
		if ( $this->post_parse_callback ) {
			$contents = call_user_func( $this->post_parse_callback, $contents );
		}

		return $contents;
	}

	/**
	 * Print the results of parsing
	 *
	 * @see parse
	 */
	public function publish()
	{
		print $this->parse();
	}

	/**
	 * Set the pre parse filter callback
	 *
	 * The callback should accept one parameter, which is the raw
	 * contents of the page that was found.
	 *
	 * @param mixed $callback
	 */
	public function set_pre_filter( $callback )
	{
		if ( is_callable( $callback ) ) {
			$this->pre_parse_callback = $callback;
		} else {
			throw new Exception( sprintf( 'Invalid callback' ) );
		}
	}

	/**
	 * Set the post parse filter callback
	 *
	 * The callback should accept one parameter, which is the
	 * parsed contents of the page that was found.
	 *
	 * @param mixed $callback
	 */
	public function set_post_filter( $callback )
	{
		if ( is_callable( $callback ) ) {
			$this->post_parse_callback = $callback;
		} else {
			throw new Exception( sprintf( 'Invalid callback' ) );
		}
	}

	/**
	 * Set the current page
	 *
	 * @param string $page
	 * @return boolean
	 */
	private function set_page( $page = null )
	{
		// fall back to default
		if ( empty( $page ) ) {
			$page = self::DEFAULT_PAGE;
		} else {
			// trailing slash means index
			if ( substr( $page, -1, 1 ) == '/' ) {
				$page .= self::DEFAULT_PAGE;
			}
			// split page at static directory separators
			$splits = explode( '/', $page );
			// page is last item
			$page = array_pop( $splits );
			// anything left?
			if ( count($splits) ) {
				// put them pack together
				$doc_append = implode( '/', $splits );
				// append remaining parts to each doc dir
				foreach ( $this->doc_dirs as &$doc_dir ) {
					$doc_dir .= '/' . $doc_append;
				}
			}
		}

		// validate the page name
		if ( $this->validate_page_name( $page ) ) {
			$this->page = $page;
			$this->update_page_file();
			return true;
		} else {
			throw new Exception( 'Doc page file names can only contain letters, numbers and underscore characters' );
		}
	}

	/**
	 * Set the file of the page
	 */
	private function update_page_file()
	{
		$this->page_file = $this->find_page_file( $this->page );
		$this->update_page_markup();
	}

	/**
	 * Set the markup format of the page
	 */
	private function update_page_markup()
	{
		if ( preg_match( '/\.([a-z]+)$/', $this->page_file, $matches ) ) {
			$this->page_markup = $matches[1];
		}
	}

	/**
	 * Validate a page name
	 *
	 * @param string $page
	 * @return boolean
	 */
	private function validate_page_name( $page )
	{
		return ( preg_match( '/^\.?\w+$/', $page ) );
	}

	/**
	 * Return the file path for a given page
	 *
	 * @param string $page
	 * @return string
	 */
	private function find_page_file( $page )
	{
		// valid formats
		$formats =
			join( '|', array(
				self::MARKUP_HTML,
				self::MARKUP_MARKDOWN,
				self::MARKUP_MARKDOWN_LONG,
				self::MARKUP_TEXTILE,
				self::MARKUP_TEXTILE_LONG
			));

		// loop through all doc dirs looking for doc page
		foreach ( $this->doc_dirs as $doc_dir ) {

			try {
				// list all files in current dir that match page
				$files = ICE_Files::list_filtered( $doc_dir, sprintf( '/^%s\.(%s)$/', $page, $formats ), true );
			} catch ( ICE_Files_Exception $e ) {
				// ignore file errors
				continue;
			}

			// get any files?
			if ( count($files) ) {
				// return the first one
				return array_shift( $files );
			}
		}

		// no doc page found
		throw new Exception( sprintf( 'A file for the doc page "%s" does not exist in any of the configured directories', $page ) );
	}

}
