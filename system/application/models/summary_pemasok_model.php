<?php
Class Summary_pemasok_model extends Model{
	function Summary_pemasok_model(){
		parent::Model();
	}
	
	/*Method untuk mengambil data laporan bulanan penjualan dan pembelian*/
	function get_summary_pemasok(){
		$sql = 'SELECT pb.KodePemasok,p.NamaPemasok,p.Kredibilitas, COUNT(pb.KodePemasok) AS JumlahBeli FROM pembelian pb
				JOIN pemasok p on pb.KodePemasok=p.KodePemasok
				GROUP BY pb.KodePemasok ORDER BY JumlahBeli DESC';
		$query = $this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
}