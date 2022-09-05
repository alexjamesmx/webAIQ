<?php
class Mesas_model extends CI_Model
{

    public function exist_table($id_mesa)
    {
        $query = $this->db->get_where('mesas', array('id_mesa' => $id_mesa));
        return $query->result() !== [];
    }

    public function validate_user($id_mesa, $password)
    {
        $query = $this->db->get_where('users', array('correo' => $id_mesa, 'password' => $password));
        return $query->row_array();
    }
    // public function update_avatar($id_mesa, $avatar){
    //     $query = $this->db->set('avatar', $avatar)
    //     ->where('correo', $id_mesa)
    //     ->update('users');
    //     return $query;
    // }
}
