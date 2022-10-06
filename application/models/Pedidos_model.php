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
        $query = $this->db->query(
            "SELECT p.id_pedido, p.id_mesa, p.id_status, p.nombre_alias, p.telefono, p.total, p.id_user, p.id_carrito, u.nombre, u.avatar, s.estado
            FROM pedidos AS p
            INNER JOIN users AS u
            ON u.id_user = p.id_user
            INNER JOIN status_pedido as s
            ON p.id_status = s.id_status
            WHERE p.id_carrito = $idCart"
        );

        $row = $query->row();
        return $row;
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
