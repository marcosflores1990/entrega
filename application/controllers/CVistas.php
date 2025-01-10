<?php


class CVistas extends CI_Controller {

	public function index(){

        $this->load->view('modulos/header');
        $this->load->view('modulos/aside');
        $this->load->view('usuarios/CrearUsuario');
        $this->load->view('modulos/footer');
    }

}