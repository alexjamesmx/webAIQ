<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MovilR_model extends CI_Model
{

    public function getRestaurant()
    { 
        $cmd = "SELECT * from restaurantes";
        $query = $this->db->query($cmd);
        return ($query->result());
    }

    public function getMenu($id)
    { 
        $cmd = "SELECT * FROM menu WHERE id_res = $id";
        $query = $this->db->query($cmd);
        return ($query->result());
    }

    public function getRepartidor()
    { 
        $cmd = "SELECT * FROM repartidores WHERE activo = 1";
        $query = $this->db->query($cmd);
        return ($query->result());
    }

    public function getPublicidad()
    { 
        $cmd = "SELECT * FROM publicidad WHERE activo = 1";
        $query = $this->db->query($cmd);
        return ($query->result());
    }
    
    public function getBuscadorPalabra($palabra)
    { 
        $cmd = "SELECT nombre FROM restaurantes WHERE nombre LIKE '%$palabra%'";
        $cmd = "SELECT nombre, id_res FROM menu WHERE nombre LIKE '%$palabra%'";
        $query = $this->db->query($cmd);
        return ($query->result());

        // Si busco Hamburguesa necesito:
        //     -Buscar en la tabla menu el platillo(s), combo(s) o bebida(s) con el nombre(s) relacionado(s)
        //         "SELECT nombre FROM menu WHERE nombre LIKE '%$palabra%'"
        //     -Buscar su ID(s) de restaurante(s)
        //         "SELECT nombre, id_res FROM menu WHERE nombre LIKE '%$palabra%' AND..."
        //     -Mostrar de la tabla restaurantes el nombre(s) del restaurante(s) con el ID(s) perteneciente(s) 

    }

}
