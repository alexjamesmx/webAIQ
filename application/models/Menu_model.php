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
        $obj = $this->db->affected_rows() != 0;
        return $obj;
    }

    public function get_combos( $tipo, $id_res ) {
        $this->db->select('*')
        ->from('menu')
        ->where('id_categoria', $tipo)
        ->where('id_user', $id_res)
        ->where('status !=', 2);
        $rs = $this->db->get();
		return $rs->num_rows() > 0 ? $rs->result() : NULL;
    }

    public function change_producto( $idcomida ) {
        $this->db->where('id_comida', $idcomida);
        $this->db->set("status", "1 - status", FALSE);
        $this->db->update('menu');
        return $this->db->affected_rows();
     }

     public function delete_producto( $id_comida ) {
        $this->db->where('id_comida', $id_comida);
        $this->db->set("status", 2);
        $this->db->update('menu');
        return $this->db->affected_rows();
      }

      public function update_menu( $data ) {
        $this->db->where('id_comida', $data['id_comida']);
        $this->db->update('menu', $data);
        return $this->db->affected_rows();
        }
}

/* End of file Menu_model.php */

 