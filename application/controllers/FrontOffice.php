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