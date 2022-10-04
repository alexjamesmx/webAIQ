<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Dasboard_model extends CI_Model 
{
    public function select_poraceptar($id_user)
    {
        $this->db->select('id_pedido, fecha, id_carrito');
        $this->db->from('pedidos');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_status', 1);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function detalle($id_pedido)
    {
        $this->db->select('pedidos.id_pedido, cantidad, menu.nombre, comentario' );
        $this->db->from('pedidos');
        $this->db->join('detalle_carrito', 'detalle_carrito.id_carrito = pedidos.id_carrito');
        $this->db->join('menu', 'menu.id_comida = detalle_carrito.id_comida');
        $this->db->where('pedidos.id_pedido', $id_pedido);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function preparando($id_res)
    {
        $this->db->select('id_pedido, id_carrito');
        $this->db->from('pedidos');
        $this->db->where('id_user', $id_res);
        $this->db->where('id_status', 2);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function hora($id_pedido)
    {
        $this->db->select('fecha_act');
        $this->db->from('pedidos');
        $this->db->where('id_pedido', $id_pedido);
        $query = $this->db->get();
        return $query->row();
    }

    public function tiempo_asignado($id_carrito)
    {
        $this->db->select_max('menu.tiempo');
        $this->db->from('detalle_carrito');
        $this->db->join('menu', 'menu.id_comida = detalle_carrito.id_comida');
        $this->db->where('id_carrito', $id_carrito);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function enespera($id_user)
    {
        $this->db->select('id_pedido, nombre_alias, total, id_repartidor, repartidores.nombre, metodo');
        $this->db->from('pedidos');
        $this->db->join('repartidores', 'repartidores.id_rep = pedidos.id_repartidor');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_status', 3);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function yaenviados($id_user)
    {
        $this->db->select('id_pedido, total, id_repartidor, repartidores.nombre, metodo');
        $this->db->from('pedidos');
        $this->db->join('repartidores', 'repartidores.id_rep = pedidos.id_repartidor');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_status', 4);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function pedido_aceptado($id_pedido, $fecha_act)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 2);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function pedido_declinado($id_pedido, $fecha_act)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 6);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function select_repartidor($zona)
    {
        $this->db->select('id_rep');
        $this->db->from( 'repartidores' );
        $this->db->where('activo', 1);
        $this->db->where('zona', $zona);
        $this->db->order_by('id_rep', 'RANDOM');
        $this->db->limit( 1 );
        $query = $this->db->get();
        return $query->row();
    }

    public function pedido_listo($id_pedido, $fecha_act, $id_rep)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 3);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->set('id_repartidor', $id_rep);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function status_repartidor( $id_rep ) {
        $this->db->where('id_rep', $id_rep);
        $this->db->set("activo", "1 - activo", FALSE);
        $this->db->update('repartidores');
        return $this->db->affected_rows();
     }

     public function pedido_cancelado($id_pedido, $fecha_act)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 7);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function pedido_enviado($id_pedido, $fecha_act)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 4);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function pedido_devolucion($id_pedido, $fecha_act)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 8);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function pedido_finalizado($id_pedido, $fecha_act)
    {
        $this->db->where('id_pedido', $id_pedido);
        $this->db->set("id_status", 5);
        $this->db->set('fecha_act', $fecha_act);
        $this->db->update('pedidos');
        return $this->db->affected_rows();
    }

    public function get_mesas($id_pedido) {
        $sql = 'SELECT id_pedido, pedidos.id_mesa, mesas.nombre, mesas.descripcion, metodo, total, cambio FROM pedidos 
                INNER JOIN mesas on pedidos.id_mesa = mesas.id_mesa WHERE id_pedido = \''.$id_pedido.'\'';
        $query = $this->db->query($sql);
        return $query->result(); 
    }
    public function numeros($id_repa)
    {
        $this->db->select('telefono');
        $this->db->from('repartidores');
        $this->db->where('id_rep', $id_repa);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : NULL;
    }

    public function buscar_num($num)
    {
        $this->db->select('telefono');
        $this->db->from('repartidores');
        $this->db->where('telefono', $num);
        $query = $this->db->get();
        return $query->num_rows() == 1 ? $query->result() : NULL;
    }

    public function buscar_codigo($codigo)
    {
        $this->db->select('codigo');
        $this->db->from('codigos');
        $this->db->where('codigo', $codigo);
        $query = $this->db->get();
        return $query->num_rows() == 1 ? $query->result() : NULL;
    }
                        
}


/* End of file Dasboard_model.php and path /application/models/Dasboard_model.php */
