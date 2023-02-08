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
        
        $objet = $this->model->getObjet($idObjet);
        $data['objet'] = $objet;
        $data['proprietaire'] = $this->model->getUserOb($objet['idObjet']);

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

    public function updateObjet()
    {
        $this->load->model("objets_model", "model");

        $nom = $this->input->post("nom");
        $description = $this->input->post("description");
        $idCategorie = $this->input->post("idCategorie");
        $idObjet = $this->input->post("idObjet");
        $idUser = $this->input->post("idUser");

        $this->model->updateObjet($idObjet, $idCategorie, $idUser, $nom,  $description);

        redirect("./mesObjets/detailObjet/".$idObjet);
    }

    public function deleteObjet($idObjet)
    {
        $this->load->model("objets_model", "model");
        $this->model->supprimerObjet($idObjet);

        redirect("./mesObjets/index");
    }

    public function ajoutPhoto()
    {
        $idObjet = $this->input->post("idObjet");

        $this->load->model("objets_model", "model");

        
    }
}

?>