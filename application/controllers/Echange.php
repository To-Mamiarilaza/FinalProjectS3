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

	public function index()		// Charge la page login du client
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

        $this->load->view('template', $data);
    }		

	
}
