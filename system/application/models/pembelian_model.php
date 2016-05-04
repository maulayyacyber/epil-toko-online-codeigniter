<?php
Class Pembelian_model extends Model{
	function Pembelian_model(){
		parent::Model();
	}
	
	function get_pembelian($jumlah="",$awal=""){
		//pagination
		if($jumlah!=""){
			if($awal!=""){
				$this->db->limit($jumlah,$awal);
			}else{
				$this->db->limit($jumlah);
			}
		}
		//ambil data dari database
		$this->db->join('pegawai','pembelian.KodePegawai=pegawai.KodePegawai','LEFT');
		$this->db->join('pemasok','pembelian.KodePemasok=pemasok.KodePemasok','LEFT');
		$this->db->order_by("Tanggal", "desc"); 
		$query = $this->db->get('pembelian');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function get_detail_pembelian($KodePembelian){
		$this->db->where('KodePembelian',$KodePembelian); 
		$this->db->join('pegawai','pembelian.KodePegawai=pegawai.KodePegawai','LEFT');
		$this->db->join('pemasok','pembelian.KodePemasok=pemasok.KodePemasok','LEFT');
		$query = $this->db->get('pembelian');
		return $query->result();
	}
	
	function insert_pembelian($data){
		$this->db->insert('pembelian',$data);
	}
	
	function update_pembelian($data,$KodePembelian){
		$this->db->where('KodePembelian',$KodePembelian);
		$this->db->update('pembelian',$data);
	}
	
	function delete_pembelian($KodePembelian){
		$this->db->where('KodePembelian',$KodePembelian);
		$this->db->delete('pembelian');
	}
	
	function search_pembelian($NamaField,$keyword){
		$this->db->like($NamaField,$keyword); 
		$this->db->join("pegawai","pembelian.KodePegawai=pegawai.KodePegawai","LEFT");
		$this->db->join('pemasok','pembelian.KodePemasok=pemasok.KodePemasok','LEFT');
		$query = $this->db->get('pembelian');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function get_last_kode_pembelian(){
		$this->db->select_max('KodePembelian');
		$query = $this->db->get('pembelian');
		$result_kode_pembelian= $query->row();
		return $result_kode_pembelian->KodePembelian;
	}
	
	function get_combobox_produk($KodePembelian){
		$sql="SELECT * FROM produk WHERE KodeProduk NOT IN (SELECT KodeProduk FROM detail_pembelian WHERE KodePembelian='$KodePembelian')";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function update_total_pembelian($KodePembelian){
		$sql = "UPDATE pembelian set Total=(select sum(BeratBeli*HargaBeli) as total from detail_pembelian where KodePembelian='{$KodePembelian}' group by KodePembelian)
					WHERE KodePembelian='{$KodePembelian}'";
		$this->db->query($sql);
	}
	
	function get_total_pembelian(){
		$query = $this->db->get('pembelian');
		return $query->num_rows();
	}
}                                      