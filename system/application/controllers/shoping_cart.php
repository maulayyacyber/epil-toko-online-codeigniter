<?php
Class Shoping_cart extends Controller{
	function Shoping_cart(){
		parent::Controller();
		$this->load->model(array('detail_penjualan_model','penjualan_model','pelanggan_model','produk_model','pegawai_model'));
		$this->load->library('cart');
	}
	
	function index(){
		//if(isset($_SESSION['username']) && $_SESSION['level']=='pelanggan'){
			$data['content'] = $this->load->view('shoping_cart_view',"",TRUE);
			$this->load->view("template_web/template",$data);
		/* }else{
			$this->load->view('gagal_add_cart');
		} */
	}
	
	function add($KodeProduk){
			//
			$result = $this->produk_model->get_detail_produk($KodeProduk);
			$subdata['result_detail_produk'] = $result;
			//ambil pilihan berat dari produk
			$result_berat = $this->produk_model->get_daftar_berat($KodeProduk);
			$subdata['result_daftar_berat'] = $result_berat;
			$this->load->view('add_cart_view',$subdata);
		
	}
	
	function add_cart(){
		$kode_produk = $this->input->post("kode_produk");
		$size = $this->input->post("berat");
		$harga = $this->input->post("harga");
		$nama = $this->input->post("nama");
		$berat = $this->input->post("berat_pembelian");

		$data = array(
			'id' => $kode_produk,
			'size'=> $size,
			'qty' => $berat,
			'price' => $harga,
			'name' => $nama,
		);
		$this->cart->insert($data);
		//tampilkan sukses tambah data
		$this->load->view("sukses_add_cart");
	}
	
	function edit_cart(){
		$total = $this->cart->total_items();
		if($total>0){
			for ($i=1;$i<=$total;$i++){
				$row=$this->input->post($i);
				$data[]=array(
					'rowid' => $row['rowid'],
					'qty' => $row['qty'],
				);
			}
			$this->cart->update($data);
		}else{
			redirect("shoping_cart");
		}
	}
	
	function aksi_submit(){
		$aksi = $this->input->post("submit");
		if($aksi==""){
			$this->edit_cart();
			$this->index();
		}else{
			$this->edit_cart();
			$this->check_out();
		}
	}
	
	function check_out(){
		if(isset($_SESSION['username']) && $_SESSION['level']=='pelanggan'){
			$max_id=$this->penjualan_model->get_max_id();
			$max_id++;
			$total_harga=0;
			$this->edit_cart();
			$total = $this->cart->total_items();
			foreach($this->cart->contents() as $items){
				$data=array(
				'KodePenjualan' => $max_id,
				'KodeProduk' => $items['id'],
	            'BeratJual' => $items['qty'],
	            'HargaJual' => $items['price'],
				);
				$total_harga=$total_harga+($items['qty']*$items['price']);
				$this->detail_penjualan_model->insert_detail_penjualan($data);
			}
			
			$data_penjualan=array(
				'KodePenjualan'=>$max_id,
				'KodePelanggan'=>$_SESSION['kode_user'],
				'Tanggal'=>date('Y-m-d'),
				'TotalHarga'=>$total_harga,
				'KodePegawai'=>'',
				'Status'=>'Pesan'
			);
			$this->penjualan_model->insert_penjualan($data_penjualan);
			$result = $this->penjualan_model->get_detail_penjualan($max_id);
			$subdata['result_detail_penjualan'] = $result;
	 		$data['content'] = $this->load->view('check_out_view',$subdata,TRUE);
			$this->cart->destroy();
			$this->load->view("template_web/template",$data);
		}else{
			$this->load->view('gagal_add_cart');
		}
	}
	
	function delete_item($rowid){
		$data=array('rowid'=>$rowid,'qty'=>0);
		$this->cart->update($data);
		redirect("shoping_cart",'refresh');
	}
	
	function get_shoping_cart_mini(){
		$this->load->view("mini_shoping_cart_view");
	}
		
}