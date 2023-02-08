<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontOffice extends CI_Controller {

    public function recherche()
    {
        $idUser=$_SESSION['userId'];
        //echo $idUser->idUser;
       $nomObjet=$this->input->get('nom');
       $idCategorie=$this->input->get('categorie');
        $this->load->model('frontOffice_model','front');
        $this->load->model("objets_model", "modelObjet");
        $arrayPhotos = array();
	    $liste=$this->front->getSpecifiqueObjet($nomObjet,$idCategorie,$idUser->idUser);
        for ($i=0; $i < count($liste); $i++) { 
            $listesPhotos = $this->modelObjet->getPhoto($liste[$i]['idObjet']);
            if(count($listesPhotos) != 0) $arrayPhotos[] = $listesPhotos[0]['photo'];
            else $arrayPhotos[] = "default.jpg";
        }
        $data['arrayPhotos'] = $arrayPhotos;
        $data['liste']=$liste;
        $this->load->view('rencontreObjet',$data);

    }

    
    public function getUserObjet($idObjet)
    {
        $this->load->model('objets_model','obj');
		$this->obj->getUserOb(2);

    }

    public function historiser($idObjet)
    {
       
      
        $this->load->model('frontOffice_model','front');
		//$this->front->getNomUser($this->session->userdata("userid"));
		$histo=$this->front->historique($idObjet);
        $ancien=array();
        $nouveau=array();
        for ($i=0; $i <count($histo) ; $i++) { 
            $ancien[]=$this->front->getNomUser($histo[$i]['idEnvoyeur']);
            $nouveau[]=$this->front->getNomUser($histo[$i]['idRecepteur']);
        }
       
        $data['histo']=$histo;
        $data['ancien']=$ancien;
        $data['nouveau']=$nouveau;
      $this->load->view('historique',$data);

    }
    public function voirplus()
    {
        $this->load->view('historique');
    }
    
    
}

?>