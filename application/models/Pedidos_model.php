<?php 
class Pedidos_model extends CI_Model {
    //genera un nuevo pedido
    public function createPedido($idMesa, $nombre, $telefono, $total, $rest, $metodo, $carrito) {
        $query = $this->db->query(
            "INSERT INTO pedidos 
            values( NULL, now(), NULL, $idMesa, 1, NULL, '$nombre', $telefono, $total, $rest, '$metodo', $carrito)");

        return $query;
    }

    //obtiene el id de pedido
    public function getIdPedido($idCart) {
        $this->db->where('id_carrito', $idCart);
        $this->db->select('id_pedido');
        $query = $this->db->get('pedidos');

        $row = $query->row();
        if (isset($row)) {
            return $row->id_pedido;
        }
    }

    //inserta detalle pedido
    public function addPedido($data) {
        $addPed = $this->db->set($data)->insert('pedidos_users');
    }
}