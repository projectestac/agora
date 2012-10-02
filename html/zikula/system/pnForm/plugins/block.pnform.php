<?php
/**
 * Form plugin
 *
 * @copyright (c) 2006, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: block.pnform.php 24342 2008-06-06 12:03:14Z markwest $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author Jorn Wildt
 * @package Zikula_Template_Plugins
 * @subpackage Blocks
 */

/**
 * Smarty function to wrap pnFormRender generated form controls
 * with suitable form tags
 *
 */
function smarty_block_pnform($params, $content, &$render)
{
  if ($content)
  {
    $encodingHtml = (array_key_exists('enctype', $params) ? " enctype=\"$params[enctype]\"" : '');
    $action = htmlspecialchars(pnGetCurrentURI());
    $classString = '';
    if (isset($params['cssClass'])) {
        $classString = "class=\"$params[cssClass]\" ";
    }

    $render->pnFormPostRender();

    $out  =  "<form id=\"pnFormForm\" {$classString}action=\"$action\" method=\"post\"{$encodingHtml}>";
    $out .= $content;
    $out .= "\n<div>\n" . $render->pnFormGetStateHTML() . "\n"; // Add <div> for XHTML validation
    $out .= $render->pnFormGetIncludesHTML() . "\n";
    $out .= $render->pnFormGetAuthKeyHTML() . "
<input type=\"hidden\" name=\"pnFormEventTarget\" id=\"pnFormEventTarget\" value=\"\" />
<input type=\"hidden\" name=\"pnFormEventArgument\" id=\"pnFormEventArgument\" value=\"\" />
<script type=\"text/javascript\">
<!--
function pnFormDoPostBack(eventTarget, eventArgument)
{
  var f = document.getElementById('pnFormForm');
  if (!f.onsubmit || f.onsubmit()) 
  {
    f.pnFormEventTarget.value = eventTarget;
    f.pnFormEventArgument.value = eventArgument;
    f.submit();
  }
}
// -->
</script>
</div>\n";
    $out .= "</form>\n";
    return $out;
  }
}
