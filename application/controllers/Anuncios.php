<?php
class Anuncios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('anuncios_model');
    }


    public function getAnuncios()
    {
        $data = [];
        $res = $this->anuncios_model->get_anuncios();
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
    public function addAnuncios()
    {
        $imagen = $this->input->post("imagen_anuncio");
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');

        $array = array(
            'imagen' => $imagen,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        );
        $exists = $this->anuncios_model->exist_anuncio($imagen);

        //MESA EXISTE?password
        if ($exists) {
            $data['message'] = "Este anuncio ya existe";
            $data['res'] = 'exists';
        } else {
            $res = $this->anuncios_model->add_anuncio($array);
            if ($res) {
                $data['message'] = 'Anuncio agregado exitosamente.';
                $data['res'] = TRUE;
            } else {
                $data['message'] = 'No se pudo agregar un nuevo anuncio, consulte con sistemas';
                $data['res'] = FALSE;
            }
        }
        echo json_encode($data);
    }
    public function updateAnuncio()
    {
        $data = [];
        $id_ad = $this->input->post("id_ad");
        $imagen = $this->input->post("imagen_anuncio");
        $fecha_inicio = $this->input->post('fecha_inicio');
        $fecha_fin = $this->input->post('fecha_fin');

        $old_anuncio = $this->input->post('old_anuncio');
        $array = array(
            'imagen' => $imagen,
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
        );
        if ($imagen != $old_anuncio) {
            $exists = $this->anuncios_model->exist_anuncio($imagen, $old_anuncio);
        }
        if ($imagen == $old_anuncio) {
            $exists = $this->anuncios_model->exist_anuncio($imagen, '', 'camposIguales');
        }

        if ($exists) {
            $data['message'] = "Este anuncio ya existe en la base de datos";
            $data['res'] = 'exists';
        } else {

            $res = $this->anuncios_model->update_anuncio($id_ad, $array);
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
    public function updateAnuncioStatus()
    {
        $id_ad = $this->input->post('id_ad');
        $activo = $this->input->post('activo') == 1 ? 0 : 1;
        $res = $this->anuncios_model->update_anuncio_status($id_ad, $activo);
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
    public function deleteAnuncio()
    {
        $data = [];
        $id_ad = $this->input->post("id_ad");

        $res = $this->anuncios_model->delete_anuncio($id_ad);
        if ($res == true) {
            $data["message"] = " eliminado correctamente";
            $data["res"] = true;
        } else {
            $data["res"] = false;
        }
        echo json_encode($data);
    }
}
