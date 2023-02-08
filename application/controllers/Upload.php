<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
        $fichier = basename($_FILES['userfile']['name']);
        $idObjet = $this->input->post('idObjet');

		$config['upload_path'] = './assets/images/objet';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100000';
		$config['max_width']  = '100000';
		$config['max_height']  = '100000';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

            redirect("mesObjets/detailObjet/".$idObjet);
		}
		else
		{
            $this->load->model("objets_model", "model");
            $this->model->insertNewPhoto($fichier, $idObjet);

			$data = array('upload_data' => $this->upload->data());
            
            redirect("mesObjets/detailObjet/".$idObjet);
		}
	}
}

?>