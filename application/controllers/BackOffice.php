<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('adminId')) redirect("./login/loginAdmin");
    }

    public function index($erreur = null)
    {
        $this->load->model('backOffice_model', 'model');
        $data['content'] = "backOffice";
        $data['header'] = "headerAdmin";
        $data['title'] = "BackOffice page";
        $data['categories'] = $this->model->getAllCategories();
		$nombre1=$this->model->getNumberUser();
        $nombre2=$this->model->getNumberEchange();
        $data['nombre1']=$nombre1;
        $data['nombre2']=$nombre2;
        $this->load->view('template', $data);
    }

    public function newCategorie() {
        $this->load->model('backOffice_model', 'model');

        $nom = $this->input->post('nom');

        $this->model->insertNewCategorie($nom);
        redirect('./backOffice/index');
    }

    public function deleteCategorie($id) {      // supprime un categorie
        $this->load->model('backOffice_model', 'model');
        $this->model->supprimerCategorie($id);
        redirect('./backOffice/index');
    }

    public function updateCategorie() {
        $this->load->model('backOffice_model', 'model');

        $nom = $this->input->post('nom');
        $idCategorie = $this->input->post('idCategorie');

        $this->model->modifierCategorie($idCategorie, $nom);

        redirect('./backOffice/index');
    }


   

}

?>