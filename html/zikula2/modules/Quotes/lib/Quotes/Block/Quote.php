<?php
/**
 * Zikula Application Framework
 * @copyright  (c) Zikula Development Team
 * @license    GNU/GPL
 * @category   Zikula_3rdParty_Modules
 * @package    Content_Management
 * @subpackage Quotes
*/

class Quotes_Block_Quote extends Zikula_Controller_AbstractBlock
{
	/**
     * initialise block
	 */
	public function init()
	{
		// Security
		SecurityUtil::registerPermissionSchema('Quotes:Quoteblock:', 'Block ID::');
	}

	/**
     * @return       array with block information
	 * @author       The Zikula Development Team
	 */
	public function info()
	{
		return array('module' => $this->name,
					 'text_type' => $this->__('Quote'),
					 'text_type_long' => $this->__('Random quote block'),
					 'allow_multiple' => true,
					 'form_content' => false,
					 'form_refresh' => false,
					 'show_preview'    => true,
					 'admin_tableless' => true);
	}

	/**
     * display block
	 * @author       The Zikula Development Team
	 */
	public function display($blockinfo)
	{
		// security check
		if (!SecurityUtil::checkPermission('Quotes:Quoteblock:', $blockinfo['bid'].'::', ACCESS_READ)) {
			return;
		}
		// Get current content
		$vars = BlockUtil::varsFromContent($blockinfo['content']);
		
		// filter desplay by hour of the day: @nikp
		$a_datetime = getdate();
		if (isset($vars['hourfrom']) and $vars['hourfrom']>-1 and $a_datetime["hours"]<$vars['hourfrom']) return "";
		if (isset($vars['hourto']) and $vars['hourto']>-1 and $a_datetime["hours"]>$vars['hourto']) return "";
		if (isset($vars['wdayfrom']) and $vars['wdayfrom']>-1 and $a_datetime["wday"]<$vars['wdayfrom']) return "";
		if (isset($vars['wdayto']) and $vars['wdayto']>-1 and $a_datetime["wday"]>$vars['wdayto']) return "";
		if (isset($vars['mdayfrom']) and $vars['mdayfrom']>-1 and $a_datetime["mday"]<$vars['mdayfrom']) return "";
		if (isset($vars['mdayto']) and $vars['mdayto']>-1 and $a_datetime["mday"]>$vars['mdayto']) return "";
		if (isset($vars['monfrom']) and $vars['monfrom']>-1 and $a_datetime["mon"]<$vars['monfrom']) return "";
		if (isset($vars['monto']) and $vars['monto']>-1 and $a_datetime["mon"]>$vars['monto']) return "";
		if (!isset($vars['category'])) {
			$vars['category'] = null;
		}
		
		if (isset($vars['ballooncolor']))
		    $ballooncolor = $vars['ballooncolor'];
		else
		    $ballooncolor="grey";

		// Implementation cached content: @nikp
		$enable_cache = true;
		$write_to_cache = false;	# flag
		$cache_time = 240; # seconds
		if (isset($vars['cache_time'])) $cache_time = $vars['cache_time'];
		$content = "";
		if ($enable_cache and $cache_time>0) {
			$cachefilestem = 'quote_' . $blockinfo['bid'];
			$cachedir = System::getVar('temp');
			if (StringUtil::right($cachedir, 1)<>'/') $cachedir .= '/';
			if (isset($vars['cache_dir']) and !empty($vars['cache_dir'])) $cachedir .= $vars['cache_dir'];
			else $cachedir .= 'any_cache';
			$cachefile = $cachedir .'/'. $cachefilestem;
		   // attempt to load from cache
			if (file_exists($cachefile)) {
				$file_time = filectime($cachefile);
				$now = time();
				$diff = ($now - $file_time);
				if ($diff <= $cache_time) {
					$content = file_get_contents($cachefile);
				}
			}
			if (empty($content)) $write_to_cache = true; # not loaded, flag to write to cache later
		}
		if (empty($content)) {
			// Create output object
            $this->view->setCaching(false); // we implement caching other way
			mt_srand((double)microtime()*1000000);
			$quote = array();
			$apiargs = array();
			$apiargs['status'] = 1;
			// Make a category filter only if categorization is enabled
			$enablecategorization = ModUtil::getVar($this->name, 'enablecategorization');
			if ($enablecategorization) {
				// load the categories system
				if (!Loader::loadClass('CategoryRegistryUtil')) {
					return LogUtil::registerError(__f('Error! Could not load [%s] class.'), 'CategoryRegistryUtil');
				}
				// Get the registrered categories for the module
				$catregistry  = CategoryRegistryUtil::getRegisteredModuleCategories($this->name, 'quotes');
				$this->view->assign('catregistry', $catregistry);
				$apiargs['catregistry'] = $catregistry;
				$apiargs['category'] = $vars['category'];
			}
			$this->view->assign('enablecategorization', $enablecategorization);
			$this->view->assign($vars); // assign the block vars
			if (!is_array($vars['category'])) $vars['category'] = array();
			$this->view->assign('category', $vars['category']);
			// display an error if there are less than two quotes in the db, otherwise assign a random quote to the template
			$total  = ModUtil::apiFunc($this->name, 'user', 'countitems', $apiargs); # count the number of quotes in the db
			$apiargs['numitems'] = 1;
			if ($total < 1) {
				$quote['error'] = __('There are too few Quotes in the database');
			} else if ($total == 1) {
				$quotes = ModUtil::apiFunc($this->name, 'user', 'getall', $apiargs);
				$quote = $quotes[0];
			} else {
				$random = mt_rand(1, $total);
				$apiargs['startnum'] = $random;
				$quotes = ModUtil::apiFunc($this->name, 'user', 'getall', $apiargs);
				$quote = $quotes[0]; // assign the first quote in the result set
			}
			$this->view->assign('quote', $quote);
			$this->view->assign('bid', $blockinfo['bid']);
			$this->view->assign('ballooncolor', $ballooncolor);
			$content = $this->view->fetch('quotes_block_quote.tpl'); # get the block output from the template
		}
		if ($write_to_cache and !empty($content)) {
		   // attempt to write to cache if not loaded before
			if (!file_exists($cachedir)) {
				mkdir($cachedir, 0777); # attempt to make the dir
			}
			if (!file_put_contents($cachefile, $content)) {
				//echo "<br />Could not save data to cache. Please make sure your cache directory exists and is writable.<br />";
			}
		}
		$blockinfo['content'] = $content;
		
		// return the rendered block
		return BlockUtil::themeBlock($blockinfo);
	}

