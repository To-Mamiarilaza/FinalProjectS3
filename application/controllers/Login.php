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

	public function loginAdmin()
	{
		$this->load->view('loginAdmin');
	}

	public function checkLoginUser()
	{
		$this->load->model('login_model');

		$mail = $this->input->post('mail');
		$mdp = $this->input->post('mdp');

		$test = $this->login_model->checkLoginUser($mail, $mdp);

		if ($test == null) {
			$data['nom'] = $mail;
			$data['erreur'] = "erreur";
			$this->load->view('loginClient', $data);
		}
		else {
			$this->session->set_userdata('userId', $test);
			redirect("./accueil/index");
		}
	}

	public function checkLoginAdmin()
	{
		$this->load->model('login_model');

		$nom = $this->input->post('nom');
		$mdp = $this->input->post('mdp');

		$test = $this->login_model->checkLoginAdmin($nom, $mdp);

		if ($test == null) {
			$data['nom'] = $nom;
			$data['erreur'] = "erreur";
			$this->load->view('loginAdmin', $data);
		}
		else {
			$this->session->set_userdata('userId', $test);
			redirect("./accueil/index");
		}
	}
}
