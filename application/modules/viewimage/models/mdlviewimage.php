<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdlviewimage extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_logo($type,$id){
        switch($type)
        {
          case 'sponsor':
          $query = $this->db->query('
                  SELECT sponsors.logo
                  FROM sponsors
                  WHERE sponsors.id = '.$id.'
          ');
          break;
        }

        foreach($query->result() as $row)
        {
          $file = $row->logo;
          if (file_exists($file)) {
      			$filename = basename($file);
      			$fnamearr = explode(".", $filename);
      			$extension = end($fnamearr);

      			switch ($extension){
      				case "jpg" 	: $mime = "image/jpeg"; break;
      				case "jpeg" : $mime = "image/jpeg"; break;
      				case "png" 	: $mime = "image/png"; break;
      				case "gif" 	: $mime = "image/gif"; break;
      				case "xlsx" : $mime = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"; break;
      				case "pdf" 	: $mime = "application/pdf"; break;
      				case "swf"	: $mime = "application/x-shockwave-flash";break;
      				default 	: $mime = "application/force-download";break;
      			}


      			header('Content-type:'.$mime);
      			header('Content-Disposition: inline; filename="'.$filename.'"');
      			header('Content-Transfer-Encoding: binary');
      			header('Accept-Ranges: bytes');
      			header('Content-Length: ' . filesize($file));
      			ob_end_flush();
      			@readfile($file);
      		}else{
      			return false;
      		}
        }
    }

    function get_banner($type,$id){
        switch($type)
        {
          case 'sponsor':
          $query = $this->db->query('
                  SELECT sponsors.banner
                  FROM sponsors
                  WHERE sponsors.id = '.$id.'
          ');
          break;
        }

        foreach($query->result() as $row)
        {
          $file = $row->banner;
          if (file_exists($file)) {
      			$filename = basename($file);
      			$fnamearr = explode(".", $filename);
      			$extension = end($fnamearr);

      			switch ($extension){
      				case "jpg" 	: $mime = "image/jpeg"; break;
      				case "jpeg" : $mime = "image/jpeg"; break;
      				case "png" 	: $mime = "image/png"; break;
      				case "gif" 	: $mime = "image/gif"; break;
      				case "xlsx" : $mime = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"; break;
      				case "pdf" 	: $mime = "application/pdf"; break;
      				case "swf"	: $mime = "application/x-shockwave-flash";break;
      				default 	: $mime = "application/force-download";break;
      			}


      			header('Content-type:'.$mime);
      			header('Content-Disposition: inline; filename="'.$filename.'"');
      			header('Content-Transfer-Encoding: binary');
      			header('Accept-Ranges: bytes');
      			header('Content-Length: ' . filesize($file));
      			ob_end_flush();
      			@readfile($file);
      		}else{
      			return false;
      		}
        }
    }

}