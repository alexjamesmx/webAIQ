<?php
class Pedidos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pedidos_model');
        $this->load->model('carrito_model');
    }

    public function getPedido($carrito) {
        $pedido = $this->pedidos_model->getIdPedido($carrito);
        echo json_encode($pedido);
    }

    public function getCelular() {
        $idPedido = $this->input->post("idPedido");
        $pedido = $this->pedidos_model->getCelular($idPedido);
        echo json_encode($pedido);
    }

    public function creaPedido()
    {
        //datos para crear pedido
        $idMesa = $this->input->post("id_mesa");
        $nombre = $this->input->post("nombre_alias");
        $telefono = $this->input->post("telefono");
        $total = $this->input->post("total");
        $rest = $this->input->post("id_user");
        $metodo = $this->input->post("metodo");
        $carrito = $this->input->post("id_carrito");
        $cambio = $this->input->post("cambio");
        $fecha_act = date( 'Y-m-d H:i:s' );

        $res = $this->pedidos_model->createPedido($idMesa, $nombre, $telefono, $total, $rest, $metodo, $carrito, $cambio, $fecha_act);
        $arRes = [];
        if ($res) {
            $arRes['message'] = 'Pedido creado exitosamente.';
            $arRes['res'] = $res;
        } else {
            $arRes['message'] = 'No se pudo crear el pedido, intente mas tarde';
            $arRes['res'] = $res;
        }

        $cierraCart = $this->carrito_model->completeCart($carrito);
        $confirm = [];
        if ($cierraCart) {
            $confirm['message'] = 'Carrito cerrado correctamente.';
            $confirm['res'] = $cierraCart;
        } else {
            $confirm['message'] = 'No se pudo cerrar el carrito, intente mas tarde';
            $confirm['res'] = $cierraCart;
        }
        echo json_encode($arRes);
    }

    public function getDetallePedido()
    {
        $carrito = $this->input->post("id_carrito");
        $datosCart = $this->carrito_model->getCart($carrito);
        echo json_encode($datosCart);
    }

    public function insertCod()
    {
        $codigo = $this->input->post("codigo");
        $inserCod = $this->pedidos_model->insertCod($codigo);

        $res = [];
        if ($inserCod) {
            $res['message'] = 'Codigo agregado exitosamente.';
            $res['res'] = $inserCod;
        } else {
            $res['message'] = 'No se pudo agregar codigo, intente mas tarde';
            $res['res'] = $inserCod;
        }
        echo json_encode($res);
    }

    public function deleteCod()
    {
        $data = [];
        $codigo = $this->input->post("codigo");

        $res = $this->pedidos_model->deleteCod($codigo);
        if ($res == true) {
            $data["message"] = "Eliminado correctamente";
            $data["res"] = true;
        } else {
            $data["message"] = "No se pudo eliminar el codigo...";
            $data["res"] = false;
        }
        echo json_encode($data);
    }
}
