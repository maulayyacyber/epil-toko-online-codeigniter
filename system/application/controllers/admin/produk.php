<?php
Class Produk extends Controller{
	function Produk(){
		parent::Controller();
		if(isset($_SESSION["username"]) && $_SESSION['level']=='Pegawai'){
			$this->load->model(array('produk_model','penjualan_model'));
		}else{
			redirect('home');
		}
	}
	
	function detail_produk($KodeProduk){
		//menampilkan detail produk
		$result = $this->produk_model->get_detail_produk($KodeProduk);
		$subdata['result_detail_produk'] = $result;
		$data['content'] = $this->load->view('admin/detail_produk_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);	
	}
	
	function index(){
		$data['judul'] = "Data Produk";
		//menampilkan daftar produk
		$result = $this->produk_model->get_daftar_produk();
		$subdata['result_produk'] = $result;
		$data['content'] = $this->load->view('admin/produk_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function add_produk(){
		$data['judul'] = "Input Data Produk";
		//menampilkan edit produk
		$this->form_validation->set_rules('KodeProduk','Kode Produk','required');
		$this->form_validation->set_rules('NamaProduk','Nama Produk','required');
		$this->form_validation->set_rules('Kualitas','Kualitas','required');
		$this->form_validation->set_rules('Berat', 'Ukuran', 'required');
		$this->form_validation->set_rules('userfile', 'Nama Foto', 'callback_upload');
		$this->form_validation->set_rules('HargaKiloan', 'Harga Kiloan', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', '%s harus diisi.');
		
		if($this->form_validation->run()==false){
			$data['content'] = $this->load->view('admin/produk_add_view','',TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
				   'KodeProduk' => $this->input->post('KodeProduk'),
				   'NamaProduk' => $this->input->post('NamaProduk'),
				   'Kualitas' => $this->input->post('Kualitas'),
				   'Berat' => $this->input->post('Berat'),
				   'HargaKiloan' => $this->input->post('HargaKiloan')
			);
			if(isset($_FILES['userfile']) && $_FILES['userfile']['name']!=''){
				$data_upload = $this->upload->data();
				$data['NamaFoto'] = $data_upload['file_name'];
			};
			$this->produk_model->insert_produk($data);
			$_SESSION['msg']="Penambahan data produk telah berhasil dilakukan.";
			redirect('admin/produk','refresh');
		}
	}
	
	function edit_produk($KodeProduk=''){
		if($KodeProduk !=""){
			$data['judul'] = "Edit Data Produk";
			//menampilkan edit produk
			$this->form_validation->set_rules('KodeProduk','Kode Produk','required');
			$this->form_validation->set_rules('NamaProduk','Nama Produk','required');
			$this->form_validation->set_rules('Kualitas', 'Kualitas', 'required|alpha');
			$this->form_validation->set_rules('Berat', 'Ukuran', 'required');
			$this->form_validation->set_rules('userfile', 'Nama Foto', 'callback_upload');
			$this->form_validation->set_rules('HargaKiloan', 'Harga Kiloan', 'required');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_message('required', '%s harus diisi.');
			
			if($this->form_validation->run()==false){
				$result = $this->produk_model->get_detail_produk($KodeProduk);
				$subdata['result_detail_produk'] = $result;
				$data['content'] = $this->load->view('admin/produk_edit_view',$subdata,TRUE);
				$this->load->view("template_admin/template",$data);
			}else{
				$data = array(
					   'KodeProduk' => $this->input->post('KodeProduk'),
					   'NamaProduk' => $this->input->post('NamaProduk'),
					   'Kualitas' => $this->input->post('Kualitas'),
					   'Berat' => $this->input->post('Berat'),
					   'HargaKiloan' => $this->input->post('HargaKiloan'),
				);
				if(isset($_FILES['userfile']) && $_FILES['userfile']['name']!=''){
					$data_upload = $this->upload->data();
					$data['NamaFoto'] = $data_upload['file_name'];
				}
				$this->produk_model->update_produk($data,$KodeProduk);
				$_SESSION['msg'] = "Pengubahan data produk telah berhasil dilakukan.";
				redirect("admin/produk","refresh");
			}
		}else{
			redirect("admin/produk","refresh");
		}
	}
	
	function delete_produk($KodeProduk){
		$this->produk_model->delete_produk($KodeProduk);
		$_SESSION['msg']="Penghapusan data produk telah berhasil dilakukan.";
		redirect('admin/produk','refresh');
	}
	
	function filter(){
		$NamaField = $this->input->post("NamaField");
		$Value = $this->input->post("Value");
		$subdata["result_filter_produk"] = $this->produk_model->filter($NamaField,$Value);
		$this->load->view('admin/filter_produk_view',$subdata); 
	}
	
	function upload(){
		if(isset($_FILES['userfile']) && $_FILES['userfile']['name']!=''){
			$config['upload_path'] 		= './foto_ikan/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '1000';
			$config['max_width']  		= '1000';
			$config['max_height']  		= '1000';
			$config['file_name']		= $this->input->post('KodeProduk');
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload())
			{
				$this->form_validation->set_message('upload',$this->upload->display_errors());
				return false;
			}	
			else
			{
				return true;
			}
		}else{
			//$this->form_validation->set_message('upload','test');
			return true;
		}
	}
	
	function cetak_produk(){
		//mencetak data pembelian
		$result = $this->produk_model->get_produk();
		$subdata['result_produk'] = $result;
		$this->load->view('admin/cetak_produk_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}