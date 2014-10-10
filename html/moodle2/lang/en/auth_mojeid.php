<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Strings for component 'auth_mojeid', language 'en', branch 'MOODLE_26_STABLE'
 *
 * @package   auth_mojeid
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['adult_control'] = 'Adult control';
$string['adult_control_failed'] = 'Check the age of majority was unsuccessful.';
$string['adult_control_info'] = 'Turn on if you want to allow access only to users older than 18 years.';
$string['auth_mojeiddescription'] = '<p>This plugin allows to login via mojeID authority.</p><p><strong>"Security level"</strong> is appropriate to enforce the use of credible verification. But not each user is able to use  other than the standard verification procedure using a login and password.</p><p>The <strong>"Verification Level"</strong> allows log in only whose users that have the verification level higher or at least you set here. <strong>Beware</strong>, if you need to use authentication in <strong>„Validation“</strong> or <strong>„Validation with adult control“</strong>, it is required to apply for the <strong>mojeID "Full Access" level.</strong> You can apply the association CZ.NIC as a provider of this service. <a href="https://www.mojeid.cz/page/1861/varianty-sluzby/">Read more here.</a> In the case of services mojeID in "partial access" level, the "Verification Level" <strong>is not evaluated in authentication process and the user can access everytime the username and passowrd matches.</strong></p><p><strong>"Why mojeID (URL)"</strong> setting is used when you like to include into your Moodle some page with explanation of benefits why use mojeID authority. Please, fillin the URL/HTTP address pointing to your page "Why mojeID". The link under the login form will point to the page with the description will then be directed to your specified address.</p><h3>How to create a page "Why mojeID"</h3><p>Log in as Moodle Administrator and go to the main page of Moodle. In the <strong>"Administration"</strong> enable Editing mode. In the <strong>"Main menu"</strong> select <strong>"Add an activity or resource"</strong>. From the menu, select <strong>"Page"</strong> and here in the <strong>"Name"</strong> and <strong>"Description"</strong> insert text <strong>"Why mojeID"</strong>. In the <strong>"Site Content"</strong> insert text, or even images <a href="https://www.mojeid.cz/vyhody/">from this website</a>. Save the button <strong>"Save and display"</strong> from the address bar displayed page, copy the URL address that you enter in the component\'s MojeID.</p><h3>Adding a logo "Supports mojeID"</h3><p>In the menu, select <strong>"Site administration"</strong> -> <strong>"Language"</strong> -> <strong>"Language customization"</strong>. In selectbox appears, select the language you want to edit and press <strong>"Open language pack for editing"</strong>. After loading the package, confirm with <strong>"Continue"</strong>. In the filter, select from the <strong>"Core"</strong> -> <strong>"moodle.php"</strong> as a string identifier type  <strong>"loggedinnot"</strong> and press <strong>"Show string"</strong>. Then in the box that appears with the string <strong>"You are not logged in"</strong> append this text <strong>"&lt;div id="auth_mojeid_logo"&gt;&lt;img src="/auth/mojeid/api/image/logo-podporuje.png" width="90" height="41" /&gt;&lt;/div&gt;"</strong> and press <strong>"Save changes to the language pack"</strong>.</p><p>If you want to use a different logo, then choose the other one it in <a href="https://www.mojeid.cz/files/mojeid/ikony_podporuje_mojeID.zip">this archive</a>, place it to some folder accesible from the web and use it instead of the default one. In this case, it is needed to set the right size of the image.</p><h3>Change button "Login via mojeID"</h3><p>Select the image file in <a href="https://www.mojeid.cz/files/documents/mojeID_tlacitka.zip">this archive</a>. Place the image to some folder accesible from the web and enter the URL into the <strong>"Login via mojeID (URL)"</strong></p>';
$string['cant_validate_user_account'] = 'It was not possible to verify. Please contact the administrator LMS Moodle.';
$string['certificate'] = 'Certificate';
$string['create'] = 'Create an Account mojeID';
$string['disponsable_password'] = 'Disponsable password';
$string['email_already_used'] = 'Email is already assigned to another authentication method.';
$string['login_mojeid_url'] = 'Sign in with mojeID (URL)';
$string['login_mojeid_url_info'] = 'Entering the URL to the image, you can change the button to sign over mojeID.';
$string['minimal_verification_level_is'] = 'The minimum level of authentication is';
$string['not_exists_mojeid_user_data'] = 'In your profile mojeID add the following data or enable during the login process.';
$string['password'] = 'Password';
$string['pin1_pin2'] = 'PIN1/PIN2';
$string['pin3'] = 'PIN3';
$string['pluginname'] = 'mojeID';
$string['security_level'] = 'Security level';
$string['security_level_info'] = 'What level of security you require for users via applied for authority mojeID.';
$string['sign_in_with'] = 'Sign in with mojeID';
$string['unknown_error_during_communication_with_mojeid'] = 'During communication with the server mojeID unknown error has occurred.';
$string['unknown_error_during_create_user'] = 'Unknown error during create user.';
$string['unknown_error_during_login_user'] = 'Unknown error during login user.';
$string['validation'] = 'Validation';
$string['validation_adult_control'] = 'Validation with adult control';
$string['verification_cancelled'] = 'Verification cancelled.';
$string['verification_failed'] = 'OpenID authentication failed:';
$string['verification_level'] = 'Verification level';
$string['verification_level_control_failed'] = 'Checking the authentication failed.';
$string['verification_level_info'] = 'Set the level at which you want to use authentication when users log.';
$string['why'] = 'Why mojeID';
$string['why_mojeid_url'] = 'Why mojeID (URL)';
$string['why_mojeid_url_info'] = 'Address within this Moodle installation beneath the info about the benefits of authentication methods mojeID.';
$string['you_are_not_adult'] = 'You are not an adult.';
$string['your_account_is_not_valid'] = 'Your account is not validated.';
$string['your_verification_level_is'] = 'Your level of verification is';
