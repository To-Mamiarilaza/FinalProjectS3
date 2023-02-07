<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MesObjets extends CI_Controller {

    public function index()
    {
        $data['content'] = "mesObjets";
        $data['header'] = "header";
        $data['title'] = "Mes Objets";
        
        $this->load->view('template', $data);
    }

    public function getUser($idUser)
    {
        $this->load->model('objets_model','objet');
		$this->objet->getUserObjet(2);
    }

    public function supprimerCat($idCat)
    {
        $this->load->model('objets_model','objet');
		$this->objet->supprimerObjet(2);
    }


    public function getAllObj()
    {
        $this->load->model('echange_model','objet');
		$this->objet->getAllObjet();
    }

    public function getUserObj($idUser)
    {
        $this->load->model('echange_model','objet');
		$this->objet->getUserObjet(3);
    }

    public function accepter($idProp)
    {
        $this->load->model('echange_model','objet');
		$this->objet->accepterProposition(8);
    }

    public function refuser($idProp)
    {
        $this->load->model('echange_model','objet');
		$this->objet->refuserProposition(6);
    }
}

?>