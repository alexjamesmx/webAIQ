<?php
class Pedidos_model extends CI_Model
{
    //genera un nuevo pedido
    public function createPedido($idMesa, $nombre, $telefono, $total, $rest, $metodo, $carrito, $cambio)
    {
        $query = $this->db->query(
            "INSERT INTO pedidos 
            values( NULL, now(), NULL, $idMesa, 1, NULL, '$nombre', $telefono, $total, $rest, '$metodo', $carrito, $cambio)"
        );

        return $query;
    }

    //obtiene el id de pedido
    public function getIdPedido($idCart)
    {
        $this->db
            ->where('id_carrito', $idCart)
            ->select('id_pedido');
        $query = $this->db->get('pedidos');

        $row = $query->row();
        if (isset($row)) {
            return $row->id_pedido;
        }
    }

    public function insertCod($codigo)
    {
        $insertCod = $this->db->set('codigo', $codigo)->insert('codigos');
        return $insertCod;
    }
    public function deleteCod($codigo)
    {
        $this->db
            ->where('codigo', $codigo)
            ->delete('codigos');
        return $this->db->affected_rows();
    }
}
