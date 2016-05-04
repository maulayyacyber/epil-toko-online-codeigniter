<?php
Class Detail_pembelian_model extends Model{
	function Detail_pembelian_model(){
		parent::Model();
	}
	
	function get_detail_pembelian($KodePembelian){
		$query = $this->db->get('detail_pembelian');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function insert_detail_pembelian($data){
		$this->db->insert('detail_pembelian',$data);
	}
	
	function update_detail_pembelian($data,$KodePembelian,$KodeProduk){
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->where('KodePembelian',$KodePembelian);
		$this->db->update('detail_pembelian',$data);
	}
	
	function delete_detail_pembelian($where){
		$this->db->delete('detail_pembelian',$where);
	}
	
	function detail_pembelian($KodePembelian,$KodeProduk=''){
		$this->db->where('KodePembelian',$KodePembelian);
		if($KodeProduk!=""){
			$this->db->where('detail_pembelian.KodeProduk',$KodeProduk);
		}
		$this->db->select('*');
		$this->db->from('detail_pembelian');
		$this->db->join('produk','detail_pembelian.KodeProduk=produk.KodeProduk');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
		
	function show_edit_detail_pembelian($KodePembelian,$KodeProduk){
		$this->db->where('KodePembelian',$KodePembelian);
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->select('*');
		$this->db->from('detail_pembelian');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
}