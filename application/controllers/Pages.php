<?php
class Pages extends CI_Controller{


    public function view($page = 'login')
    {       
     


        // $typeOfUser = json_encode($this->pagesControl_model->get_users_by_type('1'));
        // echo $typeOfUser;


        // die();


        
            if ( ! file_exists(APPPATH.'views/pages/private/'.$page.'.php') &&
            ! file_exists(APPPATH.'views/pages/public/'.$page.'.php') )
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
            if($page === 'login' || $page === 'recover'){
                $this->load->view('pages/public/'.$page);
            }


            if($page == 'home' || $page == 'restaurantes' || $page == 'mesas' || $page == 'repartidores' || $page == 'anuncios' || $page == 'homeRestaurante' || $page == 'menu' || $page == 'cuenta' || $page == 'reportes'){
                $this->load->view('pages/private/'.$page);
            }
    }
}
