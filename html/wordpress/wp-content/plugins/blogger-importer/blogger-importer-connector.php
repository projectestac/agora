<?php

/**
 * @author Andy Clark
 * @copyright 2013
 * Connector for Google Blogger
 * 
 */

class Blogger_Importer_Connector
{
    var $token;
    var $secret;
    var $endpoint;
    var $oauth_token;
    var $callback_url;
    
        /*
        Make the initial connection to blogger, authorise tokens etc. 
        */
        function connect($url)
        {
            // Establish an Blogger_OAuth consumer
            $base_url = admin_url();
            $request_token_endpoint = 'https://www.google.com/accounts/OAuthGetRequestToken';
            $authorize_endpoint = 'https://www.google.com/accounts/OAuthAuthorizeToken';

            $test_consumer = new Blogger_OAuthConsumer('anonymous', 'anonymous', null); // anonymous is a google thing to allow non-registered apps to work

            if (!Blogger_OAuthUtil::sslinstalled())
            {
                return new WP_Error('OpenSSL', __('OpenSSL is not installed check your PHP.INI or ask your server provider to enable the OpenSSL module.','blogger-importer'));
            }

            //prepare to get request token
            //https://developers.google.com/accounts/docs/OAuth_ref#RequestToken
            $sig_method = new Blogger_OAuthSignatureMethod_HMAC_SHA1();
            $parsed = parse_url($request_token_endpoint);
            $params = array('callback' => $base_url, 'scope' => 'http://www.blogger.com/feeds/', 'xoauth_displayname' => 'WordPress');

            $req_req = Blogger_OAuthRequest::from_consumer_and_token($test_consumer, null, "GET", $request_token_endpoint, $params);
            $req_req->sign_request($sig_method, $test_consumer, null);

            // go get the request tokens from Google
            $req_response = wp_remote_get($req_req->to_url(), array('sslverify' => false, 'timeout' => Blogger_Import::REMOTE_TIMEOUT));
            if (is_wp_error($req_response))
            {
                return $req_response;
            }
            $req_token = wp_remote_retrieve_body($req_response);
            if (is_wp_error($req_token))
            {
                return $req_token;
            }

            // parse the tokens
            parse_str($req_token, $tokens);

            $oauth_token = $tokens['oauth_token'];
            $oauth_token_secret = $tokens['oauth_token_secret'];

            //AGC:10/10/2012 Added error handling here based on http://wordpress.org/support/topic/plugin-blogger-importer-invalid-token/page/2?replies=31#post-3243710
            if ($oauth_token == '')
            {
                return new WP_Error('Invalid Token', __('Invalid Token: Check server date, firewall settings and transports (curl, streams and fsockopen)','blogger-importer'));
            } else
            {
                $this->callback_url = add_query_arg(array( 'token' => $oauth_token, 'secret' => $oauth_token_secret ),$url);
                $this->endpoint = $authorize_endpoint;
                $this->oauth_token = $oauth_token;
                return true;
            }
        }
        
        /*
        * 
        */
        function auth_form(){
            //$next_url = admin_url('index.php?import=blogger&amp;noheader=true');
            $auth = esc_attr__('Authorize', 'blogger-importer');
            
            return(sprintf ("<form action='%s' method='get'>
				<p class='submit' style='text-align:left;'>
					<input type='submit' class='button' value='%s' />
					<input type='hidden' name='oauth_token' value='%s' />
					<input type='hidden' name='oauth_callback' value='%s' />
				</p>
			</form>
		</div>\n",$this->endpoint,$auth,$this->oauth_token,$this->callback_url));
        }

        /**
         * We have a authorized request token now, so upgrade it to an access token
         * 
         * @link https://developers.google.com/gdata/articles/oauth#UsingAccessToken
         */
        function auth($token,$secret)
        {
            $oauth_access_token_endpoint = 'https://www.google.com/accounts/OAuthGetAccessToken';

            // auth the token
            $test_consumer = new Blogger_OAuthConsumer('anonymous', 'anonymous', null);
            $auth_token = new Blogger_OAuthConsumer($token, $secret);
            $access_token_req = new Blogger_OAuthRequest("GET", $oauth_access_token_endpoint);
            $access_token_req = $access_token_req->from_consumer_and_token($test_consumer, $auth_token, "GET", $oauth_access_token_endpoint);

            $access_token_req->sign_request(new Blogger_OAuthSignatureMethod_HMAC_SHA1(), $test_consumer, $auth_token);

            // Should be doing validation here, what if wp_remote calls failed?
            $after_access_request = wp_remote_retrieve_body(wp_remote_get($access_token_req->to_url(), array('sslverify' => false, 'timeout' => Blogger_Import::REMOTE_TIMEOUT)));

            parse_str($after_access_request, $access_tokens);

            $this->token = $access_tokens['oauth_token'];
            $this->secret = $access_tokens['oauth_token_secret'];
            
            $this->save_vars();
        }
        
        
        /**
         *  Get a URL using the oauth token for authentication (returns false on failure)
         */
        function oauth_get($url,$params = null)
        {
            $test_consumer = new Blogger_OAuthConsumer('anonymous', 'anonymous', null);
            $goog = new Blogger_OAuthConsumer($this->token, $this->secret, null);
            $request = new Blogger_OAuthRequest("GET", $url, $params);

            //Ref: Not importing properly http://core.trac.wordpress.org/ticket/19096
            $blog_req = $request->from_consumer_and_token($test_consumer, $goog, 'GET', $url, $params);

            $blog_req->sign_request(new Blogger_OAuthSignatureMethod_HMAC_SHA1(), $test_consumer, $goog);

            $data = wp_remote_get($blog_req->to_url(), array('sslverify' => false, 'timeout' => Blogger_Import::REMOTE_TIMEOUT));

            if (wp_remote_retrieve_response_code($data) == 200)
            {
                $response = wp_remote_retrieve_body($data);
            } else
            {
                $response = false;
            }

            return $response;
        }
        
        
        //Need to check, why start index 2? Surely 1 would be better
        function get_total_results($url)
        {
            $response = $this->oauth_get($url,array('max-results' => 1, 'start-index' => 2));

            $feed = new SimplePie();
            $feed->set_raw_data($response);
            $feed->init();
            $results = $feed->get_channel_tags('http://a9.com/-/spec/opensearchrss/1.0/', 'totalResults');

            $total_results = $results[0]['data'];
            unset($feed);
            return (int)$total_results;
        }
        
        //Have we authorised the connection
        function isconnected()
        {
            return (isset($this->secret));
        }
        
        function reset()
        {
            unset($this->secret);
            unset($this->token);
            delete_option('blogger_importer_connector');
        }
        
        function save_vars()
        {
            if (!update_option('blogger_importer_connector', $this)) {
                    Blogger_Import::_log('Error saving connection');
                    Blogger_Import::_log(var_export(get_object_vars($this),true));
            };     
            return !empty($vars);  
        }

        //Return the connection
        static function read_option()
        {
            $connection = get_option('blogger_importer_connector',new Blogger_Importer_Connector());
            return $connection;
        } 

}

?>
