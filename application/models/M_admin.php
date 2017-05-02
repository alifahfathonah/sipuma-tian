<?php

class M_admin extends CI_Model {
	var $table = 'user';
	var $table2 = 'link_external';

	function __construct() {
		parent::__construct();
	}

	function user(){
		return $this->db->query("select * from user");
	}

/*
|-----------------------------------------------------------------------------------------------------------------
| BEGIN MODEL CRUD USER
|-----------------------------------------------------------------------------------------------------------------
*/
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

/*
|-----------------------------------------------------------------------------------------------------------------
| END MODEL CRUD USER
|-----------------------------------------------------------------------------------------------------------------
*/

/*
|-----------------------------------------------------------------------------------------------------------------
| BEGIN MODEL CRUD ARTIKEL
|-----------------------------------------------------------------------------------------------------------------
*/
public function get_all_artikel() {
		$this->db->from('artikel');
				 //->join('role','user.id_role = role.id_role');
		$query=$this->db->get();
		return $query->result();
	}

	function insertdata($tabel, $data){
		return $this->db->insert($tabel,$data);
	}

	function getArtikel($where= ''){
		return $this->db->query("select * from artikel $where;");
	}

	function updatedata($tabel,$data,$where){
		return $this->db->update($tabel,$data,$where);
	}

	function deldata($tabel,$where){
		return $this->db->delete($tabel,$where);
	}

	public function get_by_id_artikel($id) {
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function addartikel_db($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function updartikel_db($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delartikel_db($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	function selectdata_artikel($where = ''){
		return $this->db->query("select * from $where;");
	}

/*
|-----------------------------------------------------------------------------------------------------------------
| END MODEL CRUD ARTIKEL
|-----------------------------------------------------------------------------------------------------------------
*/

public function get_about() {
	$this->db->from('about');
	$query=$this->db->get();
	return $query->result();
}

function getAbout($where= ''){
	return $this->db->query("select * from about $where;");
}

/*
|-----------------------------------------------------------------------------------------------------------------
| BEGIN MODEL CRUD USER
|-----------------------------------------------------------------------------------------------------------------
*/
	public function get_all_link() {
		$this->db->from('link_external');
		$query=$this->db->get();
		return $query->result();
	}

	public function get_by_idlink($id) {
		$this->db->from($this->table2);
		$this->db->where('id_link',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function addlink_db($data) {
		$this->db->insert($this->table2, $data);
		return $this->db->insert_id();
	}

	public function updlink_db($where, $data) {
		$this->db->update($this->table2, $data, $where);
		return $this->db->affected_rows();
	}

	public function dellink_db($id) {
		$this->db->where('id_link', $id);
		$this->db->delete($this->table2);
	}

/*
|-----------------------------------------------------------------------------------------------------------------
| END MODEL CRUD USER
|-----------------------------------------------------------------------------------------------------------------
*/

}
