<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdlviewvideo extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_video_ads($type,$id){
        switch($type){
          case 'mp4':
            $query = $this->db->query('
                    SELECT *
                    FROM video
                    WHERE video.sponsorsid = '.$id.'
            ');

            foreach($query->result() as $row)
            {
              $file = $row->videomp4;
            }
          break;
          case 'webm':
            $query = $this->db->query('
                    SELECT *
                    FROM video
                    WHERE video.sponsorsid = '.$id.'
            ');

            foreach($query->result() as $row)
            {
              $file = $row->videowebm;
            }
          break;
          case 'ogv':
            $query = $this->db->query('
                    SELECT *
                    FROM video
                    WHERE video.sponsorsid = '.$id.'
            ');

            foreach($query->result() as $row)
            {
              $file = $row->videoogv;
            }
          break;
          default:
            $query = $this->db->query('
                    SELECT *
                    FROM video
                    WHERE video.sponsorsid = '.$id.'
            ');

            foreach($query->result() as $row)
            {
              $file = $row->videowebm;
            }
          break;
        }

        $this->load->library('Videostream');
        $stream = new Videostream($file);
        $stream->start();
    }

}
