<?php
Class Pelanggan extends Controller{
	function Pelanggan(){
		parent::Controller();
		parent::Controller();
		if(isset($_SESSION["username"]) && $_SESSION['level']=='Pegawai'){
			$this->load->model(array('pelanggan_model','penjualan_model'));
		}else{
			redirect('home');
		}
	}
	
	function detail_pelanggan($KodePelanggan){
		//menampilkan detail produk
		$result = $this->pelanggan_model->get_detail_pelanggan($KodePelanggan);
		$subdata['result_detail_pelanggan'] = $result;
		$data['content'] = $this->load->view('admin/detail_pelanggan_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);	
	}
	
	function index(){ 
		$data['judul'] = "Data Pelanggan";
		//menampilkan daftar produk
		$result = $this->pelanggan_model->get_daftar_pelanggan();
		$subdata['result_pelanggan'] = $result;
		$data['content'] = $this->load->view('admin/pelanggan_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function edit_pelanggan($KodePelanggan=''){
		$data['judul'] = "Edit Data Pelanggan";
		//menampilkan edit pemasok
		$this->form_validation->set_rules('NamaPelanggan','Nama Pelanggan','required');
		$this->form_validation->set_rules('JenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('AlmtPelanggan', 'Alamat', 'required');
		$this->form_validation->set_rules('NoTelepon', 'No Telepon', 'required|numeric');
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('Kota', 'Kota', 'required');
		$this->form_validation->set_rules('Negara', 'Negara', 'required');
		$this->form_validation->set_rules('KodePos', 'Kode Pos', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data['judul'] = "Data pelanggan";
			if($this->form_validation->run()==false){
				$result = $this->pelanggan_model->get_detail_pelanggan($KodePelanggan);
				$subdata['result_detail_pelanggan'] = $result;
				$data['content'] = $this->load->view('admin/pelanggan_edit_view',$subdata,TRUE);
				$this->load->view("template_admin/template",$data);
			}else{
			//mengambil data pemasok
			$data = array(
				   'NamaPelanggan' => $this->input->post('NamaPelanggan'),
				   'JenisKelamin' => $this->input->post('JenisKelamin'),
				   'AlmtPelanggan' => $this->input->post('AlmtPelanggan'),
				   'NoTelepon' => $this->input->post('NoTelepon'),
				   'Email' => $this->input->post('Email'),
				   'Kota' => $this->input->post('Kota'),
				   'Negara' => $this->input->post('Negara'),
				   'KodePos' => $this->input->post('KodePos')
					);
			$this->pelanggan_model->update_pelanggan($data,$KodePelanggan);
			$_SESSION['msg']='Pengubahan data pelanggan telah berhasil dilakukan';
			redirect('admin/pelanggan','refresh');
		}	
	}
	
	function delete_pelanggan($KodePelanggan){
		$this->pelanggan_model->delete_pelanggan($KodePelanggan);
		redirect('admin/pelanggan','refresh');
	}
	
	function filter(){
		$NamaField = $this->input->post("NamaField");
		$Value = $this->input->post("Value");
		$subdata["result_filter_pelanggan"] = $this->pelanggan_model->filter($NamaField,$Value);
		$this->load->view('admin/filter_pelanggan_view',$subdata); 
	}
	
	function cetak_pelanggan(){
		//mencetak data pelanggan
		$result = $this->pelanggan_model->get_pelanggan();
		$subdata['result_pelanggan'] = $result;
		$this->load->view('admin/cetak_pelanggan_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}