<?php
class Whats extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Debug
        //	$this->output->enable_profiler(TRUE);
    }

    public function whatsapp()
    {

        $this->load->view('message');

        if ($this->input->post('save')) {
            $phone = $this->input->post('phone');
            $user_message = $this->input->post('message');



            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.ultramsg.com/instance16850/messages/chat",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "token=mgwcptvw89frioq5&to=" . $phone . "&body=" . $user_message . "&priority=1&referenceId=",
                CURLOPT_HTTPHEADER => array(
                    "content-type: application/x-www-form-urlencoded"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
        }
    }
}