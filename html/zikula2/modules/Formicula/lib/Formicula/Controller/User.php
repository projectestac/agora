<?php
/**
 * Formicula - the contact mailer for Zikula
 * -----------------------------------------
 *
 * @copyright  (c) Formicula Development Team
 * @link       https://github.com/landseer/Formicula
 * @license    GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @author     Frank Schummertz <frank@zikula.org>
 * @package    Third_Party_Components
 * @subpackage Formicula
 */

class Formicula_Controller_User extends Zikula_AbstractController
{
    public function postInitialize()
    {
        $this->view->setCaching(false)->add_core_data();
    }

    /**
     * main
     * main entry point for the user
     *
     *@param form int number of form to show
     *@returns view output
     */
    public function main($args=array())
    {
        $default_form = $this->getVar('default_form', 0);
        $form = (int)FormUtil::getPassedValue('form', (isset($args['form'])) ? $args['form'] : $default_form, 'GETPOST');
        $cid  = (int)FormUtil::getPassedValue('cid',  (isset($args['cid'])) ? $args['cid'] : -1,  'GETPOST');

        $custom = unserialize(SessionUtil::getVar('formicula_custom'));
        $userdata = unserialize(SessionUtil::getVar('formicula_userdata'));
        SessionUtil::delVar('formicula_custom');
        SessionUtil::delVar('formicula_userdata');
        
        // get submitted information - will be passed to the template
        // addinfo is an array:
        // addinfo[name1] = value1
        // addinfo[name2] = value2
        $addinfo  = FormUtil::getPassedValue('addinfo',  (isset($args['addinfo'])) ? $args['addinfo'] : array(),  'GETPOST');

        // reset captcha
        SessionUtil::delVar('formicula_captcha');

        if ($cid == -1) {
            $contacts = ModUtil::apiFunc('Formicula', 'user', 'readValidContacts',
                                         array('form' => $form));
        } else {
            $contacts[] = ModUtil::apiFunc('Formicula', 'user', 'getContact',
                                           array('cid'  => $cid,
                                                 'form' => $form));
        }

        if (count($contacts) == 0) {
            return LogUtil::registerPermissionError(System::getHomepageUrl());
        }

        // default user values with an empty form
        if (UserUtil::isLoggedIn()) {
            $uname = (UserUtil::getVar('name') == '') ? UserUtil::getVar('uname') : UserUtil::getVar('name');
            $uemail = UserUtil::getVar('email');
        } else {
            $uname = '';
            $uemail = '';
        }

        $spamcheck = $this->getVar('spamcheck');
        if ($spamcheck == 1) {
            // Split the list of formids to exclude from spam checking into an array
            $excludespamcheck = explode(',', $this->getVar('excludespamcheck'));
            if(is_array($excludespamcheck) && array_key_exists($form, array_flip($excludespamcheck))) {
                $spamcheck = 0;
            }
        }

        $this->view->add_core_data()->setCaching(false);
        if (empty($userdata)) {
            $userdata = array(
                'uname' => $uname,
                'uemail' => $uemail,
                'comment' => '');
        }
        $this->view->assign('custom', $custom);
        $this->view->assign('userdata', $userdata);
        // for bw compatibility also provide uname and uemail
        $this->view->assign('uname', $uname);
        $this->view->assign('uemail', $uemail);
        $this->view->assign('contacts', $contacts);
        $this->view->assign('addinfo', $addinfo);
        $this->view->assign('spamcheck', $spamcheck);
        return $this->view->fetch('forms' . DIRECTORY_SEPARATOR . $form.'_userform.html');
    }

