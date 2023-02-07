<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

    public function supprimer($idCat)
    {
        $this->load->model('backOffice_model','back');
		$this->back->supprimerCategorie(3);
    }

    
    public function getAllCat()
    {
        $this->load->model('backOffice_model','back');
		$this->back->getAllCategories();
    }
    
}

?>