<?php

   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class Login extends REST_Controller {
    
	
    public function __construct() {
       parent::__construct();

    }

     public function index_get()
     {
        $this->load->view('login');
     } 
	
}?>