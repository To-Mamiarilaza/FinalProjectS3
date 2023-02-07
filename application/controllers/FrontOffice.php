<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontOffice extends CI_Controller {

    public function recherher()
    {
        $this->load->model('frontOffice_model','front');
		$this->front->recherche();

        $nomObjet = $this->input->get('nom');
        $idCategorie = $this->input->get('idCategorie');

        $this->load->model('frontOffice_model','front');
		$this->front->getSpecifiqueObjet($nomObjet,$idCategorie);

    }

    
    public function getUserObjet($idObjet)
    {
        $this->load->model('objets_model','obj');
		$this->obj->getUserOb(2);

    }

    public function historiser()
    {

        $this->load->model('frontOffice_model','front');
		$this->front->getNomUser($user);

        $this->load->model('frontOffice_model','front');
		$this->front->historique();
    }
    
}

?>