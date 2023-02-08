<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Echange extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    function __construct()
    {
        parent::__construct();
        if(! $this->session->has_userdata('userId')) redirect("login/index");
    }

	public function index()		
	{
        $this->load->model("echange_model", "model");
        $this->load->model("objets_model", "modelObjet");

        $idUser = $this->session->userdata("userId")->idUser;

        $data['content'] = "rencontreObjet";
        $data['header'] = "header";
        $data['title'] = "Lieu de rencontre objet";

        $objets = $this->model->getOtherObjet($idUser);
        $data['objets'] = $objets;

        $arrayPhoto = array();

        for ($i=0; $i < count($objets); $i++) { 
            $listesPhotos = $this->modelObjet->getPhoto($objets[$i]['idObjet']);
            if(count($listesPhotos) != 0) $arrayPhoto[] = $listesPhotos[0]['photo'];
            else $arrayPhoto[] = "default.jpg";
        }

        $data['arrayPhoto'] = $arrayPhoto;


        $this->load->model("backOffice_model","back");

       $listes=$this->back->getAllCategories();
        $data['categorie']=$listes;

        //var_dump($listes);
        

        $this->load->view('template', $data);

    }		

    public function detailOtherObjet($idObjet)
    {
        $this->load->model("objets_model", 'objmodel');
        $this->load->model("echange_model", 'emodel');
        $this->load->model("backOffice_model", "backoffice");

        $idUser = $this->session->userdata("userId")->idUser;

        $objet = $this->objmodel->getObjet($idObjet);
        $data['content'] = "detailOtherObjet";
        $data['header'] = "header";
        $data['title'] = "Detail de l'objet";
        $data['objet'] = $objet;

        $idProprietaire = $this->emodel->getCurrentProprietaire($idObjet);
        $data['proprietaire'] = $this->emodel->getUser($idProprietaire);

        $categorie = $this->backoffice->getCategorie($data['objet']['idCategorie']);
        $data['categorie'] = $categorie['nom'];
        $data['photos'] = $this->objmodel->getPhoto($objet['idObjet']);
        $data['ownObjets'] = $this->emodel->getUserObjet($idUser);

        $this->load->view("template", $data);
    }

    public function demanderEchange()
    {
        $this->load->model("echange_model");
        $this->load->model("objets_model");

        $idObjetDemande = $this->input->post("idObjetDemande");
        $idObjetEchange = $this->input->post("idObjetEchange");

        $recepteur = $this->objets_model->getUserOb($idObjetDemande);
        $envoyeur = $this->objets_model->getUserOb($idObjetEchange);
        $idRecepteur = $recepteur['idUser'];
        $idEnvoyeur = $envoyeur['idUser'];

        $this->echange_model->demanderEchange($idObjetDemande, $idObjetEchange, $idRecepteur, $idEnvoyeur);

        redirect("echange/index");
    }

    public function gestionEchange()
    {
        $this->load->model("echange_model");
        $idUser = $this->session->userdata("userId")->idUser;

        $data['demandeRecu'] = $this->echange_model->getPropositionRecu($idUser);
        $data['demandeEnvoyer'] = $this->echange_model->getPropositionEnvoyer($idUser);
        $data['content'] = "gestionEchange";
        $data['header'] = "header";
        $data['title'] = "Gestion des echanges";
        $this->load->view("template", $data);
    }

    public function annulerEchange($idEchange)
    {
        $this->load->model("echange_model", "model");
        $this->model->refuserProposition($idEchange);

        redirect("echange/gestionEchange");
    }

    public function accepterEchange($idEchange)
    {
        $this->load->model("echange_model", "model");
        $this->model->accepterProposition($idEchange);

        redirect("echange/gestionEchange");
    }
	
}
