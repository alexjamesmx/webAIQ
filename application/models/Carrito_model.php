<?php
class Carrito_model extends CI_Model {

    //genera nuevo carrito
    public function createCart($id_mesa) {
        $this->db->query("insert into carrito values( NULL, now(), 1, '$id_mesa' )");
    }

    //getIdCart and getId_Status
    public function getIdCart($id_mesa) {
        //busca ultimo carrito
        $idCart = $this->db->query("SELECT id, id_status FROM carrito WHERE id_mesa = '$id_mesa' ORDER BY id DESC LIMIT 1");
        //metodo para lineas
        // $row = $idCart->row();
        // if (isset($row)) {
        //     return $row->id;
        // }
        //metodo para arrays
        foreach($idCart->result() as $row) {
            return $row;
        }
    }

    //get carrito por mesa
    public function getCart($idCarrito) {
        $query = $this->db->query("SELECT * FROM `detalle_carrito` AS dc
        INNER JOIN menu ON menu.id_comida = dc.id_comida
        WHERE `id_carrito` = $idCarrito");

        return $query->result_array();
    }

    //obtiene el total de la suma del carrito
    public function getTotalCart($idCart) {
        $this->db->where('id_carrito', $idCart);
        $this->db->select_sum('subtotal');
        $query = $this->db->get('detalle_carrito');
        
        //retornar el valor obtenido del query
        $row = $query->row();
        if (isset($row)) {
            return $row->subtotal;
        }
    }

    //agrega productos
    public function addCart($data) {
        //inserta productos a carrito
        //$addCart = $this->db->insert_string('detalle_carrito', $data); <- retorna el comando inserte completo
        //otro metodo, este retorna true o false
        $addCart = $this->db->set($data)->insert('detalle_carrito');
        return $addCart;
    }

    //eliminar producto de carrito
    public function deleteItemCart($idCart, $idComida) {
        //eliminar productos de carrito
        $this->db->where('id_carrito', $idCart);
        $this->db->where('id_comida', $idComida);
        $deleteItem = $this->db->delete('detalle_carrito');
        return $deleteItem;
    }

    //borra todos lo productos del carrito en proceso
    public function borraCarrito($idCarrito) {
        //eliminar todos los productos de carrito
        $this->db->where('id_carrito', $idCarrito);
        $deleteItem = $this->db->delete('detalle_carrito');
        return $deleteItem;
    }

    //obtener codigo 
    public function getCodigo($codigo) {
        $this->db->where('codigo', $codigo);
        $query = $this->db->get('codigos');

        $row = $query->row();
        if (isset($row)) {
            return $row->codigo;
        }
    }

    //eliminar codigo usado 
    public function deleteCodigo($codigo) {
        $this->db->where('codigo', $codigo);
        $deleteItem = $this->db->delete('codigos');
        return $deleteItem;
    }
}