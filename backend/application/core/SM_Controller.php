<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SM_Controller extends CI_Controller {

  var $cdata;
  
  function __construct() 
  {
    parent::__construct();
    $this->cdata = new stdClass();
  }
}