    /**
     * send
     * sends the mail to the contact and, if configured, to the user and dbase
     *@param cid         int contact id
     *@param form        int form id
     *@param userformat  string email format for user, either 'plain' (default) or 'html'
     *@param adminformat string email format for admin, either 'plain' (default) or 'html'
     *@param dataformat  string form fields format, either 'plain' (default) or 'array'
     *@param formdata    array  forms fields in array format if configured in dataformat
     *@param uname       string users name
     *@param uemail      string users email
     *@param url         string users homepage
     *@param phone       string users phone
     *@param company     string users company
     *@param location    string users location
     *@param comment     string users comment
     *@returns view output
     */
    public function send($args=array())
    {
        $form           = (int)FormUtil::getPassedValue('form',        (isset($args['form'])) ? $args['form'] : 0, 'GETPOST');
        $cid            = (int)FormUtil::getPassedValue('cid',         (isset($args['cid'])) ? $args['cid'] : 0,  'GETPOST');
        $captcha        = (int)FormUtil::getPassedValue('captcha',     (isset($args['captcha'])) ? $args['captcha'] : 0, 'GETPOST');
        $userformat     =      FormUtil::getPassedValue('userformat',  (isset($args['userformat'])) ? $args['userformat'] : 'plain',  'GETPOST');
        $adminformat    =      FormUtil::getPassedValue('adminformat', (isset($args['adminformat'])) ? $args['adminformat'] : 'plain', 'GETPOST');
        $dataformat     =      FormUtil::getPassedValue('dataformat',  (isset($args['dataformat'])) ? $args['dataformat'] : 'plain', 'GETPOST');
        $returntourl    =      FormUtil::getPassedValue('returntourl', (isset($args['returntourl'])) ? $args['returntourl'] : '',  'GETPOST');

        // Confirm security token code
        $this->checkCsrfToken();

        if(empty($cid) && empty($form)) {
            return System::redirect(System::getHomepageUrl());
        }
        
        $userdata = array();
        $custom = array();
        // Upload directory
        $uploaddir = $this->getVar('upload_dir');
        // check if it ends with / or we add one
        if(substr($uploaddir, strlen($uploaddir)-1, 1) <> "/") {
            $uploaddir .= "/";
        }
        if ($dataformat == 'array') {        
            $userdata = FormUtil::getPassedValue('userdata', (isset($args['userdata'])) ? $args['userdata'] : array(), 'GETPOST');
            $custom   = FormUtil::getPassedValue('custom', (isset($args['custom'])) ? $args['custom'] : array(), 'GETPOST');
            $userdata['uname']    = isset($userdata['uname']) ? $userdata['uname'] : '';
            $userdata['uemail']   = isset($userdata['uemail']) ? $userdata['uemail'] : '';
            $userdata['url']      = isset($userdata['url']) ? $userdata['url'] : '';
            $userdata['phone']    = isset($userdata['phone']) ? $userdata['phone'] : '';
            $userdata['company']  = isset($userdata['company']) ? $userdata['company'] : '';
            $userdata['location'] = isset($userdata['location']) ? $userdata['location'] : '';
            $userdata['comment']  = isset($userdata['comment']) ? $userdata['comment'] : '';

            foreach ($custom as $k => $custom_field) {
                $custom_field['mandatory'] = ($custom_field['mandatory'] == 1) ? true : false;
                
                // get uploaded files
                if(isset($_FILES['custom'][$k]['data']['tmp_name'])) {
                    $custom[$k]['data']['error'] = $_FILES['custom'][$k]['data']['error'];
                    if($custom_field['data']['error'] == 0) {
                        $custom_field['data']['size'] = $_FILES['custom'][$k]['data']['size'];
                        $custom_field['data']['type'] = $_FILES['custom'][$k]['data']['type'];
                        $custom_field['data']['name'] = $_FILES['custom'][$k]['data']['name'];
                        $custom_field['upload'] = true;
                        move_uploaded_file($_FILES['custom'][$k]['data']['tmp_name'], DataUtil::formatForOS($uploaddir.$custom_field['data']['name']));
                    } else {
                        // error - replace the 'data' with an errormessage
                        $custom_field['data'] = constant("_FOR_UPLOADERROR".$custom_field['data']['error']);
                    }
                } else {
                    $custom_field['upload'] = false;
                }
            }

        } else {
            $userdata['uname']    = FormUtil::getPassedValue('uname',     (isset($args['uname'])) ? $args['uname'] : '', 'GETPOST');
            $userdata['uemail']   = FormUtil::getPassedValue('uemail',    (isset($args['uemail'])) ? $args['uemail'] : '',  'GETPOST');
            $userdata['url']      = FormUtil::getPassedValue('url',       (isset($args['url'])) ? $args['url'] : '', 'GETPOST');
            $userdata['phone']    = FormUtil::getPassedValue('phone',     (isset($args['phone'])) ? $args['phone'] : '',  'GETPOST');
            $userdata['company']  = FormUtil::getPassedValue('company',   (isset($args['company'])) ? $args['company'] : '', 'GETPOST');
            $userdata['location'] = FormUtil::getPassedValue('location',  (isset($args['location'])) ? $args['location'] : '',  'GETPOST');
            $userdata['comment']  = FormUtil::getPassedValue('comment',   (isset($args['comment'])) ? $args['comment'] : '', 'GETPOST');

            // we read custom fields until we find three missing indices in a row
            $i = 0;
            $missing = 0;
            do {
                $custom[$i]['name'] = FormUtil::getPassedValue('custom'.$i.'name', null, 'POST');
                if($custom[$i]['name'] == null) {
                    // increase the number of missing indices and clear this custom var
                    $missing++;
                    unset($custom[$i]);
                } else {
                    $custom[$i]['mandatory'] = (FormUtil::getPassedValue('custom'.$i.'mandatory') == 1) ? true : false;
    
                    // get uploaded files
                    if(isset($_FILES['custom'.$i.'data']['tmp_name'])) {
                        $custom[$i]['data']['error'] = $_FILES['custom'.$i.'data']['error'];
                        if($custom[$i]['data']['error'] == 0) {
                            $custom[$i]['data']['size']     = $_FILES['custom'.$i.'data']['size'];
                            $custom[$i]['data']['type']     = $_FILES['custom'.$i.'data']['type'];
                            $custom[$i]['data']['name']     = $_FILES['custom'.$i.'data']['name'];
                            $custom[$i]['upload'] = true;
                            move_uploaded_file($_FILES['custom'.$i.'data']['tmp_name'], DataUtil::formatForOS($uploaddir.$custom[$i]['data']['name']));
                        } else {
                            // error - replace the 'data' with an errormessage
                            $custom[$i]['data'] = constant("_FOR_UPLOADERROR".$custom[$i]['data']['error']);
                        }
                    } else {
                        $custom[$i]['data'] = FormUtil::getPassedValue('custom'.$i.'data');
                        $custom[$i]['upload'] = false;
                    }
                    // reset the errorcounter if an existing field is found
                    $missing = 0;
                    // increase the counter
                    // $i++;
                }
                // increase the counter
                $i++;
            } while ($missing < 3);
        }
        
        // remove tags from comment to avoid spam
        $userdata['comment'] = strip_tags($userdata['comment']);

        // check captcha
        $spamcheck = $this->getVar('spamcheck');
        if($spamcheck == 1) {
            $excludespamcheck = explode(',', $this->getVar('excludespamcheck'));
            if(is_array($excludespamcheck) && array_key_exists($form, array_flip($excludespamcheck))) {
                $spamcheck = 0;
            }
        }
        if($spamcheck==1) {
            $captcha_ok = false;
            $cdata = @unserialize(SessionUtil::getVar('formicula_captcha'));
            if(is_array($cdata)) {
                switch($cdata['z']) {
                    case '0':
                        $captcha_ok = (((int)$cdata['x'] + (int)$cdata['y'])== $captcha);
                        break;
                    case '1':
                        $captcha_ok = (((int)$cdata['x'] - (int)$cdata['y'])== $captcha);
                        break;
                    default:
                    // $captcha_ok is false
                }
            }

            if($captcha_ok==false) {
                SessionUtil::delVar('formicula_captcha');
                // todo: append params to $returntourl and redirect, see ticket #44
                $params = array('form' => $form);
                if(is_array($addinfo) && count($addinfo)>0) {
                    $params['addinfo'] = $addinfo;
                }
                SessionUtil::setVar('formicula_userdata', serialize($userdata));
                SessionUtil::setVar('formicula_custom', serialize($custom));
                return LogUtil::registerError($this->__('The calculation to prevent spam was incorrect. Please try again.'), null, ModUtil::url('Formicula', 'user', 'main', $params));
            }
        }
        SessionUtil::delVar('formicula_captcha');

        // Check hooked modules for validation
        $hookvalidators = $this->notifyHooks(new Zikula_ValidationHook('formicula.ui_hooks.forms.validate_edit', new Zikula_Hook_ValidationProviders()))->getValidators();
        if ($hookvalidators->hasErrors()) {
            SessionUtil::setVar('formicula_userdata', serialize($userdata));
            SessionUtil::setVar('formicula_custom', serialize($custom));
            return LogUtil::registerError($this->__('The validation of the hooked security module was incorrect. Please try again.'), null, ModUtil::url('Formicula', 'user', 'main', array('form' => $form)));
        }

        $params = array('form' => $form);
        if(isset($addinfo) && is_array($addinfo) && count($addinfo)>0) {
            $params['addinfo'] = $addinfo;
        }

        if(empty($userformat) || ($userformat<>'plain' && $userformat<>'html' && $userformat<>'none')) {
            $userformat = 'plain';
        }
        if(empty($adminformat) || ($adminformat<>'plain' && $adminformat<>'html')) {
            $adminformat = 'plain';
        }

        if(!SecurityUtil::checkPermission('Formicula::', "$form:$cid:", ACCESS_COMMENT)) {
            return LogUtil::registerPermissionError(ModUtil::url('Formicula', 'user', 'main', array('form' => $form)));
        }

        // very basic input validation against HTTP response splitting
        $userdata['uemail'] = str_replace(array('\r', '\n', '%0d', '%0a'), '', $userdata['uemail']);

        
        $contact = ModUtil::apiFunc('Formicula', 'user', 'getContact',
                                    array('cid'  => $cid,
                                          'form' => $form));

        $this->view->setCaching(false);
        $this->view->assign('contact', $contact);
        $this->view->assign('userdata', $userdata);

        if(ModUtil::apiFunc('Formicula',
                'user',
                'checkArguments',
                array('userdata'   => $userdata,
                'custom'     => $custom,
                'userformat' => $userformat)) == true) {
            // send the submitted data to the contact(s)
            if(ModUtil::apiFunc('Formicula', 'user', 'sendtoContact',
                                array('contact'  => $contact,
                                      'userdata' => $userdata,
                                      'custom'   => $custom,
                                      'form'     => $form,
                                      'format'   => $adminformat)) == false) {
                return LogUtil::registerError($this->__('There was an error sending the email.'), null, ModUtil::url('Formicula', 'user', 'main', array('form' => $form)));
            }

            // send the submitted data as confirmation to the user
            if(($this->getVar('send_user') == 1) && ($userformat <> 'none')) {
                // we replace the array of data of uploaded files with the filename
                $this->view->assign('sendtouser', ModUtil::apiFunc('Formicula', 'user', 'sendtoUser',
                                    array('contact'  => $contact,
                                          'userdata' => $userdata,
                                          'custom'   => $custom,
                                          'form'     => $form,
                                          'format'   => $userformat )));
            }

            // store the submitted data in the database
            $store_data = $this->getVar('store_data');
            if ($store_data == 1) {
                $store_data_forms = $this->getVar('store_data_forms');
                $store_data_forms_arr = explode(',', $store_data_forms);
                if (empty($store_data_forms) || (is_array($store_data_forms_arr) && in_array($form, $store_data_forms_arr))) {
                    ModUtil::apiFunc('Formicula', 'user', 'storeInDatabase',
                                        array('contact'  => $contact,
                                              'userdata' => $userdata,
                                              'custom'   => $custom,
                                              'form'     => $form));
                }
            }

            $this->view->assign('custom', ModUtil::apiFunc('Formicula', 'user', 'removeUploadInformation', array('custom' => $custom)));
            return $this->view->fetch('forms' . DIRECTORY_SEPARATOR . $form."_userconfirm.html");
        } else {
            $this->view->assign('custom', ModUtil::apiFunc('Formicula', 'user', 'removeUploadInformation', array('custom' => $custom)));
            return $this->view->fetch('forms' . DIRECTORY_SEPARATOR . $form."_usererror.html");
        }
    }

    /**
     * getimage
     * returns an image for the captcha even if zTemp is located outside of the webroot
     *@param img  string the image filename
     *@returns image output
     */
    public function getimage()
    {
        $img = FormUtil::getPassedValue('img', '', 'GET');

        $temp = System::getVar('temp');
        if(StringUtil::right($temp, 1) <> '/') {
            $temp .= '/';
        }
        $imgfile = $temp . 'formicula_cache/' . DataUtil::formatForStore($img);
        $parts = explode('.', $img);
        $data = file_get_contents($imgfile);

        $mimetypes = array('png' => 'image/png',
                           'jpg' => 'image/jpeg',
                           'gif' => 'image/gif');

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: formicula image");
        header("Content-Disposition: inline; filename=" . DataUtil::formatForDisplay($img) . ";");
        header("Content-type: image/" . $mimetypes[$parts[1]]);
        header("Content-Transfer-Encoding: binary");

        echo $data;
        exit;
    }
}