<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {
    public function index()
    {
        $this->load->model('backOffice_model', 'model');

        $data['content'] = "backOffice";
        $data['title'] = "BackOffice page";
        $data['categories'] = $this->model->getAllCategories();

        $this->load->view('template', $data);
    }

    public function newCategorie() {
        $this->load->model('backOffice_model', 'model');

        
    }
}

?>