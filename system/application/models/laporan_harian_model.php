<?php
Class Laporan_harian_model extends Model{
	function Laporan_harian_model(){
		parent::Model();
	}
	
	/*Method untuk mengambil data laporan harian penjualan dan pembelian*/
	function get_laporan_harian($bulan,$tahun){
		//buat array untuk penyimpanan data penjualan dan pembelian selama 1 bulan
		for($i=1;$i<=31;$i++){
			$temp[$i]['penjualan'] = 0;
			$temp[$i]['pembelian'] = 0;
		}
		//query untuk penjualan
		$sql_penjualan = "SELECT SUM(TotalHarga) as total,day(Tanggal) as tgl
						  FROM penjualan 
						  WHERE month(Tanggal)='$bulan' and year(Tanggal)='$tahun' and status='Beli'
						  GROUP BY Tanggal";
		$query_penjualan 	= $this->db->query($sql_penjualan);
		$result_penjualan 	= $query_penjualan->result();
		foreach($result_penjualan as $row){
			$temp[$row->tgl]['penjualan'] = $row->total;
		}
		
		//query untuk pembelian
		$sql_pembelian = "SELECT SUM(Total) as total,day(Tanggal) as tgl
						  FROM pembelian 
						  WHERE month(Tanggal)='$bulan' and year(Tanggal)='$tahun' 
						  GROUP BY Tanggal";
		$query_pembelian 	= $this->db->query($sql_pembelian);
		$result_pembelian 	= $query_pembelian->result();
		foreach($result_pembelian as $row){
			$temp[$row->tgl]['pembelian'] = $row->total;
		}
		return $temp;
	}
}