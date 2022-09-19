<?php
class Carrito extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('carrito_model');
    }

    public function createCart($id_mesa)
    {
        $this->carrito_model->createCart($id_mesa);
        echo "Carrito nuevo creado con exito";
    }

    public function getCart($id_mesa) {
        //obtener idCarrito
        $query = $this->carrito_model->getIdCart($id_mesa);
        $carrito = $this->carrito_model->getCart($query);

        echo json_encode($carrito);
    }

    public function addCart() 
    {
        //obtener idCarrito
        $query = $this->carrito_model->getIdCart();

        //datos a insertar en detalle_carrito
        $idCart = $query;
        $idComida = $this->input->post("id_comida");
        $precio = $this->input->post("precio");
        $cantidad = $this->input->post("cantidad");
        $subtotal = $this->input->post("subtotal");
        $comentario = $this->input->post("comentario");
        //arreglo con datos a insertat
        $array = array(
            'id_carrito' => $idCart,
            'id_comida' => $idComida,
            'precio' => $precio,
            'cantidad' => $cantidad,
            'subtotal' => $subtotal,
            'comentario' => $comentario,
        );
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

    public function deteleItemCart() 
    {
        //obtener idCarrito
        $query = $this->carrito_model->getCart();        
        echo json_encode($query);

        //datos para where
        $idCart = $query;
        $idComida = $this->input->post("id_comida");
        print_r($idCart, $idComida);

        $prod = $this->carrito_model->deleteItemCart($idCart, $idComida);
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