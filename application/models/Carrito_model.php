<?php
class Carrito_model extends CI_Model {

    public function createCart($id_mesa) {
        $this->db->query("insert into carrito values( NULL, now(), 1, '$id_mesa' )");
    }

    public function getIdCart($id_mesa) {
        //busca ultimo carrito
        $idCart = $this->db->query("SELECT id FROM carrito WHERE id_mesa = $id_mesa ORDER BY id DESC LIMIT 1");
        //metodo para lineas
        $row = $idCart->row();
        if (isset($row)) {
            return $row->id;
        }
        //metodo para arrays
        // foreach($idCart->result() as $row) {
        //     return $row->id;
        // }
    }

    public function getCart($idCarrito) {
        $this->db->where('id_carrito', $idCarrito);
        $query = $this->db->get('detalle_carrito');

        return $query->result_array();
    }

    public function addCart($data) {
        //inserta productos a carrito
        //$addCart = $this->db->insert_string('detalle_carrito', $data); <- retorna el comando inserte completo
        //otro metodo, este retorna true o false
        $addCart = $this->db->set($data)->insert('detalle_carrito');
        return $addCart;
    }

    public function deleteItemCart($idCarrito, $idComida) {
        //eliminar productos de carrito
        $this->db->where('id_carrito', $idCarrito);
        $this->db->where('id_comida', $idComida);
        $deleteItem = $this->db->delete('detalle_carrito');
        return $deleteItem;
    }

    public function borraCarrito($idCarrito) {
        //eliminar todos los productos de carrito
        $this->db->where('id_carrito', $idCarrito);
        $deleteItem = $this->db->delete('detalle_carrito');
        return $deleteItem;
    }
}