<?php
class Pedidos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pedidos_model');
        $this->load->model('carrito_model');
    }

    public function creaPedido() {
        //datos para crear pedido
        $idMesa = $this->input->post("id_mesa");
        $nombre = $this->input->post("nombre_alias");
        $telefono = $this->input->post("telefono");
        $total = $this->input->post("total");
        $rest = $this->input->post("id_user");
        $metodo = $this->input->post("metodo");
        $carrito = $this->input->post("id_carrito");

        $res = $this->pedidos_model->createPedido($idMesa, $nombre, $telefono, $total, $rest, $metodo, $carrito);
        $arRes = [];
        if ($res) {
            $arRes['message'] = 'Pedido creado exitosamente.';
            $arRes['res'] = $res;
        } else {
            $arRes['message'] = 'No se pudo crear el pedido, intente mas tarde';
            $arRes['res'] = $res;
        }
        echo json_encode($arRes);

        $idPedido = $this->pedidos_model->getIdPedido($carrito);
        $datosCart = $this->carrito_model->getCart($carrito);

        foreach ($datosCart as $row) {
        }
        
    }
}