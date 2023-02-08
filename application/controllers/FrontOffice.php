<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontOffice extends CI_Controller {

    public function recherher()
    {
        $this->load->model('backOffice_model','back');
		$this->back->recherche();
    }

    
    public function getUserObjet($idObjet)
    {
        $this->load->model('objets_model','obj');
		$this->obj->getUserOb(2);

    }

    public function historiser()
    {

    }
    
}

?>