<?php

class ReportesAdmin extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReportesAdmin_model');
    }

    public function getReportes($fecha, $id_user)
    { 
        $res = $this->ReportesAdmin_model->get_reportes($fecha, $id_user);
        echo json_encode($res);
    }

    public function getTotal($fecha, $id_user) {
        $res = $this->ReportesAdmin_model->get_total($fecha, $id_user);
        echo json_encode($res); 
    }

    public function getTopRes(){
        $res = $this->ReportesAdmin_model->get_topRes();
        echo json_encode($res);
    }

    public function getTopFood($id){
  
        $res = $this->ReportesAdmin_model->get_topFood($id);
        echo json_encode($res);
    }

}
// INSERT INTO `pedidos_users`(`id_pedido`, `id_comida`, `precio`, 
// `comentario`, `cantidad`, `subtotal`) VALUES (2, 88, 100, NULL, 2, 200);

// NSERT INTO `pedidos`(`fecha`, `fecha_act`, `id_mesa`, `id_status`, 
// `id_repartidor`, `nombre_alias`, `telefono`, `total`, `id_user`, `metodo`) 
// VALUES (now(), NULL, 3, 1, 2, 'Maria', 4421234567, 500, 2, 'efectivo');