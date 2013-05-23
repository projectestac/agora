<?php

class News_Util {

    /**
     * Reformat the attributes array
     * from {0 => {name => '...', value => '...'}} to {name => value}
     *
     * @param array $incoming Attribute array indexed by integer
     * @return array attribute array indexed by name
     */
    public static function reformatAttributes($incoming) {
        $attributes = array();
        foreach ($incoming as $attr) {
            if (!empty($attr['name']) && !empty($attr['value'])) {
                $attributes[$attr['name']] = $attr['value'];
            }
        }
        return $attributes;
    }

    /**
     * Validate article data
     *
     * @param object $controller controller object
     * @param array $story article array
     * @return boolean
     */
    public static function validateArticle($story) {
        $dom = ZLanguage::getModuleDomain('News');
        // Validate the input
        $validationerror = false;
        if ($story['action'] != News_Controller_User::ACTION_PREVIEW && empty($story['title'])) {
            $validationerror .= __f('Error! You did not enter a %s.', __('title', $dom), $dom) . "\n";
        }
        // both text fields can't be empty
        if ($story['action'] != News_Controller_User::ACTION_PREVIEW && empty($story['hometext']) && empty($story['bodytext'])) {
            $validationerror .= __f('Error! You did not enter the minimum necessary %s.', __('article content', $dom), $dom) . "\n";
        }

        return $validationerror;
    }

    /**
     * convert categories array to proper filter info
     * @param array $filtercats
     * @return array
     */
    public static function formatCategoryFilter($filtercats)
    {
        if (is_array($filtercats)) {
            $catsarray = is_array($filtercats['__CATEGORIES__']) ? $filtercats['__CATEGORIES__'] : array('Main' => 0);
            foreach ($catsarray as $propname => $propid) {
                if (is_array($propid)) { // select multiple used
                    foreach ($propid as $int_key => $int_id) {
                        if ($int_id <= 0) {
                            unset($catsarray[$propname][$int_key]); // removes categories set to 'all' (0)
                        }
                        if (empty($catsarray[$propname])) {
                            unset($catsarray[$propname]);
                        }
                    }
                } elseif (strstr($propid, ',')) { // category Zikula.UI.SelectMultiple used
                    $catsarray[$propname] = explode(',', $propid);
                    // no propid should be '0' in this case
                } else { // single selectbox used
                    if ($propid <= 0) {
                        unset($catsarray[$propname]); // removes categories set to 'all' (0)
                    }
                }
            }
            if (!empty($catsarray)) {
                $catsarray['__META__']['module'] = "News"; // required for search operation
            }
        } else {
            $catsarray = array();
        }
        return $catsarray;
    }
}