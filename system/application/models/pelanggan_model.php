<?php
Class Pelanggan_model extends Model{
	function Pelanggan_model(){
		parent::Model();
	}
	
	function get_pelanggan($kode_user=''){
		if($kode_user!=''){
		$this->db->where('KodePelanggan',$kode_user);
		}
		$query = $this->db->get('pelanggan');
		if($query->num_rows()>0){
		return $query->result();
		}else{
		return false;
		};
	}
	
	function insert_pelanggan($data){
		$this->db->insert('pelanggan',$data);
	}
	
	function update_pelanggan($data,$KodePelanggan){
		$this->db->where('KodePelanggan',$KodePelanggan);
		$this->db->update('pelanggan',$data);
	}
	
	function delete_pelanggan($KodePelanggan){
		$this->db->where('KodePelanggan',$KodePelanggan);
		$this->db->delete('pelanggan');
	}
	
	function get_detail_pelanggan($KodePelanggan){ //mengambil detail data dari tabel produk
		$this->db->where('KodePelanggan',$KodePelanggan); 
		$query = $this->db->get('pelanggan');
		return $query->result();
	}	
	
	function login_pelanggan($Username,$Password){
		$Password = md5($Password);
		$this->db->where('Username',$Username);		
		$this->db->where('Password',$Password);
		$query = $this->db->get('pelanggan');
		if ($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function update_data_pelanggan($data){
		$this->db->where('KodePelanggan', $_SESSION['kode_user']);
		$this->db->update('pelanggan', $data); 
	}
		
	function check_username($Username){
		$this->db->where('Username',$Username);	
		$query = $this->db->get('pelanggan');
		if ($query->num_rows()>0){
			return false;
		}else{
			return true;
		}
	}
	
	function get_daftar_pelanggan(){
		$this->db->order_by('NamaPelanggan','asc');
		$query = $this->db->get('pelanggan');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function filter($NamaField,$Value){
		$this->db->like($NamaField,$Value); 
		$this->db->order_by('NamaPelanggan','asc');
		$query = $this->db->get('pelanggan');
		return $query->result();
	}
	
	function get_daftar_kode_pelanggan(){
		$this->db->select('KodePelanggan');
		$query = $this->db->get('pelanggan');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
}