<?php
class Mesas_model extends CI_Model
{

    public function get_restaurantes()
    {
        $query = $this->db->get('restaurantes');
        return $query->result() !== [];
    }

} 
