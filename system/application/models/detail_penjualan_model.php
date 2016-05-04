<?php
Class Detail_penjualan_model extends Model{
	function Detail_penjualan_model(){
		parent::Model();
	}
	
	function detail_penjualan($KodePenjualan,$KodeProduk=''){
		$this->db->where('KodePenjualan',$KodePenjualan);
		if($KodeProduk!=""){
			$this->db->where('detail_penjualan.KodeProduk',$KodeProduk);
		}
		$this->db->select('*');
		$this->db->from('detail_penjualan');
		$this->db->join('produk','detail_penjualan.KodeProduk=produk.KodeProduk','LEFT');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function insert_detail_penjualan($data){
		$this->db->insert('detail_penjualan',$data);
	}
	
	function update_detail_penjualan($data,$KodePenjualan,$KodeProduk){
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->where('KodePenjualan',$KodePenjualan);
		$this->db->update('detail_penjualan',$data);
	}
	
	function delete_detail_penjualan($KodePenjualan,$KodeProduk=""){
		if($KodeProduk!=""){
			$this->db->where('KodeProduk',$KodeProduk);
		}
		$this->db->where('KodePenjualan',$KodePenjualan);
		$this->db->delete('detail_penjualan');
	}
		
	function show_edit_detail_penjualan($KodePenjualan,$KodeProduk){
		$this->db->where('KodePenjualan',$KodePenjualan);
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->select('*');
		$this->db->from('detail_penjualan');
		$query = $this->db->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}	
		
	function best_seller(){
		$sql = 'SELECT dp.KodeProduk,p.NamaProduk, COUNT(dp.KodeProduk) AS JumlahJual FROM detail_penjualan dp
				JOIN produk p on dp.KodeProduk=p.KodeProduk
				GROUP BY dp.KodeProduk ORDER BY JumlahJual DESC LIMIT 5';
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
}