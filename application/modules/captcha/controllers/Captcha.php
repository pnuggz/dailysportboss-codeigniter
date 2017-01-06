<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('ROOT', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
require_once(APPPATH.DS."modules/secure_area.php");
class Captcha extends Secure_area
{

    function __construct() {
        parent::__construct($this->input->request_headers());
        }

    function index()
    {
      $this->load->library(array('form_validation', 'Recaptcha'));
      $randomword = $this->getRandomWord();
      $this->load->model('mdl_captcha');
      $save = $this->mdl_captcha->insertrandomword($randomword,$this->session->userdata['userid']);
      $data = array(
            'token' => $this->session->userdata['token'],
            'randomword' => $randomword,
            'captcha' => $this->recaptcha->getWidget(), // menampilkan recaptcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );

       $this->output->set_output(json_encode(array('data'=>$data)), 200);
    }

    function getRandomWord($len = 5) {
        $word = array_merge(range('a', 'z'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    function submit($contestid)
    {
      $this->load->library(array('form_validation', 'Recaptcha'));
      $this->form_validation->set_rules('userinput', 'User Input', 'trim|required|max_length[30]|xss_clean|callback_checkuserinput');
      $recaptcha = $this->input->post('g-recaptcha-response');
      $response = $this->recaptcha->verifyResponse($recaptcha);
      if($this->form_validation->run($this) == FALSE  || !isset($response['success']))
      {
        $new=array();
        if(!isset($response['success']))
        {
          $new['message'][]= "Captcha must check.";
        }

        foreach( $this->form_validation->error_array() as $key=>$value) {
           $new['message'][]= $this->form_validation->error_array()[$key];
         }
          $this->output->set_output(json_encode(array('error'=>$new)), 200);
      }else{
        $this->load->model('mdl_captcha');
        $data = array('userid'      =>       $this->session->userdata('userid'),
                      'contestid'    =>      $contestid,
                      'recaptcha'    =>      $this->input->post('g-recaptcha-response'),
                      'userinput'     =>     $this->input->post('userinput'),
                      'verificationdate'     =>      date('Y-m-d H:i:s'),
                      'statusid'    =>      1,
                     );

        $id = $this->mdl_captcha->verificationAds($data);
        if($id){
          $this->output->set_output(json_encode(array('success'=>array('message'=>'Thank you for watching ads.'))), 200);
        }else{
          $this->output->set_output(json_encode(array('error'=>array('message'=>'Failed submit verification ads.'))), 200);
        }
      }
    }

    function checkuserinput($input)
    {
      $this->load->model('mdl_captcha');
      $randomword = $this->mdl_captcha->verificationRandomWord($input,$this->session->userdata('userid'));
      if($randomword > 0)
      {
        return TRUE;
      }else{
        $this->form_validation->set_message('checkuserinput', 'User Input Not Match.');
        return FALSE;
      }
    }
}
