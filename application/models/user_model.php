<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class user_model extends CI_Model{
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
  
    public function login($email, $password){
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("email ='$email' and password='$password'");
        $query = $this->db->get()->result();
        if($this->db->affected_rows() > 0) {
            return $query;
        }
        return false;
    }

    public function register(){
      // User data array
      $data = array(
        'first_name' => $this->input->post('first_name'),
        'last_name' => $this->input->post('last_name'),
        'email' => $this->input->post('email'),
        'gender' => $this->input->post('gender'),
        'password' => $this->input->post('password'),
        //'password' => $enc_password,
      );

      // Insert user
      return $this->db->insert('users', $data);
    }

    public function check_email_exists($email){
      $query = $this->db->get_where('users', array('email' => $email));
      if(empty($query->row_array())){
        return true;
      } else {
        return false;
      }
    }
}
