<?php
Class Produk_model extends Model{
	function Produk_model(){
		parent::Model();
	}
	
	function get_produk($jumlah="",$awal=""){ //mengambil data dari tabel produk
		if($jumlah!=""){
			if($awal!=""){
				$this->db->limit($jumlah,$awal);
			}else{
				$this->db->limit($jumlah);
			}
		}
		$this->db->group_by("NamaProduk");
		$this->db->order_by('NamaProduk','asc');
		$query = $this->db->get('produk');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function insert_produk($data){ //memasukkan data dari tabel produk
		$this->db->insert('produk',$data);
	}
	
	function update_produk($data,$KodeProduk){ //mengubah data dari tabel produk
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->update('produk',$data);
	}
	
	function delete_produk($KodeProduk){ //menghapus data dari tabel produk
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->delete('produk');
	}
	
	function get_limit_produk($limit){ //mengambil data produk secara random dengan batas maksimal yang ditentukan pd controller
		$this->db->group_by("NamaProduk");
		$this->db->order_by('KodeProduk','random');
		$this->db->limit($limit);
		$query = $this->db->get('produk');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function get_detail_produk($KodeProduk){ //mengambil detail data dari tabel produk
		$this->db->where('KodeProduk',$KodeProduk); 
		$query = $this->db->get('produk');
		return $query->result();
	}
	
	function search_produk($NamaProduk){
		$this->db->like('NamaProduk',$NamaProduk); 
		$this->db->group_by("NamaProduk");
		$query = $this->db->get('produk');
		return $query->result();
	}	

	function get_total_produk(){
		$this->db->group_by("NamaProduk");
		$query = $this->db->get('produk');
		return $query->num_rows();
	}
	
	function total_search_produk($NamaProduk,$jumlah="",$awal=""){
		$this->db->like('NamaProduk',$NamaProduk);
		$this->db->group_by("NamaProduk");
		if($jumlah!=""){
			if($awal!=""){
				$this->db->limit($jumlah,$awal);
			}else{
				$this->db->limit($jumlah);
			}
		}
		return $this->db->count_all_results('produk');
	}
	
	function get_daftar_berat($KodeProduk){
		$kode = substr($KodeProduk,0,2);
		$this->db->like('KodeProduk',$kode,'after');
		$query = $this->db->get("produk");
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function get_daftar_produk(){
		$this->db->order_by('NamaProduk','asc');
		$query = $this->db->get('produk');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function filter($NamaField,$Value){
		$this->db->like($NamaField,$Value); 
		$this->db->order_by('NamaProduk','asc');
		$query = $this->db->get('produk');
		return $query->result();
	}
	
}