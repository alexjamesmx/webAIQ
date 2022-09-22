<?php
class Carrito extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('carrito_model');
    }

    public function getCart($id_mesa) {
        //obtener idCarrito
        $query = $this->carrito_model->getIdCart($id_mesa);
        $carrito = $this->carrito_model->getCart($query->id);

        echo json_encode($carrito);
    }

    //agrega productos en carrito y en caso necesario crea nuevo carrito
    public function addCart() 
    {
        //obtener idCarrito
        $idMesa = $this->input->post("id_mesa");
        $query = $this->carrito_model->getIdCart($idMesa);

        //VALIDANDO ESTATUS CARRITO
        if (($query == false) || ($query->id_status > 1))  {
            //en caso de no existir carrito en proceso, se crea uno nuevo
            $this->carrito_model->createCart($idMesa);
        }
        //volvemos a leer el id de carrito en caso de generar uno nuevo
        $query = $this->carrito_model->getIdCart($idMesa);

        //datos a insertar en detalle_carrito
        $idCart = $query->id;
        $idComida = $this->input->post("id_comida");
        $cantidad = $this->input->post("cantidad");
        $subtotal = $this->input->post("subtotal");
        $comentario = $this->input->post("comentario");
        //arreglo con datos a insertar
        $array = array(
            'id_carrito' => $idCart,
            'id_comida' => $idComida,
            'cantidad' => $cantidad,
            'subtotal' => $subtotal,
            'comentario' => $comentario,
        );

        //mandamos a insertar datos
        $res = $this->carrito_model->addCart($array);
        $data = [];
        if ($res) {
            $data['message'] = 'Producto agregado a carrito exitosamente.';
            $data['res'] = $res;
        } else {
            $data['message'] = 'No se pudo agregar el producto, intente mas tarde';
            $data['res'] = $res;
        }
        echo json_encode($data);

    }

    public function getTotalCart($idMesa) {
        //obtener idCarrito
        $idCart = $this->carrito_model->getIdCart($idMesa);
        //obtener total carrito
        $query = $this->carrito_model->getTotalCart($idCart->id);

        echo json_encode($query);
    }

    public function deteleItemCart() 
    {
        //obtener idCarrito
        $idMesa = $this->input->post("id_mesa");
        $query = $this->carrito_model->getIdCart($idMesa);       

        //datos para where
        $idCart = $query->id;
        $idComida = $this->input->post("id_comida");
        print_r($idCart, $idComida);

        $prod = $this->carrito_model->deleteItemCart($idCart, $idComida);
        $data = [];
        if ($prod) {
            $data['message'] = 'Producto eliminado de carrito exitosamente.';
            $data['prod'] = $prod;
        } else {
            $data['message'] = 'No se pudo eliminar el producto, intente más tarde';
            $data['prod'] = $prod;
        }
        echo json_encode($data);
    }

    public function borraCarrito() {
        //obtener idCarrito
        $query = $this->carrito_model->getCart();        
        echo json_encode($query);
    }

}