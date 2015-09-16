<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_MODEL {
  
  const T_AUTH = 'auth';
  
  public function get_auth($data) {
    $this->db->where('user_id', $data['cond']['user_id']);
    $this->db->where('password', $data['cond']['password']);
    $query = $this->db->get(self::T_AUTH);
    
    return $query->result();
  } 
  
  public function create_auth() {
    
  }
  
  public function update_auth() {
    
  }
  
  public function delete_auth() {
    
  }
  
}
?>