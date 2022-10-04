<?php
class Repartidores_model extends CI_Model
{

    public function exist_repartidor($telefono, $old_telefono = '', $camposIguales = '')
    {
        if ($camposIguales != '') {
            $this->db->where('telefono', $telefono)
                ->from('repartidores');
            return $this->db->count_all_results() > 1;
        }
        if ($old_telefono != '') {
            $this->db->where('telefono', $telefono)
                ->where('telefono !=', $old_telefono)
                ->from('repartidores');
            return $this->db->count_all_results() > 0;
        }

        $query = $this->db->get_where('repartidores', array('telefono' => $telefono));
        return $query->result() !== [];
    }

    public function get_repartidores()
    {
        $rows = $this->db->count_all_results('repartidores') > 0;
        if ($rows) {
            return $this->db->get('repartidores')->result_array();
        } else {
            return false;
        }
    }
    public function add_repartidor($data)
    {
        return $this->db->insert('repartidores', $data);
    }
    public function delete_repartidor($id_rep)
    {
        $this->db->where('id_rep', $id_rep)
            ->delete('repartidores');
        return $this->db->affected_rows();
    }
    public function update_repartidor($id_rep, $array)
    {
        return $this->db->set($array)
            ->where('id_rep', $id_rep)
            ->update('repartidores');
    }
    public function update_repartidor_status($id_rep, $activo)
    {

        $query = $this->db->set("activo", $activo)
            ->where("id_rep", $id_rep)
            ->update("repartidores");
        if ($query) {
            return $this->db->select('activo')
                ->where('id_rep', $id_rep)
                ->get('repartidores')->result_array();
        } else {
            return false;
        }
    }

    public function update_repartidor_activo($telefono)
    {

        $q = $this->db->where('telefono', $telefono)
            ->get('repartidores')->result_array();

        if (count($q) > 0) {
            $sql = 'UPDATE repartidores SET activo = IF(activo = "1","0", "1" ) WHERE telefono = \'' . $telefono . ' \' ';
            $query = $this->db->query($sql);

            if ($query) {
                return $q;
            } else {
                return false;
            }
        } else {
            return 'no existe';
        }
    }
}
