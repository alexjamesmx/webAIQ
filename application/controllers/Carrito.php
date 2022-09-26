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

    //agrega productos en carrito y en caso necesario crea nuevo carrito
    public function addProd() 
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
        //obtener carrito
        $carrito = $this->carrito_model->getCart($query->id);

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

        $confirmacion = [];
        foreach ($carrito as $row)
        {
            $data['id_carrito'] = $row['id_carrito'];
            $data['id_comida'] = $row['id_comida'];
            $data['cantidad'] = $row['cantidad'];

            if ($idComida == $data['id_comida']) {
                $res = $this->carrito_model->addProd($idCart, $idComida, $cantidad);
                if ($res) {
                    $confirmacion['message'] = 'Producto actualizado en carrito exitosamente.';
                    $confirmacion['res'] = $res;
                } else {
                    $confirmacion['message'] = 'No se pudo actualizar el producto, intente mas tarde';
                    $confirmacion['res'] = $res;
                }
                echo json_encode($confirmacion);
            }
        }

        if ($confirmacion == NULL) {
            //mandamos a insertar datos
            $res = $this->carrito_model->addCart($array);
            $arRes = [];
            if ($res) {
                $arRes['message'] = 'Producto agregado a carrito exitosamente.';
                $arRes['res'] = $res;
            } else {
                $arRes['message'] = 'No se pudo agregar el producto, intente mas tarde';
                $arRes['res'] = $res;
            }
            echo json_encode($arRes);
        }
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

    public function validaCodigo($codigo) {
        $query = $this->carrito_model->getCodigo($codigo); 
        $data = [];

        if($query) {[
            $data['message'] = "El codigo es valido",
            $data['res'] = TRUE,
        ];} else {[
            $data['message'] = "El codigo es invalido",
            $data['res'] = FALSE,
        ];}

        echo json_encode($data);
    }

    public function borraCodigo() {
        $codigo = $this->input->post("codigo");
        $res = $this->carrito_model->deleteCodigo($codigo);

        $data = [];
        if ($res) {
            $data['message'] = 'Codigo eliminado exitosamente.';
            $data['res'] = TRUE;
        } else {
            $data['message'] = 'No se pudo eliminar el codigo, intente más tarde';
            $data['res'] = FALSE;
        }
        echo json_encode($data);
    }

    public function borraCarrito() {
        //obtener idCarrito
        $idMesa = $this->input->post("id_mesa");
        $query = $this->carrito_model->getIdCart($idMesa);

        //VALIDANDO ESTATUS CARRITO
        if (($query == true) || ($query->id_status == 1))  {
            //en caso de no existir carrito en proceso, se crea uno nuevo
            $this->carrito_model->borraCarrito($query->id);
        }
    }

}