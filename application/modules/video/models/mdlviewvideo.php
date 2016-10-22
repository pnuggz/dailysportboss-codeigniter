<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdlviewvideo extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_video_ads($id){
        $query = $this->db->query('
                SELECT video.video
                FROM video
                WHERE video.sponsorsid = '.$id.'
        ');

        foreach($query->result() as $row)
        {

          $file = $row->video;


        }
        $this->load->library('VideoStream');
        $stream = new VideoStream($file);
        $stream->start();
    }

}
