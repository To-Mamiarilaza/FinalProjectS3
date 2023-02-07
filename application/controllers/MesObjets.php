<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MesObjets extends CI_Controller {

    public function getUser($idUser)
    {
        $this->load->model('objets_model','objet');
		$this->objet->getUserObjet(5);
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
		$this->objet->accepterProposition(3);
    }

    public function refuser($idProp)
    {
        $this->load->model('echange_model','objet');
		$this->objet->refuserProposition(3);
    }
}

?>