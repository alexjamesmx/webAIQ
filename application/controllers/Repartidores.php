<?php
class Repartidores extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('repartidores_model');
    }


    public function getRepartidores()
    {
        $data = [];
        $res = $this->repartidores_model->get_repartidores();
        if ($res) {
            $data['data'] = $res;
            $data['message'] = 'Datos extraídos correctamente';
            $data['res'] = TRUE;
        } else {
            $data['message'] = "No existen datos en la base de datos";
            $data['res'] = FALSE;
        }
        echo json_encode($data);
    }
    public function addRepartidor()
    {
        $telefono = $this->input->post("phone_repartidor");
        // $activo = $this->input->post("activo_repartidor");
        $nombre = $this->input->post('nombre_repartidor');
        $array = array(
            'telefono' => $telefono,
            'nombre' => $nombre,
        );
        $exists = $this->repartidores_model->exist_repartidor($telefono);

        //MESA EXISTE?password
        if ($exists) {
            $data['message'] = "Este telefono ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {
            $res = $this->repartidores_model->add_repartidor($array);
            if ($res) {
                $data['message'] = 'Repartidor agregado exitosamente.';
                $data['res'] = TRUE;
            } else {
                $data['message'] = 'No se pudo agregar un nuevo repartidor, consulte con sistemas';
                $data['res'] = FALSE;
            }
        }
        echo json_encode($data);
    }
    public function updateRepartidor()
    {
        $data = [];
        $id_rep = $this->input->post("id_rep");
        $telefono = $this->input->post("phone_repartidor");
        $nombre = $this->input->post('nombre_repartidor');
        $old_phone = $this->input->post('old_telefono');
        $array = array(
            'nombre' => $nombre,
            'telefono' => $telefono,
        );
        if ($nombre != $old_phone) {
            $exists = $this->repartidores_model->exist_repartidor($telefono, $old_phone);
        }
        if ($nombre == $old_phone) {
            $exists = $this->repartidores_model->exist_repartidor($telefono, '', 'camposIguales');
        }


        if ($exists) {
            $data['message'] = "Este repartidor/usuario ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {

            $res = $this->repartidores_model->update_repartidor($id_rep, $array);
            if ($res) {
                $data["message"] = " actualizado exitosamente";
                $data["res"] = $res;
            } else {
                $data["message"] = "No ha sido posible actualizar por el momento";
                $data["res"] = $res;
            }
        }
        echo json_encode($data);
    }
    public function updateRepartidorStatus()
    {
        $id_rep = $this->input->post('id_rep');
        $activo = $this->input->post('activo') == 1 ? 0 : 1;
        $res = $this->repartidores_model->update_repartidor_status($id_rep, $activo);
        if ($res) {
            $data['data'] = $res;
            $data['message'] = 'Datos extraidos correctamente';
            $data['res'] = TRUE;
        } else if ($res == false) {
            $data['data'] = $res;
            $data['message'] = 'Hubo un problema con la peticion';
            $data['res'] = FALSE;
        }
        echo json_encode($data);
    }
    public function deleteRepartidor()
    {
        $data = [];
        $id_rep = $this->input->post("id_rep");

        $res = $this->repartidores_model->delete_repartidor($id_rep);
        if ($res == true) {
            $data["message"] = " eliminado correctamente";
            $data["res"] = true;
        } else {
            $data["res"] = false;
        }
        echo json_encode($data);
    }



    public function updateRepartidorActivo()
    {

        $data = json_decode(file_get_contents('php://input'), true);
        $telefono = $data["telefono"];

        $res = $this->repartidores_model->update_repartidor_activo($telefono);

        if ($res === 'no existe') {
            $data['message'] = 'Este número no esta registrado';
            $data['res'] = FALSE;
        } else if ($res) {
            $data['data'] = [$res[0]['nombre'], $res[0]['activo']];
            $data['message'] = 'Estatus actualizado correctamente';
            $data['res'] = TRUE;
        } else {
            $data['message'] = 'Hubo un problema con la petición';
            $data['res'] = FALSE;
        }
        echo json_encode($data);
    }
}
