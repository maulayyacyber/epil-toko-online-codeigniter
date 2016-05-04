<?php
Class Pegawai_model extends Model{
	function Pegawai_model(){
		parent::Model();
	}
	
	function get_pegawai($kode_user=''){
		if($kode_user!=''){
		$this->db->where('KodePegawai',$kode_user);
		}
		$query = $this->db->get('pegawai');
		if($query->num_rows()>0){
		return $query->result();
		}else{
		return false;
		};
	}
	
	function get_detail_pegawai($KodePegawai){
		$this->db->where('KodePegawai',$KodePegawai); 
		$query = $this->db->get('pegawai');
		return $query->result();
	}
	
	function insert_pegawai($data){
		$this->db->insert('pegawai',$data);
	}
	
	function update_pegawai($data,$KodePegawai){
		$this->db->where('KodePegawai',$KodePegawai);
		$this->db->update('pegawai',$data);
	}
	
	function delete_pegawai($KodePegawai){
		$this->db->where('KodePegawai',$KodePegawai);
		$this->db->delete('pegawai');
	}
	
	function login_pegawai($Username,$Password){
		$Password = md5($Password);
		$this->db->where('Username',$Username);		
		$this->db->where('Password',$Password);
		$query = $this->db->get('pegawai');
		if ($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function get_daftar_pegawai(){
		$this->db->order_by('NamaPegawai','asc');
		$query = $this->db->get('pegawai');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function filter($NamaField,$Value){
		$this->db->like($NamaField,$Value); 
		$this->db->order_by('NamaPegawai','asc');
		$query = $this->db->get('pegawai');
		return $query->result();
	}
	
	function get_daftar_kode_pegawai(){
		$this->db->select('KodePegawai');
		$query = $this->db->get('pegawai');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function update_data_pegawai($data){
		$this->db->where('KodePegawai', $_SESSION['kode_user']);
		$this->db->update('pegawai', $data); 
	}
	
	function check_username($Username){
		$this->db->where('Username',$Username);	
		$query = $this->db->get('pegawai');
		if ($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
}