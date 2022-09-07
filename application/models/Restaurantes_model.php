<?php
class Restaurantes_model extends CI_Model
{

    public function get_restaurantes()
    {
        $query = $this->db->get('restaurantes');
        return $query->result() !== [];
    }
    public function add_restaurant($data)
    {
        $query = $this->db->set($data)
            ->insert('restaurantes');
        return $query;
    }
}
