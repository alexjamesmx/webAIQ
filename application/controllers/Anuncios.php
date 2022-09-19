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
    public function updateAnuncioFecha()
    {
        $data = [];
        $id_ad = $this->input->post("id_ad");
        $inicio_anuncio = $this->input->post('inicio_anuncio');
        $fin_anuncio = $this->input->post('fin_anuncio');

        $array = array(
            'fecha_inicio' => $inicio_anuncio,
            'fecha_fin' => $fin_anuncio,
        );

        $res = $this->anuncios_model->update_anuncio_fecha($id_ad, $array);
        if ($res) {
            $data["message"] = "Fecha actualizada";
            $data["res"] = $res;
        } else {
            $data["message"] = "No ha sido posible actualizar por el momento";
            $data["res"] = $res;
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



    public function subirImagen()
    {
        $inicio_anuncio = $this->input->post('inicio_anuncio');
        $fin_anuncio = $this->input->post('fin_anuncio');


        $config['upload_path'] = 'static/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';

        $nuevoNombreImg = 'platillo' . (date('YmdHis'));
        $config['file_name'] = strtolower($nuevoNombreImg);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $file_info = $this->upload->data();

            $imagen = $file_info['file_name'];
            $array = [
                'imagen' => $imagen,
                'fecha_inicio' => $inicio_anuncio,
                'fecha_fin' => $fin_anuncio,
            ];
            echo json_encode(
                $this->anuncios_model->imagen($array)
            );
        }
    }
    public function actualizarImagen()
    {
        $id_ad = $this->input->post('id_ad');
        $id_ad = intval($id_ad);

        $config['upload_path'] = 'static/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '5000';

        $nuevoNombreImg = 'platillo' . ($hoy = date('YmdHis'));
        $config['file_name'] = strtolower($nuevoNombreImg);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fotos')) {
            $file_info = $this->upload->data();
            $imagen = $file_info['file_name'];
            $array = [
                'imagen' => $imagen,
            ];
        }
        echo json_encode(
            $this->anuncios_model->imagen_where($array, $id_ad)
        );
    }
}
