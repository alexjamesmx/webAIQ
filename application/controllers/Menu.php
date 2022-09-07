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
        $id_res = $this->input->post("id_res");
        $nombre = $this->input->post("nombre");
        $precio = $this->input->post("precio");
        $tiempo = $this->input->post("tiempo");
        $tipo = $this->input->post("tipo");
        $descripcion = $this->input->post("descripcion");

        $data = array(
            "nombre" => $nombre,
            "precio" => $precio,
            "id_res" => $id_res,
            "imagen" => 'imagen',
            "tiempo" => $tiempo,
            "descripcion" => $descripcion,
            "id_categoria" => $tipo,
            "status" => '1'
        );

        echo json_encode( $this->Menu_model->insert_menu($data));
    }

}

/* End of file  Menu.php */

