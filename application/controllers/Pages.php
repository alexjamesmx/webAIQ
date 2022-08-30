<?php
class Pages extends CI_Controller{
    public function view($page = 'home')
    {        
            if ( ! file_exists(APPPATH.'views/pages/private/'.$page.'.php') &&
            ! file_exists(APPPATH.'views/pages/public/'.$page.'.php') )
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
            if($page == 'login' || $page == 'recover'){
                $this->load->view('pages/public/'.$page);
            }
            if($page == 'home'){
                $this->load->view('pages/private/'.$page);
            }    
    }
}
