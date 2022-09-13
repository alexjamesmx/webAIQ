<?php
class Cuenta_Model extends CI_Model {

    public function get_cuenta($id_user)
    {
        $this->db->where("id_user", $id_user);
        $rs = $this->db->get("users");
        return $rs->row();
    }

    public function update_cuenta($id_user, $array)
    {
        return $this->db->set($array)
            ->where('id_user', $id_user)
            ->update('users');
    }

}
