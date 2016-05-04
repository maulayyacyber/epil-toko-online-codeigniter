<?php
Class Summary_produk_model extends Model{
	function Summary_produk_model(){
		parent::Model();
	}
	
	/*Method untuk mengambil data laporan bulanan penjualan dan pembelian*/
	function get_summary_produk(){
		$sql = 'SELECT dp.KodeProduk,p.NamaProduk,p.Kualitas,p.Berat,p.HargaKiloan, COUNT(dp.KodeProduk) AS JumlahJual FROM detail_penjualan dp
				JOIN produk p on dp.KodeProduk=p.KodeProduk
				GROUP BY dp.KodeProduk ORDER BY JumlahJual DESC';
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
}