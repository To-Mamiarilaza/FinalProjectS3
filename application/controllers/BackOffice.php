<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {
    public function index()
    {
        $data['content'] = "backOffice";
        $data['title'] = "BackOffice page";
        $this->load->view('template', $data);
    }
}

?>