<?php
class Cuenta_Model extends CI_Model
{

    public function get_cuenta($id_user)
    {
        $this->db->where("id_user", $id_user);
        $rs = $this->db->get("users");
        return $rs->row();
    }

    public function update_cuenta($data)
    {

        return $this->db->set($data)
            ->where('id_user', $data['id_user'])
            ->update('users');
    }

    public function avatar_img($data, $id_user)
    {
        $this->db->set($data);
        $this->db->where("id_user", $id_user);
        $this->db->update("users");
        return $this->db->affected_rows() == 1;
    }
}
