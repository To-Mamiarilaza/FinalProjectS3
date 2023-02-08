<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MesObjets extends CI_Controller {

    public function index()
    {
        $this->load->model("objets_model", 'model');

        $data['content'] = "mesObjets";
        $data['header'] = "header";
        $data['title'] = "Mes Objets";

        $data['objets'] = $this->model->getUserObjet($this->session->userdata('userId')->idUser);

        $this->load->view('template', $data);
    }

    public function detailObjet($idObjet) 
    {
        $this->load->model("objets_model", 'model');
        $this->load->model("backOffice_model", "backoffice");

        $data['content'] = "detailObjet";
        $data['header'] = "header";
        $data['title'] = "Detail de l'objet";
        $data['categories'] = $this->backoffice->getAllCategories();
        
        $data['proprietaire'] = $this->model->
        $data['objet'] = $this->model->getObjet($idObjet);

        $this->load->view('template', $data);
    }

    public function newObjet()
    {
        $this->load->model('backOffice_model', 'model');

        $data['content'] = "newObjet";
        $data['header'] = "header";
        $data['title'] = "Nouveau Objet";
        $data['categories'] = $this->model->getAllCategories();

        $this->load->view('template', $data);
    }

    public function insertNewObjet()
    {
        $this->load->model('objets_model', 'model');

        $nom = $this->input->post('nom');
        $idCategorie = $this->input->post('idCategorie');
        $description = $this->input->post('description');
        $idUser = $this->session->userdata('userId')->idUser;

        $this->model->insertNewObjet($idCategorie, $idUser, $nom, $description);
        redirect('./mesObjets/index');
    }

    public function supprObjet($idObjet)
    {
        $this->load->model('objets_model','obj');
		$this->obj->supprimerObjet(3);
    }
}

?>