<?php
class ReportesAdmin_model extends CI_Model
{
    public function get_reportes($fecha, $id_user)
    {
        // return $this->db->get_where('pedidos_users', array('id_pedido' => $id_pedido))->result_array(); 
        $this->db->select('*')
        ->like('fecha', $fecha) 
        ->like('id_user', $id_user);
        $rs = $this->db->get('pedidos');
        return $rs -> result(); 
    }

    public function get_total($fecha, $id_user)
    {   
        // 'SELECT pedidos.id_user AS ID_RES, users.nombre AS Restaurante, fecha AS Fecha, 
        //         SUM(total) FROM pedidos 
        //         INNER JOIN users ON users.id_user = pedidos.id_user 
        //         WHERE fecha LIKE \''.$fecha.'\' AND pedidos.id_user LIKE \''.$id_user.'\' '
        //SELECT SUM(total) FROM pedidos WHERE fecha LIKE \''.$fecha.'\' AND id_user = \''.$id_user.'\'
        $sql = "SELECT pedidos.id_user AS ID_RES, users.nombre AS Restaurante, fecha AS Fecha, 
                SUM(total) FROM pedidos 
                INNER JOIN users ON users.id_user = pedidos.id_user 
                WHERE fecha LIKE '".$fecha."%' AND pedidos.id_user = '".$id_user."'";
        $query = $this->db->query($sql);
        return $query->result_array();
        
    }

    public function get_topRes(){
        // select id_user, fecha, COUNT(*) from pedidos GROUP BY id_user
        // necesito comparar y ver cual tiene mas COUNT para asi mostrarlo
        $this->db->select("id_user as id, COUNT(*) as numero2 FROM pedidos 
                            GROUP BY id_user HAVING numero2 =(select  max(t1.numero) 
                            as datoMayor from (select id_user as id, COUNT(*) as numero 
                            FROM pedidos GROUP BY id_user) as t1)");
        $query = $this->db->get();
        return $query -> result();
         
    } 

    public function get_topFood($id){
      
        // SELECT id_comida, COUNT(*) FROM pedidos_users GROUP BY id_comida
        // necesito comparar y ver cual tiene mas COUNT para asi mostrarlo
        // $this->db->select("id_comida, COUNT(*) FROM pedidos_users GROUP BY id_comida");
        // select max(t1.numero) as datoMayor from (select id_comida as id, COUNT(*) as numero FROM pedidos_users GROUP BY id_comida) as t1
        // select id_comida, max(t1.numero) as datoMayor from pedidos_users, (select id_comida as id, COUNT(*) as numero FROM pedidos_users GROUP BY id_comida) as t1
        // $this->db->select("id_comida as id, COUNT(*) as numero2 FROM pedidos_users GROUP BY id_comida  HAVING numero2 =
        //                     (select  max(t1.numero) as datoMayor from (select id_comida as id, COUNT(*) as numero FROM pedidos_users 
        //                     GROUP BY id_comida) as t1)");
        // $query = $this->db->get();
        // return $query -> result();
        $sql = 'SELECT S1.ID_RES, S1.Restaurante, S1.ID_PLA, S1.Platillo, MAX(S1.Total) AS TOTAL 
                FROM (SELECT users.id_user AS ID_RES, users.nombre AS Restaurante, 
                        menu.id_comida AS ID_PLA, menu.nombre AS Platillo, 
                        SUM(pedidos_users.cantidad) AS Total
                        FROM menu
                        INNER JOIN pedidos_users on pedidos_users.id_comida = menu.id_comida
                        INNER JOIN users on users.id_user = menu.id_user 
                        WHERE users.id_user = \''.$id.'\'
                        GROUP BY menu.id_comida, users.id_user) AS S1';
        $query = $this->db->query($sql);
        return $query->result_array();

    }

}

// SELECT SUM(total) FROM pedidos WHERE fecha LIKE '2022-09-15%'
// SELECT SUM(total) FROM pedidos WHERE fecha LIKE '2022-09-20%' AND id_user LIKE '70'
// CREATE VIEW TOTAL_F AS
// SELECT SUM(total)
// FROM pedidos
// WHERE fecha LIKE '2022-09-15%'
// select id_comida, id_user from menu  where id_comida LIKE '%(select t1.id_comida, max(t1.numero) as datoMayor from pedidos_users, (select id_comida as id_comida, COUNT(*) as numero FROM pedidos_users GROUP BY id_comida) as t1)%'
// SELECT pedidos.id_user,pedidos_users.id_comida as id, COUNT(*) as numero2 FROM pedidos_users inner JOIN pedidos on pedidos_users.id_pedido = pedidos.id_pedido 
// GROUP BY id_comida  HAVING numero2 =(select  max(t1.numero) as datoMayor from (select id_comida as id, COUNT(*) as numero FROM pedidos_users GROUP BY id_comida) as t1)
