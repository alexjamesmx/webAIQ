<?php
class Metricas_model extends CI_Model
{

    //PEDIDOS
    public function pedidos_restaurantes_hoy()
    {
        $sql = "SELECT users.nombre as Restaurante, count(pedidos.id_user) as totalPedidos, DATE_FORMAT(pedidos.fecha, '%Y-%m-%d') as Fecha FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where DATE(pedidos.fecha) = curdate() GROUP BY pedidos.id_user";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function pedidos_restaurantes_dia($fecha_actual)
    {
        $sql = 'SELECT users.nombre as Restaurante, count(pedidos.id_user) as totalPedidos, DATE_FORMAT(pedidos.fecha, "%Y-%m-%d") as Fecha FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where DATE(pedidos.fecha) = \'' . $fecha_actual . ' \'  GROUP BY pedidos.id_user';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function pedidos_restaurantes_mes($fecha_actual)
    {
        $sql = 'SELECT users.nombre as Restaurante, count(pedidos.id_user) as totalPedidos FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where MONTH(DATE(pedidos.fecha)) = MONTH(\'' . $fecha_actual . ' \') 
        AND YEAR(DATE(pedidos.fecha)) = YEAR(\'' . $fecha_actual . ' \') 
        GROUP BY pedidos.id_user';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function pedidos_restaurantes_mes_not($fecha_actual)
    {
        $sql = 'SELECT nombre as Restaurante , \'0\' as totalPedidos FROM users where id_user not in (SELECT users.id_user FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where MONTH(DATE(pedidos.fecha)) =  MONTH(\'' . $fecha_actual . ' \') 
        AND YEAR(DATE(pedidos.fecha)) = YEAR(\'' . $fecha_actual . ' \') 
        GROUP BY pedidos.id_user) AND NOT tipo= 1';
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    public function pedidos_restaurantes_year($fecha_actual)
    {
        $sql = 'SELECT users.nombre as Restaurante, count(pedidos.id_user) as totalPedidos FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where YEAR(DATE(pedidos.fecha)) = YEAR(\'' . $fecha_actual . ' \') 
        GROUP BY pedidos.id_user';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function pedidos_restaurantes_year_not($fecha_actual)
    {
        $sql = 'SELECT nombre as Restaurante , \'0\' as totalPedidos FROM users where id_user not in (SELECT users.id_user FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where YEAR(DATE(pedidos.fecha)) = YEAR(\'' . $fecha_actual . ' \') 
        GROUP BY pedidos.id_user) AND NOT tipo= 1';
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    public function pedidos_restaurantes_periodo_rango($fecha_inicio, $fecha_fin)
    {
        $sql = 'SELECT users.nombre as Restaurante, count(pedidos.id_user) as totalPedidos, DATE_FORMAT(pedidos.fecha, "%Y-%m-%d") as Fecha FROM pedidos INNER JOIN users ON users.id_user=pedidos.id_user where DATE(pedidos.fecha) in(\'' . $fecha_inicio . ' \',\'' . $fecha_fin . ' \')  GROUP BY pedidos.id_user';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //DINERO GENERADO POR RESTAURANTES
    public function dinero_restaurantes_total()
    {
        $sql = 'SELECT users.nombre, SUM(menu.precio) as TOTAL FROM menu INNER JOIN users ON users.id_user=menu.id_user GROUP BY menu.id_user';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function dinero_restaurante($id_restaurante)
    {
        $sql = 'SELECT users.nombre, SUM(menu.precio) as TOTAL FROM menu INNER JOIN users ON users.id_user=menu.id_user WHERE menu.id_user = \'' . $id_restaurante . '\'GROUP BY menu.id_user';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    //RESTAURANTES FAVORITOS
    public function restaurantes_favoritos()
    {
        $sql = 'SELECT  DISTINCT

        users.nombre as Restaurante, 
        SUM(pedidos_users.cantidad) as cantidad_pedidos
         FROM pedidos 
         JOIN pedidos_users on pedidos.id_pedido = pedidos_users.id_pedido 
         JOIN menu on menu.id_comida = pedidos_users.id_comida 
         JOIN users on pedidos.id_user = users.id_user GROUP BY users.nombre ORDER BY cantidad_pedidos desc';
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function comidas_favs()
    {
        $sql = 'SELECT id_comida,SUM(cantidad) as total_cantidad from pedidos_users GROUP BY id_comida ORDER BY MAX(cantidad) desc LIMIT 1';

        $query = $this->db->query($sql);
        $query = $query->result_array();

        $id_comida = $query[0]['id_comida'];
        $total = $query[0]['total'];

        $sql = 'SELECT  
            pedidos.id_user as id_restaurante,
            users.nombre as Restaurante, 
            pedidos_users.id_pedido as id_pedido,
            pedidos_users.id_comida as id_comida,
            menu.nombre as Comida FROM pedidos 
             JOIN pedidos_users on pedidos.id_pedido = pedidos_users.id_pedido 
             JOIN menu on menu.id_comida = pedidos_users.id_comida 
             JOIN users on pedidos.id_user = users.id_user
            WHERE pedidos_users.id_comida = \'' . $id_comida . '\'  GROUP BY Restaurante
           ';
        $query = $this->db->query($sql);
        $query = $query->result_array();
        return $query;
    }
}
