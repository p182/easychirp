<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Provides access to a single template which the output of your view 
* scripts gets injected into. 
*
* @package EasyChirp
* @subpackage Libraries
* @author Andrew Woods <atwoods1@gmail.com>
* @version 0.1 
* 
*/

/**
* Provides access to Abraham's twitteroauth library
*
* @see https://github.com/abraham/twitteroauth
*/

require_once APPPATH.'third_party/twitteroauth/twitteroauth/twitteroauth.php';
require_once APPPATH.'third_party/twitteroauth/twitteroauth/OAuth.php';

class Twitter_lib {

	public $twitteroauth;

	public function __construct($params)
	{
		$param_count = count($params);
		if ( $param_count == 2)
		{
			list($c_key, $c_secret) = $params;
			$this->twitteroauth = new twitteroauth($c_key, $c_secret);
		}
		else if ($param_count == 4)
		{
			list($c_key, $c_secret, $a_key, $a_secret) = $params;
			$this->twitteroauth = new twitteroauth($c_key, $c_secret, $a_key, $a_secret);
		}
		else
		{
			error_log('Incorrect number of parameters');
			$this->twitteroauth = FALSE;
		}
		
	}
}

/* End of file twitter_lib.php */ 
/* Location: ./application/libraries/twitter_lib.php */