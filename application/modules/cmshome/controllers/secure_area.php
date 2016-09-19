<?php
class Secure_area extends MX_Controller
{

	private $controller_name;

	/*
	Controllers that are considered secure extend Secure_area, optionally a $module_id can
	be set to also check if a user can access a particular module in the system.
	*/
	function __construct($module_id=null,$submodule_id=null)
	{
		parent::__construct();
    if($module_id)
		{
      if(!$this->session->userdata('logged_in'))
  		{
        $data['view_file'] = "cmshome";
        $this->load->module('template');
        $this->template->cmslayout($data);
  		}
    }else{
      exit('No direct script access allowed');
    }

	}

	function get_controller_name() {
		return strtolower($this->controller_name);
	}

	function _initialize_pagination($object, $lines_per_page, $limit_from = 0, $total_rows = -1, $function='index', $filter='')
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url($this->get_controller_name() . "/$function/" . $filter);
		$config['total_rows'] = $total_rows > -1 ? $total_rows : call_user_func(array($object, 'get_total_rows'));
		$config['per_page'] = $lines_per_page;
		$config['num_links'] = 2;
		$config['last_link'] = $this->lang->line('common_last_page');
		$config['first_link'] = $this->lang->line('common_first_page');
		// page is calculated here instead of in pagination lib
		$config['cur_page'] = $limit_from > 0  ? $limit_from : 0;
		$config['page_query_string'] = FALSE;
		$config['uri_segment'] = 0;
		$this->pagination->initialize($config);
		return $this->pagination->create_links();
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
