<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Metamodel extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function search($query, $meta)
	{
		if ($meta == "Tags") {
			$result = $this->search_by_tags($query);
			$r = array();
			foreach ($result as $key => $value) {
				$q = $this->db->get_where('repertoire',array('id'=>$value['id']));
				array_push($r, $q->result());
			}
			return $r[0];
		} else {
			$this->db->like($meta,$query);
			$q = $this->db->get('repertoire');
			return $q->result_array();
		}
	}

	function search_by_tags($tags)
	{
		if ($tags != '') {
			$this->db->select('id');
			$this->db->like('tag',$tags);
			$this->db->distinct('id');
			$q = $this->db->get('tags');
		} else {
			$this->db->select('id');
			$q = $this->db->get('repertoire');
		}
		return $q->result_array();
	}

	function get_all_repertoire()
	{
		$query = $this->db->get('repertoire');
		return $query->result_array();
	}

	function get_repertoire($id)
	{
		$query = $this->db->get_where('repertoire',array('id'=>$id));
		return $query->result_array();
	}

	function insert_repertoire($data)
	{
		$this->db->insert('repertoire',$data);
	}

	function update_repertoire($data,$id)
	{
		$this->db->update('repertoire',$data,array('id'=>$id));
	}

	function delete_repertoire($id)
	{
		$this->db->delete('repertoire',array('id'=>$id));
	}

	function get_instruments($id)
	{
		$query = $this->db->get_where('instruments',array('id'=>$id));
		return $query->result_array();
	}

	function insert_instruments($data)
	{
		$this->db->insert('instruments',$data);
	}

	function update_instruments($data,$id)
	{
		$this->db->update('instruments',$data,array('id'=>$id));
	}

	function delete_instruments($id)
	{
		$this->db->delete('instruments',array('id'=>$id));
	}

	function get_all_tags()
	{
		$query = $this->db->get('tags');
		return $query->result_array();
	}

	function get_tags($id)
	{
		$query = $this->db->get_where('tags',array('id'=>$id));
		return $query->result_array();
	}

	function insert_tags($data)
	{
		$this->db->insert('tags',$data);
	}

	function delete_tags($id)
	{
		$this->db->delete('tags',array('id'=>$id));
	}
}