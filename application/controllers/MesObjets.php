<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MesObjets extends CI_Controller {

    public function getUser($idUser)
    {
        $this->load->model('objets_model','objet');
		$this->objet->getUserObjet(3);
    }

    public function supprimerCat($idCat)
    {
        $this->load->model('objets_model','objet');
		$this->objet->supprimerObjet(2);
    }
}

?>