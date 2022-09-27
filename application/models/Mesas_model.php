<?php
class Mesas_model extends CI_Model
{

    public function exist_mesa($nombre, $old_name = '', $camposIguales = '')
    {
        if ($camposIguales != '') {
            $this->db->where('nombre', $nombre)
                ->from('mesas');
            return $this->db->count_all_results() > 1;
        }
        if ($old_name != '') {
            $this->db->where('nombre', $nombre)
                ->where('nombre !=', $old_name)
                ->from('mesas');
            return $this->db->count_all_results() > 0;
        }

        $query = $this->db->get_where('mesas', array('nombre' => $nombre));
        return $query->result() !== [];
    }

    public function validate_table($nombre, $password)
    {
        $query = $this->db->get_where('mesas', array('nombre' => $nombre, 'password' => $password));
        return $query->row_array();
    }
    public function get_mesas()
    {
        $rows = $this->db->count_all_results('mesas') > 0;
        if ($rows) {
            return $this->db->get('mesas')->result_array();
        } else {
            return false;
        }
    }
    public function add_mesa($data)
    {
        return $this->db->insert('mesas', $data);
    }
    public function delete_mesa($id_mesa)
    {
        $this->db->where('id_mesa', $id_mesa)
            ->delete('mesas');
        return $this->db->affected_rows();
    }
    public function update_mesa($id_mesa, $array)
    {
        return $this->db->set($array)
            ->where('id_mesa', $id_mesa)
            ->update('mesas');
    }
}
