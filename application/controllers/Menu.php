<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Menu_model' );
    }

    public function index() {
        echo ( 'hola' );
    }

    public function add() {
        $id_user = $this->input->post("id_user");
        $imagen = $this->input->post("imagen");
        $nombre = $this->input->post("nombre");
        $precio = $this->input->post("precio");
        $tiempo = $this->input->post("tiempo");
        $tipo = $this->input->post("tipo");
        $descripcion = $this->input->post("descripcion");

        $data = array(
            "nombre" => $nombre,
            "precio" => $precio,
            "id_user" => $id_user,
            "imagen" => $imagen,
            "tiempo" => $tiempo,
            "descripcion" => $descripcion,
            "id_categoria" => $tipo,
        );

        echo json_encode( $this->Menu_model->insert_menu($data));
    }

    public function subirImagen()
     {
        $id_res = $this->session->userdata('id_user');
        $id_init = intval($id_res);
        var_dump($id_init);
      
        $config['upload_path'] = 'static/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';
        $hoy = date("YmdHis");
    
        $nuevoNombreImg="platillo".$hoy = date("YmdHis");;
        $config['file_name'] = strtolower($nuevoNombreImg);
 
        $regreso = $this->load->library('upload',$config);
        
      
        if (!$this->upload->do_upload("fileImagen")) {
            $bandera=0;
        } else {
            
            $file_info = $this->upload->data();     
            $imagen = $file_info['file_name'];
            var_dump($imagen);
            $id_platillo = $this->Menu_model->select_id_imagen($id_init);
            var_dump($id_platillo->id_comida);
            $ima = array(
                'imagen' => $imagen
            );
            
        }
        echo json_encode( $this->Menu_model->imagen($ima, $id_platillo->id_comida));
       // redirect(base_url('app/myaccount'), 'refresh');
    }

}

/* End of file  Menu.php */

