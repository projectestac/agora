<?php
class Pages_Util
{

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
                $catsarray['__META__']['module'] = "Pages"; // required for search operation
            }
        } else {
            $catsarray = array();
        }
        return $catsarray;
    }
}
