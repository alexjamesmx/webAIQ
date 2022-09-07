<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model( 'Menu_model' );
    }

    public function index() {
        echo 'hola';
    }

    public function agregamenu() {
        $id_res = $this->input->post( 'idres' );
        $pla_nombre = $this->input->post( 'planombre' );
        $pla_precio = $this->input->post( 'plaprecio' );
        $pla_tiempo = $this->input->post( 'tiempo' );
        $pla_categoria = $this->input->post( 'categoria' );
        $pla_des = $this->input->post( 'descripcion' );
        $pla_image = $this->input->post( 'image' );

        $data = array(
            'id_res' => $id_res,
            'nombre' => $pla_nombre,
            'precio' => $pla_precio,
            'tiempo' => $pla_tiempo,
            'id_categoria' => $pla_categoria,
            'descripcion' => $pla_des,
            'imagen' => $pla_image
        );

        echo ($data);

    }

}