<?php

   require APPPATH . '/libraries/REST_Controller.php';
   use Restserver\Libraries\REST_Controller;
     
class Usuario extends REST_Controller {
    
	
    public function __construct() {
       parent::__construct();
       
    }
 
    //GET////////////////GET///////////////GET//
	public function index_get($id = 0)
	{
        $this->load->view('modulos/header');
        $this->load->view('modulos/aside');
        $this->load->view('usuarios/usuarios');
        $this->load->view('modulos/footer');
        
                
               /* if(!empty($id)){
                    
 
                     $url = 'https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/'.$id; 
 
                     $ini_curl = curl_init($url);
                     curl_setopt($ini_curl, CURLOPT_RETURNTRANSFER, true);
                     $respuesta = curl_exec($ini_curl);
                     
                     
                     
                     if(curl_errno($ini_curl)){
                         echo "ERROR".curl_errno($ini_curl);
                         exit;
                     }
 
                     curl_close($ini_curl);
                     //$datos = json_decode($respuesta);
                     //print_r($datos);
 
                     //echo $respuesta;
                     $usuarios = json_decode($respuesta, true);

                    
                   // header('Content-Type: application/json');
                    echo json_encode($usuarios);

                 } else {
                     //$data = $this->Product_model->show();
                     $url = 'https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/'; 
 
                     $ini_curl = curl_init($url);
                     curl_setopt($ini_curl, CURLOPT_RETURNTRANSFER, true);
                     $respuesta = curl_exec($ini_curl);
                     //print_r($respuesta);
                     
                     
                     if(curl_errno($ini_curl)){
                         echo "ERROR".curl_errno($ini_curl);
                         exit;
                     }
 
                     curl_close($ini_curl);
                     //$datos = json_decode($respuesta);
                     //print_r($datos);
 
                     //echo $respuesta;
                    $usuarios = json_decode($respuesta, true);

                    
                    //header('Content-Type: application/json');
                    echo json_encode($usuarios);
                 } */        
        
	}

    public function obtener_me($id){
        
        //url APi para obtener un usuario por el ID
        $url = 'https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/'.$id; 
 
        //inicializar curl
        $ini_curl = curl_init($url);
        curl_setopt($ini_curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($ini_curl);
        
        
        
        if(curl_errno($ini_curl)){
            echo "ERROR".curl_errno($ini_curl);
            exit;
        }

        curl_close($ini_curl);
        //$datos = json_decode($respuesta);
        //print_r($datos);

        //echo $respuesta;
        $usuarios = json_decode($respuesta, true);

       
      // header('Content-Type: application/json');
       echo json_encode($usuarios);
    }

   

     //POST////////////////POST///////////////POST//
     //crear un usuario
     public function index_post()
     {
         //url APi
         $url = 'https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios';
          
        //obtenermos los datos del formulario usando POST
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $correo = $this->input->post('correo');
        $password = $this->input->post('password');

         $data = [
             'nombre' => $nombre,
             'apellido' => $apellido ,
             'correo' => $correo,
             'password' => $password
         ];
 
      
         $ini_curl = curl_init($url);

         //seteamos el curl
         curl_setopt($ini_curl, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($ini_curl, CURLOPT_HTTPHEADER, [
             'Content-Type: application/json',
         ]);
         //asignamos metodo SET y pasamos los campos
         curl_setopt($ini_curl, CURLOPT_POST, true);
         curl_setopt($ini_curl, CURLOPT_POSTFIELDS, json_encode($data));
 
         $respuesta = curl_exec($ini_curl);
 
         //control de errores
         if(curl_errno($ini_curl)) {
            echo "ERROR".curl_errno($ini_curl);
         }
 
         //cierre conexion
         curl_close($ini_curl);

         //mostramos el json de los datos ingresados
         echo $respuesta;

        
         //redireccionamos a list
        /*
         redirect('list');*/

        
     } 

    //DELETE////////////////DELETE///////////////DELETE//
    public function index_delete($id_elimina)
    {
        //url APi
        $url = "https://677fdbab0476123f76a8718e.mockapi.io/apiutal/v1/usuarios/".$id_elimina; 

        //inicializar curl
        $ini_curl = curl_init();

        //seteamos el curl
        curl_setopt($ini_curl, CURLOPT_URL, $url); 
        curl_setopt($ini_curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ini_curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 

      
        //ejecutar solicitud
        $respuesta = curl_exec($ini_curl);

        //control de errores
        if(curl_errno($ini_curl)) {
            echo "ERROR " . curl_error($ini_curl);
        } else {
            echo $respuesta;
        }

        //cierre conexion
        curl_close($ini_curl);        
       
    }
      
   
     
    /**
     * UPDATE | PUT method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $headers = $this->input->request_headers(); 
		if (isset($headers['Authorization'])) {
			$decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
            if ($decodedToken['status'])
            {
                // ------- Main Logic part -------
                // $input = $this->put();
                $headers = $this->input->request_headers(); 
                $data['name'] = $headers['name'];
                $data['price'] = $headers['price'];
                $response = $this->Product_model->update($data, $id);

                $response>0?$this->response(['Product updated successfully.'], REST_Controller::HTTP_OK):$this->response(['Not updated'], REST_Controller::HTTP_OK);
                // ------------- End -------------
            }
            else {
                $this->response($decodedToken);
            }
		}
		else {
			$this->response(['Authentication failed'], REST_Controller::HTTP_OK);
		}
    }
     
    
    	
}?>