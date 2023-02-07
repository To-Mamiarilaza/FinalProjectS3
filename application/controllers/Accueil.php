<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {

    public function index()
    {
        $data['content'] = "listesProjet";
        $nom = $this->session->userdata('userId')->nom;
        
        echo ("Bonjour " . $nom);
        $this->load->view('template', $data);
    }
}

?>