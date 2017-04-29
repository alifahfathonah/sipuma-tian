<?php

class M_admin extends CI_Model {
	var $table = 'user';
	
	function __construct() {
		parent::__construct();
	}
	
	public function get_all_user() {
		$this->db->from('user')
				 ->join('role','user.id_role = role.id_role');
		$query=$this->db->get();
		return $query->result();
	}

	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function adduser_db($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function upduser_db($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function deluser_db($id) {
		$this->db->where('id_user', $id);
		$this->db->delete($this->table);
	}

	function selectdata($where = ''){
		return $this->db->query("select * from $where;");
	}

}