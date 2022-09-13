<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MovilR_model extends CI_Model
{
    public function get_reportes()
    {
        $query = $this->db->get_where('status_pedidos', array('id_pedido'));
        return $query;
    }
}