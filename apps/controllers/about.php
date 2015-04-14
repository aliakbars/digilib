<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/about
	 *	- or -  
	 * 		http://example.com/index.php/about/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/about/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('authex');
		if (!$this->authex->logged_in())
		{
			redirect("auth");
		}
	}

	public function index()
	{
		$user = $this->authex->get_userdata();
		$data['email'] = $user->email;
		$data['level'] = $user->level;
		$this->load->view('header',$data);
		$this->load->view('about');
		$this->load->view('footer');
	}
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */