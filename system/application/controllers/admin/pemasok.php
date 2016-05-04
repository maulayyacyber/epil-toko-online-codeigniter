<?php
Class Pemasok extends Controller{
	function Pemasok(){
		parent::Controller();
		parent::Controller();
		if(isset($_SESSION["username"]) && $_SESSION['level']=='Pegawai'){
			$this->load->model(array('pemasok_model','penjualan_model'));
		}else{
			redirect('home');
		}
	}
	
	function detail_pemasok($KodePemasok){
		//menampilkan detail pemasok
		$result = $this->pemasok_model->get_detail_pemasok($KodePemasok);
		$subdata['result_detail_pemasok'] = $result;
		$data['content'] = $this->load->view('admin/detail_pemasok_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);	
	}
	
	function index(){
		$data['judul'] = "Data Pemasok";
		//menampilkan daftar pemasok
		$result = $this->pemasok_model->get_daftar_pemasok();
		$subdata['result_pemasok'] = $result;
		$data['content'] = $this->load->view('admin/pemasok_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function add_pemasok(){
		$data['judul'] = "Input Data Pemasok";
		//menampilkan add pemasok
		$this->form_validation->set_rules('NamaPemasok','Nama Pemasok','required');
		$this->form_validation->set_rules('AlmtPemasok', 'Alamat', 'required');
		$this->form_validation->set_rules('NoTelepon', 'No Telepon', 'required');
		$this->form_validation->set_rules('Kota', 'Kota', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			$data['content'] = $this->load->view('admin/pemasok_add_view','',TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
				   'NamaPemasok' => $this->input->post('NamaPemasok'),
				   'JenisKelamin' => $this->input->post('JenisKelamin'),
				   'AlmtPemasok' => $this->input->post('AlmtPemasok'),
				   'NoTelepon' => $this->input->post('NoTelepon'),
				   'Kredibilitas' => $this->input->post('Kredibilitas'),
				   'Email' => $this->input->post('Email'),
				   'Kota' => $this->input->post('Kota')
					);
			$this->pemasok_model->insert_pemasok($data);
			$_SESSION['msg']='Penambahan data pemasok telah berhasil dilakukan';
			redirect('admin/pemasok','refresh');
			}
		}
	
	function edit_pemasok($KodePemasok=''){
		$data['judul'] = "Edit Data Pemasok";
		//menampilkan edit pemasok
		$this->form_validation->set_rules('NamaPemasok','Nama Pemasok','required');
		$this->form_validation->set_rules('AlmtPemasok', 'Alamat', 'required');
		$this->form_validation->set_rules('NoTelepon', 'No Telepon', 'required|numeric');
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('Kota', 'Kota', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
			if($this->form_validation->run()==false){
				$result = $this->pemasok_model->get_detail_pemasok($KodePemasok);
				$subdata['result_detail_pemasok'] = $result;
				$data['content'] = $this->load->view('admin/pemasok_edit_view',$subdata,TRUE);
				$this->load->view("template_admin/template",$data);
			}else{
			//mengambil data pemasok
			$data = array(
				   'NamaPemasok' => $this->input->post('NamaPemasok'),
				   'JenisKelamin' => $this->input->post('JenisKelamin'),
				   'AlmtPemasok' => $this->input->post('AlmtPemasok'),
				   'NoTelepon' => $this->input->post('NoTelepon'),
				   'Kredibilitas' => $this->input->post('Kredibilitas'),
				   'Email' => $this->input->post('Email'),
				   'Kota' => $this->input->post('Kota'),
					);
			$this->pemasok_model->update_pemasok($data,$KodePemasok);
			$_SESSION['msg'] = "Pengubahan data pemasok telah berhasil dilakukan";
			redirect("admin/pemasok","refresh");
			$this->load->view("admin/success_edit",$data);
		}	
	}
	
	function delete_pemasok($KodePemasok){
		$this->pemasok_model->delete_pemasok($KodePemasok);
		redirect('admin/pemasok','refresh');
	}
	
	function filter(){
		$NamaField = $this->input->post("NamaField");
		$Value = $this->input->post("Value");
		$subdata["result_filter_pemasok"] = $this->pemasok_model->filter($NamaField,$Value);
		$this->load->view('admin/filter_pemasok_view',$subdata); 
	}
	
	function cetak_pemasok(){
		//mencetak data pemasok
		$result = $this->pemasok_model->get_pemasok();
		$subdata['result_pemasok'] = $result;
		$this->load->view('admin/cetak_pemasok_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}