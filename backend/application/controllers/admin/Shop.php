<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends SM_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    redirect('/admin/shop/shops');
  }
  
  public function shops() 
  {
    $this->load->model('admin/shop_model', 'm', TRUE);
    $this->cdata->shops = $this->m->get_shops();
      
    $this->cdata->template = 'admin/shop/list';
    $this->load->view(FRAME, $this->cdata);
  }
  
  public function register() {
    if ($this->input->post('shop_name')) {
      $data = array(
        'shop_name' => $this->input->post('shop_name'),
        'type_id' => $this->input->post('type_id'),
        'tel' => $this->input->post('tel'),
        'phone' => $this->input->post('phone'),
        'address' => $this->input->post('address'),
        'description' => $this->input->post('description')
      );
            
      // Image processing
      $this->load->library('uploader');
      $img_path = $this->uploader->upload();
      
      // @TODO implement upload exception 
      if ($img_path) {
        $data['img'] = $img_path; 
      }
      
      $this->load->model('admin/shop_model', 'm', TRUE);      
      $shop_id = $this->m->create_shop($data);
      redirect('admin/shop/edit/' . $shop_id, 'refresh');
    }

    $this->cdata->template = 'admin/shop/register';
    $this->load->view(FRAME, $this->cdata);
  }
  
  public function edit($shop_id) {
    if (!$shop_id) {
      redirect('admin/shop/shops');
    }
    
    $this->load->model('admin/shop_model', 'm', TRUE);
    $data['cond']['id'] = $shop_id;
    
    if ($this->input->post('shop_name')) {
      $data['data'] = array(
        'shop_name' => $this->input->post('shop_name'),
        'type_id' => $this->input->post('type_id'),
        'tel' => $this->input->post('tel'),
        'phone' => $this->input->post('phone'),
        'address' => $this->input->post('address'),
        'description' => $this->input->post('description')
      );
            
      // Image processing
      $this->load->library('uploader');
      $img_path = $this->uploader->upload();
      
      // @TODO implement upload exception 
      if ($img_path) {
        $data['img'] = $img_path; 
      }
            
      $this->m->update_shop($data);
    }
     
    $this->cdata->shop = $this->m->get_shop($data);  
    
    $this->cdata->template = 'admin/shop/edit';
    $this->load->view(FRAME, $this->cdata);
  }

  public function delete($shop_id) {
    
    $this->load->model('admin/shop_model', 'm', TRUE);
    $data['cond']['id'] = $shop_id;
    $this->m->delete_shop($data);
    
    redirect('/admin/shop/shops');
  }
}
