<?php
/**
 * Copyright Zikula Foundation 2009 - Zikula Application Framework
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license GNU/LGPLv3 (or at your option, any later version).
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Listeners class.
 */
class IWstats_Listeners
{
    /**
     * Event listener for 'core.postinit' event.
     * 
     * @param Zikula_Event $event
     *
     * @return void
     */
    public static function coreinit(Zikula_Event $event)
    {
        ModUtil::apiFunc('IWstats', 'user', 'collect');
    }
}