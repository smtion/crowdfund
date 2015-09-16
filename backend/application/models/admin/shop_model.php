<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_MODEL {
  
  const T_SHOP = 'shop';
  
  public function get_shop($data) {
    $this->db->where('id', $data['cond']['id']);
    $query = $this->db->get(self::T_SHOP);
    
    return $query->row();
  }
  
  public function get_shops() {
    $query = $this->db->get(self::T_SHOP);
    
    return $query->result();
  }
  
  public function create_shop($data) {
    $this->db->insert(self::T_SHOP, $data);
        
    return $this->db->insert_id();
  }
  
  public function update_shop($data) {
    $this->db->where('id', $data['cond']['id']);
    $ret = $this->db->update(self::T_SHOP, $data['data']);
    
    return $ret;
  }
  
  public function delete_shop($data) {
    $this->db->where('id', $data['cond']['id']);
    $ret = $this->db->delete(self::T_SHOP);
    
    return $ret;
  }
  
}