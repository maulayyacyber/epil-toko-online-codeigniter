<?php
Class Pembelian extends Controller{
	function Pembelian(){
		parent::Controller();
		if(isset($_SESSION["username"]) && $_SESSION['level']=='Pegawai'){
			$this->load->model(array('pembelian_model','penjualan_model','detail_pembelian_model','pemasok_model','pegawai_model','produk_model'));
		}else{
			redirect('home');
		}
	}
	
	function detail_pembelian($KodePembelian){
		//menampilkan detail pembelian
		$result = $this->pembelian_model->get_detail_pembelian($KodePembelian);
		$subdata['result_isi_detail_pembelian'] = $result;
		$data['content'] = $this->load->view('admin/pembelian_add_detail_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);	
	}
	
	function index($page=0){
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url("admin/pembelian/index/");
		$config['total_rows'] = $this->pembelian_model->get_total_pembelian();
		$row_per_page = 15;
		$config['per_page'] = $row_per_page;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		//judul
		$data['judul'] = "Data Pembelian";
		//menampilkan daftar produk
		$result = $this->pembelian_model->get_pembelian($row_per_page,$page);
		$subdata['result_pembelian'] = $result;
		$data['content'] = $this->load->view('admin/pembelian_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function add_pembelian(){
		$data['judul'] = "Input Data Pembelian";
		//menampilkan add pemasok
		$this->form_validation->set_rules('KodePemasok','Kode Pemasok');
		$this->form_validation->set_rules('Tanggal','Tanggal','required');
		$this->form_validation->set_rules('KodePegawai','Kode Pegawai');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			$result_kode_pemasok = $this->pemasok_model->get_daftar_kode_pemasok();
			$subdata['result_daftar_kode_pemasok'] = $result_kode_pemasok;
			$result_kode_pegawai = $this->pegawai_model->get_daftar_kode_pegawai();
			$subdata['result_daftar_kode_pegawai'] = $result_kode_pegawai;
			$data['content'] = $this->load->view('admin/pembelian_add_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
				   'Kodepemasok' => $this->input->post('daftar_kode_pemasok'),
				   'Tanggal' => $this->input->post('Tanggal'),
				   'KodePegawai' => $_SESSION['kode_user']
					);
			$this->pembelian_model->insert_pembelian($data);
			$KodePembelian = $this->pembelian_model->get_last_kode_pembelian();
			$this->pembelian_model->update_total_pembelian($this->input->post('KodePembelian'));
			redirect("admin/pembelian/tambah_produk_detail_pembelian/".$KodePembelian,"refresh");
			}
		}
	
	function edit_pembelian($KodePembelian=''){
		$data['judul'] = "Edit Data Pembelian";
		//menampilkan edit pemasok
		$result_detail_pembelian = $this->pembelian_model->get_detail_pembelian($KodePembelian);
		$subdata['result_detail_pembelian'] = $result_detail_pembelian;
		$result_isi_detail_pembelian = $this->detail_pembelian_model->detail_pembelian($KodePembelian);
		$subdata['result_isi_detail_pembelian'] = $result_isi_detail_pembelian;
		$result_daftar_produk = $this->pembelian_model->get_combobox_produk($KodePembelian);
		$subdata['result_daftar_produk'] = $result_daftar_produk;
		
		$data['content'] = $this->load->view('admin/pembelian_edit_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
		//mengambil data pemasok
		/* $data = array(
			   'KodePemasok' => $this->input->post('KodePemasok'),
			   'Tanggal' => $this->input->post('Tanggal'),
			   'KodePegawai' => $this->input->post('KodePegawai')
				);
		$this->pembelian_model->update_pembelian($data,$KodePembelian); */
	}
	
	function delete_pembelian($KodePembelian){
		$this->pembelian_model->delete_pembelian($KodePembelian);
		$this->detail_pembelian_model->delete_detail_pembelian(array('KodePembelian'=>$KodePembelian));
		$_SESSION['msg']="Penghapusan data pembelian telah berhasil dilakukan.";
		redirect('admin/pembelian','refresh');
	}
	
	function search_pembelian($page=0){
		//pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url("admin/pembelian/index/");
		$config['total_rows'] = $this->pembelian_model->get_total_pembelian();
		$row_per_page = 15;
		$config['per_page'] = $row_per_page;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		//judul
		$data['judul'] = "Data Pembelian";
		//input hasil masukan
		$NamaField = $this->input->post('NamaField');
		$keyword = $this->input->post('keyword');
		//kondisi
		if($keyword!=""){
			$result = $this->pembelian_model->search_pembelian($NamaField,$keyword);
			$subdata['result_pembelian'] = $result;
			$data['content'] = $this->load->view('admin/pembelian_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
		}
		else{
			redirect('admin/pembelian','refresh');
		}
	}

	function edit_produk_detail_pembelian(){
		//validasi
		$this->form_validation->set_rules("BeratBeli","Berat Beli","required");
		$this->form_validation->set_rules("HargaBeli","Harga Beli","required");
		if($this->form_validation->run()==true){
			$KodePembelian = $this->input->post('KodePembelian');
			$KodeProduk = $this->input->post('KodeProduk');
			$data = array(
				'BeratBeli' => $this->input->post('BeratBeli'),
				'HargaBeli' => $this->input->post('HargaBeli')
					);
			$this->detail_pembelian_model->update_detail_pembelian($data,$KodePembelian,$KodeProduk);
			$this->pembelian_model->update_total_pembelian($KodePembelian);	
		}
		redirect("admin/pembelian/edit_pembelian/".$KodePembelian,"refresh");
	}
	
	function add_produk_detail_pembelian(){
	//menangkap kode pembelian + kode produk
		$KodePembelian = $this->input->post('KodePembelian');
		$KodeProduk = $this->input->post('KodeProduk');
		$data = array(
			   'BeratBeli' => $this->input->post('BeratBeli'),
			   'HargaBeli' => $this->input->post('HargaBeli')
				);
		$this->detail_pembelian_model->insert_detail_pembelian($data,$KodePembelian,$KodeProduk);
		$this->pembelian_model->update_total_pembelian($KodePembelian);	
		redirect("admin/pembelian/add_pembelian/".$KodePembelian,"refresh");
	}
	
	function respon_edit_detail_pembelian(){
		$KodePembelian	= $this->input->post('KodePembelian');
		$KodeProduk		= $this->input->post('KodeProduk');
		$result = $this->detail_pembelian_model->detail_pembelian($KodePembelian,$KodeProduk);
		$subdata['result_produk_detail_pembelian'] = $result;	
		$this->load->view('admin/pembelian_edit_produk_view',$subdata);
	}
	
	function tambah_produk_detail_pembelian($KodePembelian){
		$this->form_validation->set_rules('BeratBeli','Berat Pembelian','required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			/* $result_kode_produk = $this->produk_model->get_daftar_produk();
			$subdata['result_daftar_kode_produk'] = $result_kode_produk; */
			//mengirim data produk untuk ditampilkan dalam combobox pada pembelian_add_detail_view 
			$result_daftar_produk = $this->pembelian_model->get_combobox_produk($KodePembelian);
			$subdata['result_daftar_produk'] = $result_daftar_produk;
			/* $result_daftar_produk = $this->produk_model->get_daftar_produk();
			$subdata['result_daftar_produk'] = $result_daftar_produk;*/
			 //mengirim kode pembelian pada pembelian_add_detail_view
			$subdata['result_kode_pembelian'] = $KodePembelian;
			$result_detail_pembelian = $this->detail_pembelian_model->detail_pembelian($KodePembelian);
			//mengirim detail pembelian produk untuk menampilkan produk yang telah dipesan pada pembelian_add_detail_view 
			$subdata['result_isi_detail_pembelian'] = $result_detail_pembelian;
			$data['content'] = $this->load->view('admin/pembelian_add_detail_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
			       'KodePembelian' => $KodePembelian,
			       'KodeProduk' => $this->input->post('daftar_kode_produk'),
				   'BeratBeli' => $this->input->post('BeratBeli'),
				   'HargaBeli' => $this->input->post('HargaBeli')
					);
			$this->detail_pembelian_model->insert_detail_pembelian($data);
			$this->pembelian_model->update_total_pembelian($KodePembelian);	
			redirect("admin/pembelian/tambah_produk_detail_pembelian/".$KodePembelian,"refresh");
		}
	}
	
	function edit_tambah_produk_detail_pembelian(){
		$this->form_validation->set_rules('BeratBeli','Berat Pembelian','required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==true){
			$data = array(
			       'KodePembelian' => $this->input->post('KodePembelian'),
			       'KodeProduk' => $this->input->post('KodeProduk'),
				   'BeratBeli' => $this->input->post('BeratBeli'),
				   'HargaBeli' => $this->input->post('HargaBeli')
					);
			$this->detail_pembelian_model->insert_detail_pembelian($data);
			$this->pembelian_model->update_total_pembelian($this->input->post('KodePembelian'));
			}
		redirect("admin/pembelian/edit_pembelian/".$this->input->post('KodePembelian'),"refresh");
	}

	function delete_detail_pembelian($KodePembelian,$KodeProduk){
		$where = array(
			"KodePembelian" => $KodePembelian,
			"KodeProduk" => $KodeProduk,
		);
		$this->detail_pembelian_model->delete_detail_pembelian($where);
		$this->pembelian_model->update_total_pembelian($KodePembelian);	
		redirect("admin/pembelian/edit_pembelian/".$KodePembelian);
	}
	
	function cetak_pembelian(){
		//mencetak data pembelian
		$result = $this->pembelian_model->get_pembelian();
		$subdata['result_pembelian'] = $result;
		$this->load->view('admin/cetak_pembelian_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
	
}