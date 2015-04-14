<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Repertoire extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		session_start();
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Metamodel');
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
		$result['data'] = $this->Metamodel->get_all_repertoire();
		$result['level'] = $user->level;
		// Getting tags for each data
		foreach ($result['data'] as $key => $value) {
			$tags = $this->Metamodel->get_tags($value['id']);
			if ($tags != null) {
				$result['data'][$key]['tags'] = "";
				foreach ($tags as $k => $v) {
					$result['data'][$key]['tags'] .= ", " . $v['tag'];
				}
				$result['data'][$key]['tags'] = substr($result['data'][$key]['tags'], 2);
			} else {
				$result['data'][$key]['tags'] = "-";
			}
		}
		$this->load->view('header', $data);
		$this->load->view('index', $result);
		$this->load->view('footer');
	}

	public function testing()
	{
		echo base_url();
	}

	public function description($id)
	{
		$user = $this->authex->get_userdata();
		$userdata['email'] = $user->email;
		$userdata['level'] = $user->level;
		$desc = $this->Metamodel->get_repertoire($id);
		$instruments = $this->Metamodel->get_instruments($id);
		// Getting tags for $id
		$tags = $this->Metamodel->get_tags($id);
		if ($tags != null) {
			$desc[0]['tags'] = "";
			foreach ($tags as $k => $v) {
				$desc[0]['tags'] .= ", " . $v['tag'];
			}
			$desc[0]['tags'] = substr($desc[0]['tags'], 2);
		} else {
			$desc[0]['tags'] = '-';
		}
		$data = array(
			'desc' => $desc[0],
			'instruments' => $instruments[0],
			'level' => $user->level
		);
		$this->load->view('header', $userdata);
		$this->load->view('description', $data);
		$this->load->view('footer');
	}

	public function search()
	{
		$query = $this->input->post('query');
		$meta = $this->input->post('meta');
		$result['data'] = $this->Metamodel->search($query, $meta);
		foreach ($result['data'] as $key => $value) {
			$tags = $this->Metamodel->get_tags($value['id']);
			if ($tags != null) {
				$result['data'][$key]['tags'] = "";
				foreach ($tags as $k => $v) {
					$result['data'][$key]['tags'] .= ", " . $v['tag'];
				}
				$result['data'][$key]['tags'] = substr($result['data'][$key]['tags'], 2);
			} else {
				$result['data'][$key]['tags'] = "-";
			}
		}
		echo json_encode($result['data']);
	}

	public function bfce70fd3bbf2adb4800309d3a03a079e79cee9c($id)
	{
		$user = $this->authex->get_userdata();
		$userdata['email'] = $user->email;
		$userdata['level'] = $user->level;
		if ($user->level > 1)
		{
			redirect('repertoire');
		}
		$this->db->trans_begin();
		$this->Metamodel->delete_tags($id);
		$this->Metamodel->delete_instruments($id);
		$this->Metamodel->delete_repertoire($id);
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$this->load->view('header',$userdata);
			$this->load->view('delete_error');
			$this->load->view('footer');
		}
		else
		{
			$this->db->trans_commit();
			$this->load->view('header',$userdata);
			$this->load->view('delete_success');
			$this->load->view('footer');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */