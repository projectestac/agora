<?php
/**
 * Content
 *
 * @copyright (C) 2007-2010, Content Development Team
 * @link http://github.com/zikula-modules/Content
 * @license See license.txt
 */

function smarty_function_contentcolumncount($params, $view)
{
    $dom = ZLanguage::getModuleDomain('Content');
	// input is layout name
    $layout = isset($params['layout']) ? $params['layout'] : '';
	$columnCount = 1; // assume 1 if no match can be found

	// now start simple matching with a regular expression on the layout name. No science here.
	// Looking for the first numbers in the string and stops with text again. Then take the highest single digit.
	// Examples:
	// layout			columnCount
	// ---------------------------------
	// column21212		2
	// column2d2575		2
	// column3d502525	3
	// column23andtext	3
	//
	if (preg_match('/[1-9]+/', $layout, $matches)) {
        // found first set of numbers
        $matchSplit = str_split($matches[0]);
        rsort($matchSplit);
        $columnCount = $matchSplit[0];
    }

    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $columnCount);
    } else {
        return $columnCount;
    }
}

