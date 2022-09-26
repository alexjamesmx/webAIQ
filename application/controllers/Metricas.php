<?php
class Metricas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('metricas_model');
    }
    public function pedidos_restaurantes_hoy()
    {

        $res = $this->metricas_model->pedidos_restaurantes_hoy();
        echo json_encode($res);
    }
    public function pedidos_restaurantes_dia($fecha_actual)
    {
        $res = $this->metricas_model->pedidos_restaurantes_dia($fecha_actual);
        echo json_encode($res);
    }
    public function pedidos_restaurantes_mes()
    {
        $fecha_actual = $this->input->post('mes');
        $res = $this->metricas_model->pedidos_restaurantes_mes($fecha_actual);
        echo json_encode($res);
    }

    public function pedidos_restaurantes_mes_not()
    {
        $fecha_actual = $this->input->post('mes');
        $res = $this->metricas_model->pedidos_restaurantes_mes_not($fecha_actual);
        echo json_encode($res);
    }


    public function pedidos_restaurantes_year()
    {
        $fecha_actual = $this->input->post('mes');
        $res = $this->metricas_model->pedidos_restaurantes_year($fecha_actual);
        echo json_encode($res);
    }
    public function pedidos_restaurantes_periodo_rango($fecha_inicio, $fecha_fin)
    {

        // 2022-09-15
        // $res = gettype($fecha_actual);
        // echo json_encode($res);
        // die();


        $res = $this->metricas_model->pedidos_restaurantes_periodo_rango($fecha_inicio, $fecha_fin);
        echo json_encode($res);
    }
    public function dinero_restaurantes_total()
    {
        $res = $this->metricas_model->dinero_restaurantes_total();
        echo json_encode($res);
    }
    public function dinero_restaurante($id_restaurante)
    {
        $res = $this->metricas_model->dinero_restaurante($id_restaurante);
        echo json_encode($res);
    }

    public function restaurantes_favoritos()
    {
        $res = $this->metricas_model->restaurantes_favoritos();
        echo json_encode($res);
    }

    public function comidas_favs()
    {
        $res = $this->metricas_model->comidas_favs();
        echo json_encode($res);
    }
}
