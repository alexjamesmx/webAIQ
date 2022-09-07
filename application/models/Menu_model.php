<?php

defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

class Menu_model extends CI_Model {

    public function insert_menu( $data ) {
        $this->db->insert( 'menu', $data );
        $obj[ 'res' ] = $this->db->affected_rows() != 0;
        $obj[ 'mensaje' ]     = $obj[ 'res' ] ?
        'Platillo insertado' : 'No fue posible insertar el platillo';
        return $obj;
    }

    public function select_id_imagen( $id_user ) {
        $this->db->select( 'id_comida' );
        $this->db->from( 'menu' );
        $this->db->where( 'id_user', $id_user );
        $this->db->order_by( 'id_comida', 'DESC' );
        $this->db->limit( 1 );
        $query = $this->db->get();
        return $query->row();
    }

    public function imagen( $data, $id ) {
        $this->db->set( $data );
        $this->db->where( 'id_comida', $id );
        $this->db->update( 'menu' );
        $obj[ 'res' ] = $this->db->affected_rows() != 0;
        $obj[ 'mensaje' ]     = $obj[ 'res' ] ?
        'Platillo insertado' : 'No fue posible insertar el platillo';
        return $obj;

    }
}

/* End of file Menu_model.php */

