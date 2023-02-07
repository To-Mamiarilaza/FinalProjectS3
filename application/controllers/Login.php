<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('loginClient');
	}		

	public function checkLogin()
	{
		$this->load->model('login_model');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('mdp');

		$test = $this->login_model->checkLogin($nom, $mdp);

		if ($test == null) {
			$data['nom'] = $nom;
			$data['erreur'] = "erreur";
			$this->load->view('login', $data);
		}
		elseif ($test->profil == 0) {
			$this->session->set_userdata('userId', $test);
			redirect("./accueil/index");
		}
		else {
			$this->session->set_userdata('userId', $test);
			redirect("./login/index");
		}
	}
}
