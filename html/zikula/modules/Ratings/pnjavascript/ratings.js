/**
 * Zikula Application Framework
 *
 * @copyright (c) 2002, Zikula Development Team
 * @link http://www.zikula.com
 * @version $Id: ratings.js 12 2009-11-09 09:51:14Z herr.vorragend $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Ratings
*/

/**
 * Record a users rating for an item
 *
 * @params none;
 * @return none;
 * @author Mark West
 */
function ratingsratefromslider(modname, objectid, rating)
{
    Element.update('ratingmessage', recordingvote);
    var pars = "module=Ratings&func=rate&modname=" + modname + "&objectid=" + objectid + "&rating=" + rating;
    var myAjax = new Ajax.Request(
        document.location.pnbaseURL + 'ajax.php',
        {
            method: 'post', 
            parameters: pars, 
            onComplete: ratingsrate_response
        }); 
}


/**
 * Record a users rating for an item
 *
 * @params none;
 * @return none;
 * @author Mark West
 */
function ratingsratefromform()
{
    Element.update('ratingmessage', recordingvote);
    var pars = "module=Ratings&func=rate&"
               + Form.serialize('ratingrateform');
    var myAjax = new Ajax.Request(
        document.location.pnbaseURL + 'ajax.php',
        {
            method: 'post', 
            parameters: pars, 
            onComplete: ratingsrate_response
        }); 
}

/**
 * Ajax response function for the rating: show the result
 *
 * @params none;
 * @return none;
 * @author Mark West
 */
function ratingsrate_response(req)
{
    if(req.status != 200 ) { 
        pnshowajaxerror(req.responseText);
        return;
    }

    var json = pndejsonize(req.responseText);

    Element.update('ratingsratecontent', json.result);
}