	/**
	 * modify block settings
	 *
	 * @author       The Zikula Development Team
	 * @param        array       $blockinfo     a blockinfo structure
	 * @return       output      the bock form
	 */
	public function modify($blockinfo)
	{
		// Get current content
		$vars = BlockUtil::varsFromContent($blockinfo['content']);
		// Defaults
		if (!isset($vars['hourfrom'])) {
			$vars['hourfrom'] = -1;
		}
		if (!isset($vars['hourto'])) {
			$vars['hourto'] = -1;
		}
		if (!isset($vars['monfrom'])) {
			$vars['monfrom'] = -1;
		}
		if (!isset($vars['monto'])) {
			$vars['monto'] = -1;
		}
		if (!isset($vars['mdayfrom'])) {
			$vars['mdayfrom'] = -1;
		}
		if (!isset($vars['mdayto'])) {
			$vars['mdayto'] = -1;
		}
		if (!isset($vars['wdayfrom'])) {
			$vars['wdayfrom'] = -1;
		}
		if (!isset($vars['wdayto'])) {
			$vars['wdayto'] = -1;
		}
		if (!isset($vars['cache_time'])) {
			$vars['cache_time'] = 120;
		}
		if (!isset($vars['cache_dir'])) {
			$vars['cache_dir'] = 'any_cache';
		}
		if (!isset($vars['ballooncolor'])) {
			$vars['ballooncolor'] = 'grey';
		}
		$ballooncolor=$vars['ballooncolor'];
		$this->view->assign('balloonselected'.$ballooncolor, 'selected="selected"');
		// Create output object
		$this->view->caching = false; # Admin output changes often, we do not want caching
		// Select categories only if enabled for the module
		$enablecategorization = ModUtil::getVar($this->name, 'enablecategorization');
		if ($enablecategorization) {
			// load the categories system
			if (!Loader::loadClass('CategoryRegistryUtil')) {
				return LogUtil::registerError(__f('Error! Could not load [%s] class.'), 'CategoryRegistryUtil');
			}
			// Get the registrered categories for the module
			$catregistry  = CategoryRegistryUtil::getRegisteredModuleCategories($this->name, 'quotes');
			$this->view->assign('catregistry', $catregistry);
		}
		$this->view->assign('enablecategorization', $enablecategorization);
		$this->view->assign($vars); // assign the block vars
		if (!is_array($vars['category'])) $vars['category'] = array();
		$this->view->assign('category', $vars['category']);
		$this->view->assign('hours', range(0, 23));
		$this->view->assign('months', range(1, 12));
		$this->view->assign('wdays', range(1, 7));
		$this->view->assign('mdays', range(1, 31));
		// return the output
		return $this->view->fetch('quotes_block_quote_modify.tpl');
	}

	/**
	 * update block settings
	 *
	 * @author       The Zikula Development Team
	 * @param        array       $blockinfo     a blockinfo structure
	 * @return       $blockinfo  the modified blockinfo structure
	 */
	public function update($blockinfo)
	{
		// Get current content
		$vars = BlockUtil::varsFromContent($blockinfo['content']);

		// alter the corresponding variable
		$vars['hourfrom'] = FormUtil::getPassedValue('hourfrom');
		$vars['hourto'] = FormUtil::getPassedValue('hourto');
		$vars['monfrom'] = FormUtil::getPassedValue('monfrom');
		$vars['monto'] = FormUtil::getPassedValue('monto');
		$vars['mdayfrom'] = FormUtil::getPassedValue('mdayfrom');
		$vars['mdayto'] = FormUtil::getPassedValue('mdayto');
		$vars['wdayfrom'] = FormUtil::getPassedValue('wdayfrom');
		$vars['wdayto'] = FormUtil::getPassedValue('wdayto');
		$vars['cache_time'] = FormUtil::getPassedValue('cache_time');
		$vars['cache_dir'] = FormUtil::getPassedValue('cache_dir');
		$vars['category'] = FormUtil::getPassedValue('category', null);
		$ballooncolor = FormUtil::getPassedValue('ballooncolor', 'grey');
		// Make sure color is allowed.
		switch ($ballooncolor) {
		    case 'black':
		    case 'grey':
		    case 'green':
		    case 'white':
		    case 'yellow':
			break;
		    
		    default:
			$ballooncolor = 'grey';
		}
		$vars['ballooncolor'] = $ballooncolor;
		// write back the new contents
		$blockinfo['content'] = BlockUtil::varsToContent($vars);

		// clear the block cache
		$this->view->clear_cache('quotes_block_quote.tpl');

		return $blockinfo;
	}
}