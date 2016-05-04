<?php
Class Penjualan extends Controller{
	function Penjualan(){
		parent::Controller();
		if(isset($_SESSION["username"]) && $_SESSION['level']=='Pegawai'){
			$this->load->model(array('penjualan_model','penjualan_model','detail_penjualan_model','produk_model','pelanggan_model','pegawai_model'));
		}else{
			redirect('home');
		}
	}
	
	function detail_penjualan($KodePenjualan){
		//menampilkan detail penjualan
		$result = $this->penjualan_model->detail_penjualan($KodePenjualan);
		$subdata['result_isi_detail_penjualan'] = $result;
		$data['content'] = $this->load->view('admin/penjualan_edit_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);	
	}
	
	function index($page=0){
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url("admin/penjualan/index/");
		$config['total_rows'] = $this->penjualan_model->get_total_penjualan();
		$row_per_page = 15;
		$config['per_page'] = $row_per_page;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		$data['judul'] = "Data Penjualan";
		//session data pegawai
		//$_SESSION['username'] = $Username;
		//$_SESSION['level'] = 'Pegawai';
		//$_SESSION['kode_user'] = $result_admin[0]->KodePegawai;
		//menampilkan daftar produk
		$result = $this->penjualan_model->get_penjualan($row_per_page,$page);
		$subdata['result_penjualan'] = $result;
		$data['content'] = $this->load->view('admin/penjualan_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function search_penjualan($page=0){
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url("admin/penjualan/index/");
		$config['total_rows'] = $this->penjualan_model->get_total_penjualan();
		$row_per_page = 15;
		$config['per_page'] = $row_per_page;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		//judul
		$data['judul'] = "Data Penjualan";
		//input hasil masukan
		$NamaField = $this->input->post('NamaField');
		$keyword = $this->input->post('keyword');
		//kondisi
		if($keyword!=""){
			$result = $this->penjualan_model->search_penjualan($NamaField,$keyword);
			$subdata['result_penjualan'] = $result;
			if($subdata==""){
			$_SESSION['msg']="Data tidak ditemukan.";
			$data['content'] = $this->load->view('admin/penjualan_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
			}else{
			$data['content'] = $this->load->view('admin/penjualan_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
			}
		}
		else{
			redirect('admin/penjualan','refresh');
		}
	}
	
	function add_penjualan(){
		$data['judul'] = "Input Data Penjualan";
		//menampilkan add pemasok
		$this->form_validation->set_rules('KodePelanggan','Kode Pelanggan','required');
		$this->form_validation->set_rules('Tanggal','Tanggal','required');
		$this->form_validation->set_rules('KodePegawai','Kode Pegawai','required');
		$this->form_validation->set_rules('Status', 'Status', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			$data['content'] = $this->load->view('admin/penjualan_add_view','',TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
			       'KodePenjualan' => $this->input->post('KodePenjualan'),
				   'KodePelanggan' => $this->input->post('KodePelanggan'),
				   'Tanggal' => $this->input->post('Tanggal'),
				   'KodePegawai' => $this->input->post('KodePegawai'),
				   'Status' => $this->input->post('Status')
					);
			$this->penjualan_model->insert_penjualan($data);
			redirect("admin/penjualan","refresh");
			}
		}
	
	function edit_penjualan($KodePenjualan=''){
		$data['judul'] = "Proses Data Penjualan";
		$this->form_validation->set_rules('Status','status','required');
		if($this->form_validation->run()==false){
		//menampilkan edit pemasok
		$result1 = $this->penjualan_model->get_detail_penjualan($KodePenjualan);
		$subdata['result_detail_penjualan'] = $result1;
		$result2 = $this->detail_penjualan_model->detail_penjualan($KodePenjualan);
		$subdata['result_isi_detail_penjualan'] = $result2;
		$result_daftar_produk = $this->penjualan_model->get_combobox_produk($KodePenjualan);
		$subdata['result_daftar_produk'] = $result_daftar_produk;
		$result_status = $this->penjualan_model->get_status_penjualan($KodePenjualan);
		$subdata['result_status'] = $result_status;
		$data['content'] = $this->load->view('admin/penjualan_edit_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
		//mengambil data pemasok
		}else{
			$data = array(
				   'Status' => $this->input->post('Status'),
				   'KodePegawai' => $_SESSION['kode_user']
					);					
			$this->penjualan_model->update_penjualan($data,$KodePenjualan);
			$_SESSION['msg']="Pengubahan data penjualan telah berhasil dilakukan.";
			redirect("admin/penjualan","refresh");
		}
	}	
	
	
	function delete_penjualan($KodePenjualan){
		$this->penjualan_model->delete_penjualan($KodePenjualan);
		$this->detail_penjualan_model->delete_detail_penjualan($KodePenjualan);
		$_SESSION['msg']="Penghapusan data penjualan telah berhasil dilakukan.";
		redirect('admin/penjualan','refresh');
	}
	
	function delete_detail_penjualan($KodePenjualan,$KodeProduk){
		$this->detail_penjualan_model->delete_detail_penjualan(array($KodePenjualan,$KodeProduk));
		$this->penjualan_model->update_total_penjualan($KodePenjualan);
		$_SESSION['msg']="Data produk telah berhasil dihapus.";
		redirect("admin/penjualan/edit_penjualan/".$KodePenjualan);
	}
	
	function penjualan_pesan(){
		$data['judul'] = "Data Transaksi Pesan";
		$Status = 'Pesan';
		$result = $this->penjualan_model->get_penjualan_status($Status);
		$subdata['result_penjualan_status'] = $result;
		$data['content'] = $this->load->view('admin/penjualan_status_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
		
	}
	
	function penjualan_beli(){
		$data['judul'] = "Data Transaksi Beli";
		$Status = 'Beli';
		$result = $this->penjualan_model->get_penjualan_status($Status);
		$subdata['result_penjualan_status'] = $result;
		$data['content'] = $this->load->view('admin/penjualan_status_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function penjualan_cancel(){
		$data['judul'] = "Data Transaksi Batal";
		$Status = 'Batal';
		$result = $this->penjualan_model->get_penjualan_status($Status);
		$subdata['result_penjualan_status'] = $result;
		$data['content'] = $this->load->view('admin/penjualan_status_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);		
	}
	
	function search_penjualan_status(){
		//input hasil masukan
		$NamaField = $this->input->post('NamaField');
		$keyword = $this->input->post('keyword');
		//kondisi
		if($keyword!=""){
			$result = $this->penjualan_model->search_penjualan($NamaField,$keyword);
			$subdata['result_penjualan_status'] = $result;
			$data['content'] = $this->load->view('admin/penjualan_status_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
		}
		else{
			redirect('admin/penjualan','refresh');
		}
	}
	
	function edit_produk_detail_penjualan(){
		$KodePenjualan = $this->input->post('KodePenjualan');
		$KodeProduk = $this->input->post('KodeProduk');
		$data = array(
			   'BeratJual' => $this->input->post('BeratJual'),
			   'HargaJual' => $this->input->post('HargaJual')
				);
		$this->detail_penjualan_model->update_detail_penjualan($data,$KodePenjualan,$KodeProduk);
		$this->penjualan_model->update_total_penjualan($KodePenjualan);
		$_SESSION['msg']="Data produk telah berhasil diedit.";
		redirect("admin/penjualan/edit_penjualan/".$KodePenjualan,"refresh");
	}
	
	function respon_edit_detail_penjualan(){
		$KodePenjualan 	= $this->input->post('KodePenjualan');
		$KodeProduk		= $this->input->post('KodeProduk');
		$result = $this->detail_penjualan_model->detail_penjualan($KodePenjualan,$KodeProduk);
		$subdata['result_produk_detail_penjualan'] = $result;	
		$this->load->view('admin/penjualan_edit_produk_view',$subdata);
	}
	
	function tambah_produk_detail_penjualan(){
		$this->form_validation->set_rules('BeratJual','Berat Pembelian','required');
		$this->form_validation->set_rules('HargaJual','Harga Jual','required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==true){
			$data = array(
			       'KodePenjualan' => $this->input->post('KodePenjualan'),
			       'KodeProduk' => $this->input->post('daftar_kode_produk'),
				   'BeratJual' => $this->input->post('BeratJual'),
				   'HargaJual' => $this->input->post('HargaJual')
					);
			$this->detail_penjualan_model->insert_detail_penjualan($data);
			$this->penjualan_model->update_total_penjualan($this->input->post('KodePenjualan'));
		}
		$_SESSION['msg']="Data produk telah berhasil ditambah.";
		redirect("admin/penjualan/edit_penjualan/".$this->input->post('KodePenjualan'),"refresh");
	}
	
	function cetak_penjualan(){
		//mencetak data pembelian
		$result = $this->penjualan_model->get_penjualan();
		$subdata['result_penjualan'] = $result;
		$this->load->view('admin/cetak_penjualan_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
	

}