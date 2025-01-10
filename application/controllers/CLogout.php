<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cLogout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_user'))
		{
			redirect('cLogin');
		}

	}
	

	public function logout()
	{
		
		$keys = array('id_user','nombre_apellido');
		$this->session->unset_userdata($keys);
		//$this->session->unset_userdata('id_user');

		redirect('login');
		//print_r($this->session->userdata());
	}

}