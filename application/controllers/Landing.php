<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{

    public function index()
    {
        $data = array();
        $data['_APP']['header'] = $this->load->view('public/header_f', $data, TRUE);
        $data['_APP']['footer'] = $this->load->view('public/footer_f', $data, TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/inicio_f', $data, TRUE);
        $this->load->view('public/landing_v', $data, FALSE);
    }

    public function contacto()
    {
        $data = array();
        $data['_APP']['header'] = $this->load->view('public/header_f', $data, TRUE);
        $data['_APP']['footer'] = $this->load->view('public/footer_f', $data, TRUE);
        $data['_APP']['fragment'] = '
        <div style="width: 100%; height: 200px; background:#01551f"></div>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><h1 class="text-center">Contacto</h1><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        ';
        $this->load->view('public/landing_v', $data, FALSE);
    }
}

/* End of file Landing.php */
/* Location: ./application/controllers/Landing.php */
