<?php
Class Pemasok_model extends Model{
	function Pemasok_model(){
		parent::Model();
	}
	
	function get_pemasok(){
		$this->db->order_by('NamaPemasok','asc');
		$query = $this->db->get('pemasok');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function get_detail_pemasok($KodePemasok){
		$this->db->where('KodePemasok',$KodePemasok); 
		$query = $this->db->get('pemasok');
		return $query->result();
	}
	
	function insert_pemasok($data){
		$this->db->insert('pemasok',$data);
	}
	
	function update_pemasok($data,$KodePemasok){
		$this->db->where('KodePemasok',$KodePemasok);
		$this->db->update('pemasok',$data);
	}
	
	function delete_pemasok($KodePemasok){
		$this->db->where('KodePemasok',$KodePemasok);
		$this->db->delete('pemasok');
	}
	
	function get_daftar_pemasok(){
		$this->db->order_by('NamaPemasok','asc');
		$query = $this->db->get('pemasok');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function filter($NamaField,$Value){
		$this->db->like($NamaField,$Value); 
		$this->db->order_by('NamaPemasok','asc');
		$query = $this->db->get('pemasok');
		return $query->result();
	}
	
	function get_daftar_kode_pemasok(){
		$this->db->select('KodePemasok');
		$query = $this->db->get('pemasok');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}