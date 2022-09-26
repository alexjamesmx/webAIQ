<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Dasboard_model extends CI_Model 
{
    public function select_poraceptar($id_user)
    {
        $this->db->select('id_pedido, nombre_alias, total, fecha');
        $this->db->from('pedidos');
        $this->db->where('id_user', $id_user);
        $this->db->where('id_status', 1);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function detalle($id_pedido)
    {
        $this->db->select('id_pedido, cantidad, menu.nombre, comentario, tiempo' );
        $this->db->from('pedidos_users');
        $this->db->join('menu', 'menu.id_comida = pedidos_users.id_comida');
        $this->db->where('id_pedido', $id_pedido);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : NULL;
    }

    public function preparando($id_res)
    {
        $this->db->select('id_pedido');
        $this->db->from('pedidos');
        $this->db->where('id_user', $id_res);
        $this->db->where('id_status', 2);
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

    public function select_repartidor()
    {
        $this->db->select('id_rep');
        $this->db->from( 'repartidores' );
        $this->db->where('activo', 1);
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
                        
}


/* End of file Dasboard_model.php and path /application/models/Dasboard_model.php */
