<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MesObjets extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}


    public function accepter($idEchange)
    {
        $this->load->model("echange_model", "model");
        $this->model->accepterProposition(9);
    }
    
    public function index()
    {
        $this->load->model("objets_model", 'objModel');
        $this->load->model("echange_model", 'echange');

        $data['content'] = "mesObjets";
        $data['header'] = "header";
        $data['title'] = "Mes Objets";

        $objets = $this->echange->getUserObjet($this->session->userdata('userId')->idUser);
        $data['objets'] = $objets;

        $arrayPhoto = array();

        for ($i=0; $i < count($objets); $i++) { 
            $listesPhotos = $this->objModel->getPhoto($objets[$i]['idObjet']);
            if(count($listesPhotos) != 0) $arrayPhoto[] = $listesPhotos[0]['photo'];
            else $arrayPhoto[] = "default.jpg";
        }

        $data['arrayPhoto'] = $arrayPhoto;

        $this->load->view('template', $data);
    }

    public function detailObjet($idObjet) 
    {
        $this->load->model("objets_model", 'model');
        $this->load->model("echange_model", 'emodel');
        $this->load->model("backOffice_model", "backoffice");

        $data['content'] = "detailObjet";
        $data['header'] = "header";
        $data['title'] = "Detail de l'objet";
        $data['categories'] = $this->backoffice->getAllCategories();
        
        $objet = $this->model->getObjet($idObjet);
        $data['objet'] = $objet;
        $idPropr = $this->emodel->getCurrentProprietaire($objet['idObjet']);
        $data['proprietaire'] = $this->emodel->getUser($idPropr);
        $data['photos'] = $this->model->getPhoto($objet['idObjet']);

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
        $prix = $this->input->post('prix');
        $idCategorie = $this->input->post('idCategorie');
        $description = $this->input->post('description');
        $idUser = $this->session->userdata('userId')->idUser;

        $this->model->insertNewObjet($idCategorie, $idUser, $nom, $description,$prix);
        redirect('./mesObjets/index');
    }

    public function updateObjet()
    {
        $this->load->model("objets_model", "model");

        $nom = $this->input->post("nom");
        $prix= $this->input->post("prix");
        $description = $this->input->post("description");
        $idCategorie = $this->input->post("idCategorie");
        $idObjet = $this->input->post("idObjet");
        $idUser = $this->input->post("idUser");

        $this->model->updateObjet($idObjet, $idCategorie, $idUser, $nom,  $description, $prix);

        redirect("./mesObjets/detailObjet/".$idObjet);
    }

    public function deleteObjet($idObjet)
    {
        $this->load->model("objets_model", "model");
        $this->model->supprimerObjet($idObjet);

        redirect("./mesObjets/index");
    }

    public function supprObjet($idObjet)
    {
        $this->load->model('objets_model','obj');
		$this->obj->supprimerObjet(3);
    }

    
    
}

?>