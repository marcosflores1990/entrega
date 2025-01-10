<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cLogin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		/*if($this->session->userdata('id_user'))
		{
			redirect('cSolicitud');
		}*/

		
	}

	public function index()
	{
		/*$keys = array('id_usuario2','id_user','funcionario','rut','rol','unidades_jefe','unidades_subr');
		$this->session->unset_userdata($keys);  */
		$this->load->view('login');   
	}

	public function login()
	{
		//capturamos correo y password usando POST
		$correo = $this->input->post('idCampoCorreoLogin');
		$pw = $this->input->post('idCampoPasswordLogin');

		//este serà el varlor q retornaremos. Si es 0 no existe el usuario, si es 1 el usuario existe.
		$valor_final = 0;
		
		$url = "https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/";

		
		$respuesta = file_get_contents($url);

		
		if ($respuesta !== FALSE) {
			//trabajaremos los datos en un array llamado datos
			$datos = json_decode($respuesta, true); 

			if (is_array($datos)) {
				
				foreach ($datos as $user) {
					
					//recorremos el array y comparamos con los datos del login
					//si es correcto valor_final = 1 y guardamos datos de session
					if($user['correo'] == $correo && $user['password'] == $pw){
						//echo "OK";
						$valor_final = 1;
						$data = array(
							'id_user' => $user['id'],
							'nombre_apellido' =>  $user['nombre']." ".$user['apellido']
							);
			
							$this->session->set_userdata($data);
					}
									
				}
			} else {
				echo 'ERROR EN JSON.';
			}
		} else {
			echo 'ERROR EN API';
		}
		echo $valor_final;	    
	}

	/*public function cObtenerPermisos()
	{
		$this->load->model('mLogin');		
		$datos['permisos']=$this->mLogin->mObtenerPermisos($_POST['id_rol']);
	    echo json_encode($datos);
	}*/


}