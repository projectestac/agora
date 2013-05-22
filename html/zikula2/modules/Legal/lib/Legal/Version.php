<?php
/**
 * Copyright (c) 2001-2012 Zikula Foundation
 *
 * This work is contributed to the Zikula Foundation under one or more
 * Contributor Agreements and licensed to You under the following license:
 *
 * @license http://www.gnu.org/licenses/lgpl-3.0.html GNU/LGPLv3 (or at your option any later version).
 * @package Legal
 *
 * Please see the NOTICE file distributed with this source code for further
 * information regarding copyright and licensing.
 */

/**
 * Provides version information for the Legal module.
 */
class Legal_Version extends Zikula_AbstractVersion
{
    /**
     * Retrieve version and other metadata for the Legal module.
     *
     * @return array Metadata for the Legal module, as specified by Zikula core.
     */
    public function getMetaData()
    {
        return array(
                'oldnames' => 'legal',
                'displayname' => __('Legal info manager'),
                'description' => __("Provides an interface for managing the site's legal documents."),
                //! module name that appears in URL
                'url' => __('legalmod'),
                'version' => '2.0.1',
                'core_min' => '1.3.0', // Fixed to 1.3.x range
                'core_max' => '1.3.99', // Fixed to 1.3.x range
                'securityschema' => array(
                        $this->name . '::' => '::',
                        $this->name . '::legalnotice' => '::',
                        $this->name . '::termsofuse' => '::',
                        $this->name . '::privacypolicy' => '::',
                        $this->name . '::agepolicy' => '::',
                        $this->name . '::accessibilitystatement' => '::',
                        $this->name . '::cancellationrightpolicy' => '::',
                        $this->name . '::tradeconditions' => '::'
                ),
        );
    }

}