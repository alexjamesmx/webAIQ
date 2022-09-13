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
            $ima = array(
                'imagen' => $imagen
            );
            
        }
        echo json_encode( $this->Menu_model->imagen($ima, $id_platillo->id_comida));
       // redirect(base_url('app/myaccount'), 'refresh');
    }

    public function get_menus() {
        $id_res = $this->session->userdata('id_user');
        $category = $this->input->post('category');

        $data = $this->Menu_model->get_combos($category, $id_res);
        $obj[ "res" ] = $data != NULL;
		$obj[ "mensaje" ]   = $obj[ "res" ] ?
		"Se recuperaron ".count( $data )." productos" : "No hay productos registrados";
		$obj[ "productos" ]  = $data;
		echo json_encode( $obj );
    }

    public function cambiarstatus() {
        $idcomida = $this->input->post("idcomida");
        $obj["res"] = $this->Menu_model->change_producto($idcomida);
        $obj["mes"] = $obj["res"] ? 
            "Status cambiado con éxito" : "Imposible actualizar el status";
        
        echo json_encode($obj);
    }

    public function del() {
        $idcomida = $this->input->post("id_comida");
        $obj["res"] = $this->Menu_model->delete_producto($idcomida) > 0;
        $obj["mes"] = $obj["res"] ? 
            "Producto eliminado con éxito" : "El producto no se pudo eliminar";
        
        echo json_encode($obj);
     }

     public function edit() {
        $id_comida = $this->input->post("id_comida");
        $imagen = $this->input->post("imagen");
        $nombre = $this->input->post("nombre");
        $precio = $this->input->post("precio");
        $tiempo = $this->input->post("tiempo");
        $tipo = $this->input->post("tipo");
        $descripcion = $this->input->post("descripcion");

        $data = array(
            "id_comida" => $id_comida,
            "nombre" => $nombre,
            "precio" => $precio,
            "tiempo" => $tiempo,
            "descripcion" => $descripcion,
            "id_categoria" => $tipo,
        );

        echo json_encode( $this->Menu_model->update_menu($data));
     }
}

/* End of file  Menu.php */

