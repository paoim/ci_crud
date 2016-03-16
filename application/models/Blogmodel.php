<?php

class Blogmodel extends CI_Model {
	
	function get() {
		$result = NULL;
		$this->db->where('id', $this->uri->segment(3));
		$query = $this->db->get('blog');
		foreach ($query->result() as $blog) {
			$result = $blog;
		}
		return $result;
	}
	
	function getAll() {
		$query = $this->db->get('blog');
		return $query->result();
	}
	
	function addRecode($data) {
		$this->db->insert('blog', $data);
		return ;
	}
	
	function updateRecode($data) {
		//$data['updateDate'] = date("m/d/Y h:i:sa");
		//echo "<pre>"; print_r($data['updateDate']); echo "</pre>";
		
		$this->db->where('id', $this->uri->segment(3));
		$this->db->set('updateDate', 'NOW()', FALSE);
		$this->db->update('blog', $data);
	}
	
	function deleteRecord() {
		$this->db->where('id', $this->uri->segment(3));
		$this->db->delete('blog');
	}
}
