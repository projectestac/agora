<?php

/**
 * Copyright Scribite Team 2011
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 * @package cribite
 * @link https://github.com/zikula-modules/Scribite
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */
function smarty_function_implodeparams($args)
{
    if (empty($args['params'])) {
        return '';
    }
    $paramsString = '';
    foreach ($args['params'] as $param => $value) {
        $paramsString .= "$param:$value,";
    }
    return rtrim($paramsString, ",");
}
