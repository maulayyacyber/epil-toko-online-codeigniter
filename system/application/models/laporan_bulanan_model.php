<?php
Class Laporan_bulanan_model extends Model{
	function Laporan_bulanan_model(){
		parent::Model();
	}
	
	/*Method untuk mengambil data laporan bulanan penjualan dan pembelian*/
	function get_laporan_bulanan($tahun){
		//buat array untuk penyimpanan data penjualan dan pembelian selama 1 tahun
		for($i=1;$i<=12;$i++){
			$temp[$i]['penjualan'] = 0;
			$temp[$i]['pembelian'] = 0;
		}
		//query untuk penjualan
		$sql_penjualan = 	"SELECT SUM(TotalHarga) as total,month(Tanggal) as bln
							FROM penjualan
							WHERE year(Tanggal)='$tahun' and status='Beli'
							GROUP BY month(Tanggal)";
		$query_penjualan 	= $this->db->query($sql_penjualan);
		$result_penjualan 	= $query_penjualan->result();
		foreach($result_penjualan as $row){
			$temp[$row->bln]['penjualan'] = $row->total;
		}
		
		//query untuk pembelian
		$sql_pembelian = "SELECT SUM(Total) as total,month(Tanggal) as bln
						  FROM pembelian 
						  WHERE year(Tanggal)='$tahun' 
						  GROUP BY month(Tanggal)";
		$query_pembelian 	= $this->db->query($sql_pembelian);
		$result_pembelian 	= $query_pembelian->result();
		foreach($result_pembelian as $row){
			$temp[$row->bln]['pembelian'] = $row->total;
		}
		return $temp;
	}
}