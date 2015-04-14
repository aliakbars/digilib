<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/uploader
	 *	- or -  
	 * 		http://example.com/index.php/uploader/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/uploader/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('authex');
		if ($this->authex->logged_in())
		{
			redirect("repertoire");
		}
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$success = $this->authex->login($username,$password);
		echo json_encode($success);
	}
}

/* End of file uploader.php */
/* Location: ./application/controllers/uploader.php */