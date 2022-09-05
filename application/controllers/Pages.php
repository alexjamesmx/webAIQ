<?php
class Pages extends CI_Controller
{


    public function view($page = 'login')
    {
    
        if (
            !file_exists(APPPATH . 'views/pages/private/' . $page . '.php') &&
            !file_exists(APPPATH . 'views/pages/public/' . $page . '.php')
        ) {
            // Whoops, we don't have a page for that!
            show_404();
        } else {
            if (
                $this->session->has_userdata("correo") )
            {

                $res = $this->users_model->exist_user($this->session->correo);
                if($res){
                    if ($page === 'login') {
                        $page = 'home';
                    }
                    if ($page === 'home' || $page === 'restaurantes' || $page === 'mesas' || $page === 'repartidores' || $page === 'anuncios' || $page === 'homeRestaurante' || $page === 'menu' || $page === 'cuenta' || $page === 'reportes') {
                        $this->load->view('pages/private/' . $page);
                    }
                }
                else {
                    $this->session->set_tempdata('message', "There's something wrong with your session, log in again", 3);
                    $this->load->view('pages/public/login');
                }
            }         
            else {
                if ($page === 'login' || $page === 'recover') {
                    $this->load->view('pages/public/' . $page);
                } else {
                    $this->load->view('pages/public/login');
                }

            }
        }
    }
}
