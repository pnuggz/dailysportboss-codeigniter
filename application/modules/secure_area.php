<?php
class Secure_area extends MX_Controller
{

	private $controller_name;

	/*
	Controllers that are considered secure extend Secure_area, optionally a $module_id can
	be set to also check if a user can access a particular module in the system.
	*/
	function __construct($token=null)
	{
		parent::__construct();
		$this->load->library('jwt');
   if(array_key_exists('Authorization',$token) && array_key_exists('token',$this->session->userdata))
		{
			if($token['Authorization'] == $this->session->userdata['token'])
			{
				$decode_token = $this->decode_token($token['Authorization']);
	      if($decode_token->exp > time() && $decode_token->data->userid == $this->session->userdata['userid'] && $decode_token->data->username == $this->session->userdata['username'])
	  		{

					$this->session->set_userdata('token',$this->generate_token());
	  		}else{
					echo json_encode("0");exit;
				}
			}else{
				//echo json_encode("0");exit;
			}
    }else{
      //exit('No direct script access allowed');
    }

	}

	function generate_token() {
		$tokenId    = base64_encode(mcrypt_create_iv(32));
		$issuedAt   = time();
		$notBefore  = $issuedAt;             //Adding 10 seconds
		$expire     = $notBefore + 10800;            // Adding 60 seconds
		$serverName = $this->input->server('SERVER_NAME'); // Retrieve the server name from config file

		/*
		 * Create the token as an array
		 */
		$data = [
				'iat'  => $issuedAt,         // Issued at: time when the token was generated
				'jti'  => $tokenId,          // Json Token Id: an unique identifier for the token
				'iss'  => $serverName,       // Issuer
				'nbf'  => $notBefore,        // Not before
				'exp'  => $expire,           // Expire
				'data' => [                  // Data related to the signer user
						'userid'   => $this->session->userdata['userid'], // userid from the users table
						'username'   => $this->session->userdata['username'] // userid from the users table
				]
		];
		$key = base64_encode('dailysportboss');
		$jwt = $this->jwt->encode($data, $key,'HS256');
		return $jwt;
	}

	function decode_token($jwt) {

		$key = base64_encode('dailysportboss');
		$jwtdec = $this->jwt->decode($jwt, $key);
		return $jwtdec;
	}


	function _remove_duplicate_cookies ()
	{
		//php < 5.3 doesn't have header remove so this function will fatal error otherwise
		if (function_exists('header_remove'))
		{
			$CI = &get_instance();

			// clean up all the cookies that are set...
			$headers             = headers_list();
			$cookies_to_output   = array ();
			$header_session_cookie = '';
			$session_cookie_name = $CI->config->item('sess_cookie_name');

			foreach ($headers as $header)
			{
				list ($header_type, $data) = explode (':', $header, 2);
				$header_type = trim ($header_type);
				$data        = trim ($data);

				if (strtolower ($header_type) == 'set-cookie')
				{
					header_remove ('Set-Cookie');

					$cookie_value = current(explode (';', $data));
					list ($key, $val) = explode ('=', $cookie_value);
					$key = trim ($key);

					if ($key == $session_cookie_name)
					{
						// OVERWRITE IT (yes! do it!)
						$header_session_cookie = $data;
						continue;
					}
					else
					{
						// Not a session related cookie, add it as normal. Might be a CSRF or some other cookie we are setting
						$cookies_to_output[] = array ('header_type' => $header_type, 'data' => $data);
					}
				}
			}

			if ( ! empty ($header_session_cookie))
			{
				$cookies_to_output[] = array ('header_type' => 'Set-Cookie', 'data' => $header_session_cookie);
			}

			foreach ($cookies_to_output as $cookie)
			{
				header ("{$cookie['header_type']}: {$cookie['data']}", false);
			}
		}
	}
}
?>
