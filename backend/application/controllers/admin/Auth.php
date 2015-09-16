<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends SM_Controller {

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
    $this->cdata->template = 'admin/shop/list';
    $this->load->view(FRAME, $this->cdata);
  }
  
  public function register() {
    $this->cdata->template = 'admin/shop/register';
    $this->load->view(FRAME, $this->cdata);
  }
  
  public function login() {
    $m = $this->load->model('auth_model');    
    $data = $this->input->post('data');
    
    $m->get_auth($data);
  }
}
