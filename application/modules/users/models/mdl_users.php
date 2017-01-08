<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_users extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login_users($username, $password) {
        $enc_password = md5($password);

        $this->db->where('username', $username);
        $this->db->where('password', $enc_password);

        $query = $this->db->get('users');
        if($query->num_rows() == 1) {
            return $query->row()->id;
        }
    }

    function get_table() {
        $table = "users";
        return $table;
    }

    function get_contest_winners($user_id)
    {
        $result = array();
        $query = $this->db->query('
        SELECT *
        FROM contests_winners
        JOIN contests_users_entries on contests_users_entries.id = contests_winners.contests_users_entry_id
        JOIN contests_rosters on contests_users_entries.id = contests_rosters.contests_users_entry_id
        JOIN contests on contests.id = contests_winners.contestsid
        JOIN contests_prize on contests_prize.id=contests.contests_prizes_id
        JOIN sponsors ON sponsors.id = contests.sponsors_id
        WHERE contests_users_entries.user_id = ' . $user_id . '
        ');
        foreach($query->result() as $row)
        {
          $result[] = array(
              "id" => $row->id,
              "contest_id" => $row->contest_id,
              "userid" => $row->user_id,
              "entry_date_time" => $row->entry_date_time,
              "user_entry_count" => $row->user_entry_count,
              "contests_users_entry_id" => $row->contests_users_entry_id,
              "roster_name" => $row->roster_name,
              "creation_date_time" => $row->creation_date_time,
              "sponsor_id" => $row->sponsors_id,
              "sponsorname"  => $row->sponsor,
              'sponsorlogodesktop'           =>  base_url().'viewimage/logo/sponsor/desktop/'.$row->sponsors_id,
              'sponsorlogotablet'           =>  base_url().'viewimage/logo/sponsor/tablet/'.$row->sponsors_id,
              'sponsorlogomobile'           =>  base_url().'viewimage/logo/sponsor/mobile/'.$row->sponsors_id,
              'sponsorbannerdesktop'         =>  base_url().'viewimage/banner/sponsor/desktop/'.$row->sponsors_id,
              'sponsorbannertablet'         =>  base_url().'viewimage/banner/sponsor/tablet/'.$row->sponsors_id,
              'sponsorbannermobile'         =>  base_url().'viewimage/banner/sponsor/mobile/'.$row->sponsors_id,
              "verificationcode" => $row->verificationcode,
              "rank" => $row->rank,
              "prize" => $row->currency.' '.number_format($row->prize,0)
          );
        }

        return $result;
    }

    function get($order_by) {
        $table = $this->get_table();
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function check_users($username) {

        $this->db->where('username', $username);

        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function check_email($email,$id) {

        $this->db->where("email = '".$email."' and id != ".$id);

        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function check_password($password,$id) {

        $this->db->where("password = '".$password."' and id = ".$id);

        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function get_with_limit($limit, $offset, $order_by) {
        $table = $this->get_table();
        $this->db->limit($limit, $offset);
        $this->db->order_by($order_by);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where ($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $query = $this->db->get($table);
        return $query;
    }

    function get_where_custom($col, $value) {
        $table = $this->get_table();
        $this->db->where($col,$value);
        $query = $this->db->get($table);
        return $query;
    }

    function _insert($data) {
        $table = $this->get_table();
        $this->db->insert($table, $data);
    }

    function _update($id, $data) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    function _delete($id) {
        $table = $this->get_table();
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    function count_where($column, $value) {
        $table = $this->get_table();
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $table = $this->get_table();
        $query = $this->db->get($table);
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $table = $this->get_table();
        $this->db->select_max('id');
        $query = $this->db->get($table);
        $row = $query->row();
        $id = $row->id;
        return $id;
    }

    function _custom_query($mysql_query) {
        $query = $this->db->query($mysql_query);
        return $query;
    }

}
