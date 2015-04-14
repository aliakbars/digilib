<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader extends CI_Controller {

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
		$this->load->database();
		$this->load->library('upload');
		$this->load->library('authex');
		$this->load->model('Metamodel');
		if (!$this->authex->logged_in())
		{
			redirect("auth");
		}
		if ($this->authex->get_userdata()->level > 2)
		{
			redirect("repertoire");
		}
	}

	public function index()
	{
		$user = $this->authex->get_userdata();
		$data['email'] = $user->email;
		$data['level'] = $user->level;
		$this->load->view('header',$data);
		$this->load->view('uploader');
		$this->load->view('footer');
	}

	public function upload()
	{
		$this->db->trans_begin();

		// Inserting repertoire data
		$title = $this->input->post('title');
		$composer = $this->input->post('composer');
		$arranger = $this->input->post('arranger');
		$format = $this->input->post('format');
		$year = $this->input->post('year');
		$location = "/" . urlencode($arranger) . "/" . urlencode($title) . ".zip";
		$id = md5($title . $arranger . $year);

		$repertoire_data = array(
			'id' => $id,
			'title' => $this->db->escape_str($title),
			'composer' => $this->db->escape_str($composer),
			'arranger' => $this->db->escape_str($arranger),
			'format' => $format,
			'year' => $year,
			'location' => $location,
			'timestamp' => date('Y-m-d H:i:s')
		);

		$this->Metamodel->insert_repertoire($repertoire_data);

		// Inserting instruments data
		$violin = $this->input->post('violin') == '1' ? 1 : 0;
		$viola = $this->input->post('viola') == '1' ? 1 : 0;
		$violoncello = $this->input->post('violoncello') == '1' ? 1 : 0;
		$contrabass = $this->input->post('contrabass') == '1' ? 1 : 0;

		$flute = $this->input->post('flute') == '1' ? 1 : 0;
		$clarinet = $this->input->post('clarinet') == '1' ? 1 : 0;
		$oboe = $this->input->post('oboe') == '1' ? 1 : 0;
		$bassoon = $this->input->post('bassoon') == '1' ? 1 : 0;

		$trumpet = $this->input->post('trumpet') == '1' ? 1 : 0;
		$trombone = $this->input->post('trombone') == '1' ? 1 : 0;
		$tuba = $this->input->post('tuba') == '1' ? 1 : 0;
		$horn = $this->input->post('horn') == '1' ? 1 : 0;
		$otherbrass = $this->input->post('otherbrass') == '1' ? 1 : 0;

		$otherpercussion = $this->input->post('otherpercussion') == '1' ? 1 : 0;
		$timpani = $this->input->post('timpani') == '1' ? 1 : 0;
		$piano = $this->input->post('piano') == '1' ? 1 : 0;
		$guitar = $this->input->post('guitar') == '1' ? 1 : 0;
		$choir = $this->input->post('choir') == '1' ? 1 : 0;

		$instruments_data = array(
			'id' => $id,
			'violin' => $violin,
			'viola' => $viola,
			'violoncello' => $violoncello,
			'contrabass' => $contrabass,
			'flute' => $flute,
			'clarinet' => $clarinet,
			'oboe' => $oboe,
			'bassoon' => $bassoon,
			'trumpet' => $trumpet,
			'trombone' => $trombone,
			'tuba' => $tuba,
			'horn' => $horn,
			'otherbrass' => $otherbrass,
			'otherpercussion' => $otherpercussion,
			'timpani' => $timpani,
			'piano' => $piano,
			'guitar' => $guitar,
			'choir' => $choir,
			'timestamp' => date('Y-m-d H:i:s')
		);

		$this->Metamodel->insert_instruments($instruments_data);

		if ($violin + $viola + $violoncello + $contrabass + $flute + $clarinet +
			$oboe + $trumpet + $trombone + $tuba + $horn + $timpani + $piano + $guitar == 0)
		{
			$this->db->trans_rollback();
			$error = array('error' => "No instruments selected");
			$user = $this->authex->get_userdata();
			$data['email'] = $user->email;
			$data['level'] = $user->level;
			$this->load->view('header', $data);
			$this->load->view('uploader', $error);
			$this->load->view('footer');
		}
		else
		{
			// Inserting tags data
			$raw_tags = $this->input->post('tags');
			$tags = $this->db->escape_str($raw_tags);

			$tags = explode(',', $tags);
	        for ($it = 0; $it < sizeof($tags); $it++)
	        {
	            $tag = preg_replace('/^[ \t]+|[ \t]+$/', '', $tags[$it]);
	            if ($tag != "")
	            {
	            	$this->Metamodel->insert_tags(array('id'=>$id,'tag'=>$tag,'timestamp'=>date('Y-m-d H:i:s')));
	            }
	        }

			$this->do_upload($location);

	        if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
			else
			{
				$this->db->trans_commit();
			}
		}
	}

	function do_upload($location)
	{
		// TODO IF not exist folder THEN create ELSE change folder
		$loc = explode('/', $location);
		$folder = "./public/library/" . $loc[1];
		if (!is_dir($folder))
		{
			mkdir($folder);
		}
		$config['upload_path'] = $folder;
		$config['file_name'] = $loc[2];
		$config['overwrite'] = true;
		$config['allowed_types'] = 'zip|rar';
		$config['max_size'] = 5 * 1024;
		$this->upload->initialize($config);

		if (!$this->upload->do_upload())
		{
			$this->db->trans_rollback();
			$error = array('error' => $this->upload->display_errors());
			$error = array('error' => "No instruments selected");
			$user = $this->authex->get_userdata();
			$data['email'] = $user->email;
			$data['level'] = $user->level;
			$this->load->view('header', $data);
			$this->load->view('uploader', $error);
			$this->load->view('footer');
		}
		else
		{
			$this->success();
		}
	}

	function editor($id)
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
			$desc[0]['tags'] = "";
		}
		$data = array(
			'desc' => $desc[0],
			'instruments' => $instruments[0]
		);
		$this->load->view('header', $userdata);
		$this->load->view('editor', $data);
		$this->load->view('footer');
	}

	function edit()
	{
		$this->db->trans_begin();

		// Inserting repertoire data
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$composer = $this->input->post('composer');
		$arranger = $this->input->post('arranger');
		$format = $this->input->post('format');
		$year = $this->input->post('year');
		$file = $_FILES['userfile']['name'];
		if (!empty($file)) {
			$location = "/" . urlencode($arranger) . "/" . urlencode($title) . ".zip";

			$repertoire_data = array(
				'title' => $this->db->escape_str($title),
				'composer' => $this->db->escape_str($composer),
				'arranger' => $this->db->escape_str($arranger),
				'format' => $format,
				'year' => $year,
				'location' => $location,
				'timestamp' => date('Y-m-d H:i:s')
			);
		} else {
			$repertoire_data = array(
				'title' => $this->db->escape_str($title),
				'composer' => $this->db->escape_str($composer),
				'arranger' => $this->db->escape_str($arranger),
				'format' => $format,
				'year' => $year,
				'timestamp' => date('Y-m-d H:i:s')
			);
		}

		$this->Metamodel->update_repertoire($repertoire_data, $id);

		// Inserting instruments data
		$violin = $this->input->post('violin') == '1' ? 1 : 0;
		$viola = $this->input->post('viola') == '1' ? 1 : 0;
		$violoncello = $this->input->post('violoncello') == '1' ? 1 : 0;
		$contrabass = $this->input->post('contrabass') == '1' ? 1 : 0;

		$flute = $this->input->post('flute') == '1' ? 1 : 0;
		$clarinet = $this->input->post('clarinet') == '1' ? 1 : 0;
		$oboe = $this->input->post('oboe') == '1' ? 1 : 0;
		$bassoon = $this->input->post('bassoon') == '1' ? 1 : 0;

		$trumpet = $this->input->post('trumpet') == '1' ? 1 : 0;
		$trombone = $this->input->post('trombone') == '1' ? 1 : 0;
		$tuba = $this->input->post('tuba') == '1' ? 1 : 0;
		$horn = $this->input->post('horn') == '1' ? 1 : 0;
		$otherbrass = $this->input->post('otherbrass') == '1' ? 1 : 0;

		$otherpercussion = $this->input->post('otherpercussion') == '1' ? 1 : 0;
		$timpani = $this->input->post('timpani') == '1' ? 1 : 0;
		$piano = $this->input->post('piano') == '1' ? 1 : 0;
		$guitar = $this->input->post('guitar') == '1' ? 1 : 0;
		$choir = $this->input->post('choir') == '1' ? 1 : 0;

		$instruments_data = array(
			'violin' => $violin,
			'viola' => $viola,
			'violoncello' => $violoncello,
			'contrabass' => $contrabass,
			'flute' => $flute,
			'clarinet' => $clarinet,
			'oboe' => $oboe,
			'bassoon' => $bassoon,
			'trumpet' => $trumpet,
			'trombone' => $trombone,
			'tuba' => $tuba,
			'horn' => $horn,
			'otherbrass' => $otherbrass,
			'otherpercussion' => $otherpercussion,
			'timpani' => $timpani,
			'piano' => $piano,
			'guitar' => $guitar,
			'choir' => $choir,
			'timestamp' => date('Y-m-d H:i:s')
		);

		$this->Metamodel->update_instruments($instruments_data, $id);

		if ($violin + $viola + $violoncello + $contrabass + $flute + $clarinet +
			$oboe + $bassoon + $trumpet + $trombone + $tuba + $horn + $otherbrass + $otherpercussion +
			$timpani + $piano + $guitar + $choir == 0)
		{
			$this->db->trans_rollback();
			$error = array('error' => "No instruments selected");
			$this->load->view('header');
			$this->load->view('editor', $id);
			$this->load->view('footer');
		}
		else
		{
			// Inserting tags data
			$this->Metamodel->delete_tags($id);
			$raw_tags = $this->input->post('tags');
			$tags = $this->db->escape_str($raw_tags);

			$tags = explode(',', $tags);
	        for ($it = 0; $it < sizeof($tags); $it++)
	        {
	            $tag = preg_replace('/^[ \t]+|[ \t]+$/', '', $tags[$it]);
	            if ($tag != "")
	            {
	            	$this->Metamodel->insert_tags(array('id'=>$id,'tag'=>$tag,'timestamp'=>date('Y-m-d H:i:s')));
	            }
	        }

	        if (!empty($file))
				$this->do_upload($location);

	        if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				redirect('/uploader/error','refresh');
			}
			else
			{
				$this->db->trans_commit();
				redirect('/uploader/success','refresh');
			}
		}
	}

	public function success()
	{
		$user = $this->authex->get_userdata();
		$data['email'] = $user->email;
		$data['level'] = $user->level;
		$this->load->view('header', $data);
		$this->load->view('upload_success');
		$this->load->view('footer');
	}

	public function error()
	{
		$user = $this->authex->get_userdata();
		$data['email'] = $user->email;
		$data['level'] = $user->level;
		$this->load->view('header', $data);
		$this->load->view('upload_error');
		$this->load->view('footer');
	}
}

/* End of file uploader.php */
/* Location: ./application/controllers/uploader.php */