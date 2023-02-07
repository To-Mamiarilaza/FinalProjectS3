<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function index()
    {
        $data['content'] = "listesProjet";
        $data['header'] = "header";
        
        $this->load->view('template', $data);
    }

    public function supprimer($idCat)
    {
        $this->load->model('BackOffice','back');
		$this->back->supprimerCategorie(3);
    }
}

?>