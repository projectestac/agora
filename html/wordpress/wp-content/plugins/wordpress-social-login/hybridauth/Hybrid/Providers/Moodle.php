<?php

/**
 * Hybrid_Providers_Moodle provider adapter based on OAuth2 protocol
 *
 * http://hybridauth.sourceforge.net/userguide/IDProvider_info_Google.html
 */
class Hybrid_Providers_Moodle extends Hybrid_Provider_Model_OAuth2
{
	/**
	* IDp wrappers initializer
	*/
	function initialize()
	{
		parent::initialize();

		if ( ! $this->config["keys"]["id"] || ! $this->config["keys"]["secret"] ){
			throw new Exception( "Your application id and secret are required in order to connect to {$this->providerId}.", 4 );
		}
		$this->api->api_base_url = 'http://atenea-dev.upcnet.es/agora';
		// Provider api end-points
		$this->api->authorize_url  = $this->api->api_base_url."/local/oauth/login.php";
		$this->api->token_url      = $this->api->api_base_url."/local/oauth/token.php";
		$this->api->token_info_url = $this->api->api_base_url."/local/oauth/token_info.php";
	}

	/**
	* begin login step
	*/
	function loginBegin()
	{
		$parameters = array('client_id' => $this->config["keys"]["id"], 'response_type' => 'code', 'scope'=>'user_info');
		$optionals  = array('client_id', 'response_type', 'scope');

		foreach ($optionals as $parameter){
			if( isset( $this->config[$parameter] ) && ! empty( $this->config[$parameter] ) ){
				$parameters[$parameter] = $this->config[$parameter];
			}
		}

		Hybrid_Auth::redirect( $this->api->authorizeUrl( $parameters ) );
	}

	/**
	* load the user profile from the IDp api client
	*/
	function getUserProfile()
	{
		// refresh tokens if needed
		$this->refreshToken();

		// ask google api for user infos
		$response = $this->api->api($this->api->api_base_url."/local/oauth/user_info.php" , 'GET', array('access_token'=> $this->api->access_token));

		if ( !isset($response->id) || !isset($response->id) || isset( $response->error ) ){
			throw new Exception( "User profile request failed! {$this->providerId} returned an invalid response.", 6 );
		}

		$this->user->profile->identifier    = (property_exists($response,'id'))?$response->id:"";
		$this->user->profile->firstName     = (property_exists($response,'firstname'))?$response->firstname:"";
		$this->user->profile->lastName      = (property_exists($response,'lastname'))?$response->lastname:"";
		$this->user->profile->displayName   = $response->username;
		//$this->user->profile->photoURL      = (property_exists($response,'picture'))?$this->api->api_base_url.'/pluginfile.php/'.$response->picture.'/user/icon/f2':"";
		$this->user->profile->email         = (property_exists($response,'email'))?$response->email:"";
		$this->user->profile->emailVerified = $this->user->profile->email;
		$this->user->profile->country      = (property_exists($response,'country'))?$response->country:"";
		$this->user->profile->phone      = (property_exists($response,'phone1'))?$response->phone1:"";
		$this->user->profile->address      = (property_exists($response,'address'))?$response->address:"";
		$this->user->profile->language      = (property_exists($response,'lang'))?$response->lang:"";
		$this->user->profile->description      = (property_exists($response,'description'))?$response->description:"";

		return $this->user->profile;
	}

}
