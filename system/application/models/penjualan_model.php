<?php
Class Penjualan_model extends Model{
	function Penjualan_model(){
		parent::Model();
	}
	
	function get_penjualan($jumlah="",$awal=""){
		if($jumlah!=""){
			if($awal!=""){
				$this->db->limit($jumlah,$awal);
			}else{
				$this->db->limit($jumlah);
			}
		}
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai','LEFT');
		$this->db->join('pelanggan','penjualan.KodePelanggan=pelanggan.KodePelanggan','LEFT');
		$this->db->order_by("Tanggal", "desc");
		$query = $this->db->get('penjualan');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function get_history_penjualan($KodePelanggan,$jumlah="",$awal=""){
		if($jumlah!=""){
			if($awal!=""){
				$this->db->limit($jumlah,$awal);
			}else{
				$this->db->limit($jumlah);
			}
		}
		$this->db->where('KodePelanggan',$KodePelanggan);
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai','LEFT');
		$this->db->order_by('Tanggal','desc');
		$query = $this->db->get('penjualan');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function cek_history_penjualan($KodePelanggan){
		$this->db->where('KodePelanggan',$KodePelanggan);
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai','LEFT');
		$query = $this->db->get('penjualan');
		$query->result();
	}
	
	function get_limit_history_penjualan($limit){ //mengambil data produk secara random dengan batas maksimal yang ditentukan pd controller
		$this->db->order_by('Tanggal','asc');
		$this->db->limit($limit);
		$query = $this->db->get('penjualan');
		if ($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function get_total_history($KodePelanggan){
		$this->db->where('KodePelanggan',$KodePelanggan);
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai','LEFT');
		$query = $this->db->get('penjualan');	
		return $query->num_rows();
	}
	
	function get_detail_penjualan($KodePenjualan){
		$this->db->where('KodePenjualan',$KodePenjualan); 
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai',"left");
		$this->db->join('pelanggan','penjualan.KodePelanggan=pelanggan.KodePelanggan',"left");
		$query = $this->db->get('penjualan');
		return $query->result();
	}
	
	function insert_penjualan($data_penjualan){
		$this->db->insert('penjualan',$data_penjualan);
	}
	
	function update_penjualan($data,$KodePenjualan){
		$this->db->where('KodePenjualan',$KodePenjualan);
		$this->db->update('penjualan',$data);
	}
	
	
	function delete_penjualan($KodePenjualan){
		$this->db->where('KodePenjualan',$KodePenjualan);
		$this->db->delete('penjualan');
	}
	
	function add_to_cart($KodeProduk,$Berat){
		$query = $this->db->where('KodeProduk',$KodeProduk);
		$query = $this->db->get('produk');
		$data = array(
               'KodeProduk'      => $KodeProduk,
               'Berat'    		 => $Berat,
               );
		$this->cart->insert($data); 
	}
	
	function get_max_id(){
		$this->db->select_max('KodePenjualan');
		$query = $this->db->get('penjualan');
		$result= $query->row();
		return $result->KodePenjualan;
	}
	
	function get_penjualan_status($Status){
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai',"LEFT");
		$this->db->where('Status',$Status);
		$this->db->order_by('Tanggal','desc');
		$query = $this->db->get('penjualan');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function search_penjualan($NamaField,$keyword){
		$this->db->like($NamaField,$keyword);
		$this->db->join("pegawai","penjualan.KodePegawai=pegawai.KodePegawai");
		$this->db->join('pelanggan','penjualan.KodePelanggan=pelanggan.KodePelanggan','LEFT');
		$query = $this->db->get('penjualan');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function count_row_penjualan($status){
		$this->db->where('status', $status);
		$this->db->from('penjualan');
		return $this->db->count_all_results();
		
	}
	
	function edit_detail_penjualan($data,$KodeProduk){
		$this->db->where('KodeProduk',$KodeProduk);
		$this->db->update('detail_penjualan',$data);
	}
	
	function get_combobox_produk($KodePenjualan){
		$sql="SELECT * FROM produk WHERE KodeProduk NOT IN (SELECT KodeProduk FROM detail_penjualan WHERE KodePenjualan='$KodePenjualan')";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	function update_total_penjualan($KodePenjualan){
			$sql = "UPDATE penjualan set TotalHarga=(select sum(BeratJual*HargaJual) as total from detail_penjualan where KodePenjualan='{$KodePenjualan}' group by KodePenjualan)
					WHERE KodePenjualan='{$KodePenjualan}'";
			$this->db->query($sql);
	}
	
	function get_status_penjualan($KodePenjualan){
		$this->db->where('KodePenjualan',$KodePenjualan); 
		$this->db->join('pegawai','penjualan.KodePegawai=pegawai.KodePegawai',"left");
		$this->db->select('Status');
		$query = $this->db->get('penjualan');
		return $query->result();
	}
	
	function get_total_penjualan(){
		$query = $this->db->get('penjualan');
		return $query->num_rows();
	}
}