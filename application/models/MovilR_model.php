<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MovilR_model extends CI_Model
{

    public function getRestaurant()
    { 
        $cmd = "select * from restaurantes";
        $query = $this->db->query($cmd);
        return ($query->result());
    }

    public function getMenu($id)
    { 
        $cmd = "select * from menu where id_res = $id";
        $query = $this->db->query($cmd);
        return ($query->result());
    }

}
