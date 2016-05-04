<?php
Class Pegawai extends Controller{
	function Pegawai(){
		parent::Controller();
		$this->load->model(array('pegawai_model','penjualan_model'));
	}
	
	function index($KodePegawai=''){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin' || $_SESSION['level']=='Pegawai' || $_SESSION['level']=='Manajer')){
		
		if($KodePegawai==""){
			$KodePegawai = $_SESSION["kode_user"];
		}
		$data['judul'] = "Data Pegawai";
		//menampilkan detail pelanggan
		$result = $this->pegawai_model->get_daftar_pegawai();
		$subdata['result_pegawai'] = $result;
		$data['content'] = $this->load->view('admin/pegawai_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
		}else{
			redirect('home');
		}
	}
	
	function add_pegawai(){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin')){
		
		$data['judul'] = "Input Data Pegawai";
		//menampilkan add pegawai
		$this->form_validation->set_rules('NamaPegawai','nama pegawai','required');
		$this->form_validation->set_rules('JenisKelamin', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('TempatLahir', 'tempat lahir', 'required');
		$this->form_validation->set_rules('TanggalLahir', 'tanggal lahir', 'required');
		$this->form_validation->set_rules('AlmtPegawai', 'alamat', 'required');
		$this->form_validation->set_rules('NoTelepon', 'no telepon', 'required|numeric');
		$this->form_validation->set_rules('Email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('TanggalMasuk', 'tanggal masuk', 'required');
		$this->form_validation->set_rules('Level', 'level', 'required');
		$this->form_validation->set_rules('Username', 'username', 'required|callback_username_check');
		$this->form_validation->set_rules('Password', 'password', 'required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			$data['content'] = $this->load->view('admin/pegawai_add_view','',TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
					'NamaPegawai' => $this->input->post('NamaPegawai'),
					'JenisKelamin' => $this->input->post('JenisKelamin'),
					'TempatLahir' => $this->input->post('TempatLahir'),
					'TanggalLahir' => $this->input->post('TanggalLahir'),
					'AlmtPegawai' => $this->input->post('AlmtPegawai'),
					'NoTelepon' => $this->input->post('NoTelepon'),
					'Email' => $this->input->post('Email'),
					'TanggalMasuk' => $this->input->post('TanggalMasuk'),
					'Level' => $this->input->post('Level'),
					'Username' => $this->input->post('Username'),
					'Password' => md5($this->input->post('Password')),
					);
			$this->pegawai_model->insert_pegawai($data);
			$_SESSION['msg']="Penambahan data pegawai telah berhasil dilakukan.";
			redirect('admin/pegawai','refresh');
			}
			}else{
			redirect('home');
			}
		}
	
	function edit_pegawai($KodePegawai=''){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin' || $_SESSION['level']=='Manajer' || $_SESSION['level']=='Pegawai')){
		
		$data['judul'] = "Edit Data Pegawai";
		//menampilkan edit pemasok
		$this->form_validation->set_rules('NamaPegawai','Nama Pegawai','required');
		$this->form_validation->set_rules('JenisKelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('TanggalLahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('TempatLahir', 'tempat lahir', 'required');
		$this->form_validation->set_rules('AlmtPegawai', 'Alamat', 'required');
		$this->form_validation->set_rules('NoTelepon', 'No Telepon', 'required|numeric');
		$this->form_validation->set_rules('Email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('Username', 'Username', 'required|callback_username_check');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data['judul'] = "Data pegawai";
			if($this->form_validation->run()==false){
				$result = $this->pegawai_model->get_detail_pegawai($KodePegawai);
				$subdata['result_detail_pegawai'] = $result;
				$data['content'] = $this->load->view('admin/pegawai_edit_view',$subdata,TRUE);
				$this->load->view("template_admin/template",$data);
			}else{
			//mengambil data pemasok
			$data = array(
				   'NamaPegawai' => $this->input->post('NamaPegawai'),
				   'JenisKelamin' => $this->input->post('JenisKelamin'),
				   'TanggalLahir' => $this->input->post('TanggalLahir'),
				   'TempatLahir' => $this->input->post('TempatLahir'),
				   'AlmtPegawai' => $this->input->post('AlmtPegawai'),
				   'NoTelepon' => $this->input->post('NoTelepon'),
				   'Email' => $this->input->post('Email'),
				   );
			$this->pegawai_model->update_pegawai($data,$KodePegawai);
			$_SESSION['msg']="Pengubahan data pegawai telah berhasil dilakukan.";
			redirect('admin/pegawai','refresh');
		}
		}else{
			redirect('home');
			}
	}
	
	function edit_profil_pegawai($KodePegawai=''){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin' || $_SESSION['level']=='Manajer' || $_SESSION['level']=='Pegawai')){
		
		$data['judul'] = "Edit Profil Pegawai";
		//menampilkan edit pemasok
		$this->form_validation->set_rules('NamaPegawai','nama pegawai','required');
		$this->form_validation->set_rules('JenisKelamin', 'jenis kelamin', 'required');
		$this->form_validation->set_rules('TanggalLahir', 'tanggal lahir', 'required');
		$this->form_validation->set_rules('TempatLahir', 'tempat lahir', 'required');
		$this->form_validation->set_rules('AlmtPegawai', 'alamat', 'required');
		$this->form_validation->set_rules('NoTelepon', 'no telepon', 'required|numeric');
		$this->form_validation->set_rules('Email', 'email', 'required|valid_email');
		//$this->form_validation->set_rules('Username', 'Username', 'required|callback_username_check');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data['judul'] = "Data profil pegawai";
			if($this->form_validation->run()==false){
				$result = $this->pegawai_model->get_detail_pegawai($KodePegawai);
				$subdata['result_detail_pegawai'] = $result;
				$data['content'] = $this->load->view('admin/pegawai_edit_profil_view',$subdata,TRUE);
				$this->load->view("template_admin/template",$data);
			}else{
			//mengambil data pemasok
			$data = array(
				   'NamaPegawai' => $this->input->post('NamaPegawai'),
				   'JenisKelamin' => $this->input->post('JenisKelamin'),
				   'TanggalLahir' => $this->input->post('TanggalLahir'),
				   'TempatLahir' => $this->input->post('TempatLahir'),
				   'AlmtPegawai' => $this->input->post('AlmtPegawai'),
				   'NoTelepon' => $this->input->post('NoTelepon'),
				   'Email' => $this->input->post('Email'),
				   );
			$this->pegawai_model->update_pegawai($data,$KodePegawai);
			redirect('admin/pegawai/get_profil','refresh');
		}
		}else{
			redirect('admin/');
			}
	}
	
	function delete_pegawai($KodePegawai){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin')){
	
		$this->pegawai_model->delete_pegawai($KodePegawai);
		$_SESSION['msg']="Penghapusan data pegawai telah berhasil dilakukan.";
		redirect('admin/pegawai','refresh');
		}else{
			redirect('home');
		}
	}
	
	function filter(){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin')){
		
		$NamaField = $this->input->post("NamaField");
		$Value = $this->input->post("Value");
		$subdata["result_filter_pegawai"] = $this->pegawai_model->filter($NamaField,$Value);
		$this->load->view('admin/filter_pegawai_view',$subdata); 
		}else{
			redirect('home');
		}
	}
	
	function username_check($Username){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin' || $_SESSION['level']=='Manajer' || $_SESSION['level']=='Pegawai')){
		$result = $this->pegawai_model->check_username($Username);
		if (!$result){
			$this->form_validation->set_message('username_check', 'username telah digunakan');
			return FALSE;
		}
		else{
			return TRUE;
		}
		}else{
			redirect('home');
		}
	}
	
	function change_password($KodePegawai){
	$data['judul'] = "Ubah Password";
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin' || $_SESSION['level']=='Manajer' || $_SESSION['level']=='Pegawai')){
		$this->form_validation->set_rules('Password_lama', 'Password_lama', 'required|callback_check_password');
		$this->form_validation->set_rules('Password_baru', 'Password_baru', 'required|min_length[6]');
		$this->form_validation->set_rules('Password_konfirm', 'Password_konfirm', 'required|min_length[6]|match[Password_baru]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			$data['content'] = $this->load->view('admin/pegawai_edit_password_view','',TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
				'Password' => md5($this->input->post('Password_baru')),
			);
			$this->pegawai_model->update_data_pegawai($data);
			redirect('admin/pegawai/get_profil');
		}
		}else{
			redirect('home');
		}
	}
	
	function check_password($password){
		//cek benar atau tidak password
		$data = $this->pegawai_model->get_pegawai($_SESSION['kode_user']);
		$this->form_validation->set_message('check_password', 'Wrong Password');
		if($data){
			if(md5($password) == $data[0]->Password){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	function get_profil($KodePegawai=''){
		if(isset($_SESSION["username"]) && ($_SESSION['level']=='Admin' || $_SESSION['level']=='Manajer' || $_SESSION['level']=='Pegawai')){
		if($KodePegawai==""){
			$KodePegawai = $_SESSION["kode_user"];
		}
		$data['judul'] = "Profil Pegawai";
		//menampilkan profil pegawai
		$result = $this->pegawai_model->get_detail_pegawai($KodePegawai);
		$subdata['result_profil_pegawai'] = $result;
		$data['content'] = $this->load->view('admin/pegawai_profil_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
		}else{
			$data['content'] = $this->load->view('admin/pegawai_profil_view','',TRUE);
			$this->load->view("template_admin/template",$data);
		}
	}
	
	function cetak_pegawai(){
		//mencetak data pegawai
		$result = $this->pegawai_model->get_pegawai();
		$subdata['result_pegawai'] = $result;
		$this->load->view('admin/cetak_pegawai_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}