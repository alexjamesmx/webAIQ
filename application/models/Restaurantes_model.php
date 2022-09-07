<?php
class Restaurantes_model extends CI_Model
{

    public function get_restaurantes()
    {
        $cmd = "SELECT * FROM restaurantes";
        $query = $this->db->query($cmd);
        return ($query->result());
    }

} 
