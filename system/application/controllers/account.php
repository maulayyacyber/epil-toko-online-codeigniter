<?php
Class Account extends Controller{
	function Account(){
		parent::Controller();
		$this->load->model('pelanggan_model');
	}
	
	function index($KodePelanggan=''){
		//menampilkan detail pelanggan
		if($KodePelanggan==""){
			$KodePelanggan = $_SESSION["kode_user"];
		}
				
		$result = $this->pelanggan_model->get_detail_pelanggan($KodePelanggan);
		$subdata['result_detail_pelanggan'] = $result;
		$data['content'] = $this->load->view('account_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);	
	
	}
	
	function add_account(){
		$this->form_validation->set_rules('NamaPelanggan','full name','required');
		$this->form_validation->set_rules('JenisKelamin','sex','required');
		$this->form_validation->set_rules('TempatLahir', 'place of birth', 'required');
		$this->form_validation->set_rules('TanggalLahir', 'date of birth', 'required');
		$this->form_validation->set_rules('AlmtPelanggan', 'address', 'required');
		$this->form_validation->set_rules('NoTelepon', 'phone', 'required|numeric');
		$this->form_validation->set_rules('Email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('Kota', 'city', 'required|alpha');
		$this->form_validation->set_rules('Negara', 'country', 'required|alpha');
		$this->form_validation->set_rules('Username', 'username', 'required|min_length[6]|callback_username_check');
		$this->form_validation->set_rules('Password', 'password', 'required|matches[ConfirmPassword]');
		$this->form_validation->set_rules('ConfirmPassword', 'confirm password', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if($this->form_validation->run()==false){
			$data['content'] = $this->load->view('account_add_view','',TRUE);
			$this->load->view("template_web/template",$data);
		}else{
		$data=array(
			'JenisKelamin' => $this->input->post('JenisKelamin'),
            'NamaPelanggan' => $this->input->post('NamaPelanggan'),
            'TempatLahir' => $this->input->post('TempatLahir'),
			'TanggalLahir' => $this->input->post('TanggalLahir'),
            'AlmtPelanggan' => $this->input->post('AlmtPelanggan'),
            'NoTelepon' => $this->input->post('NoTelepon'),
			'Email' => $this->input->post('Email'),
            'Kota' => $this->input->post('Kota'),
            'Negara' => $this->input->post('Negara'),
            'KodePos' => $this->input->post('KodePos'),			   
			'TanggalDaftar' => date('Y-m-d'),
            'Username' => $this->input->post('Username'),
            'Password' => md5($this->input->post('Password'))
		);
		$this->pelanggan_model->insert_pelanggan($data);
		$data['content'] = $this->load->view('sukses_add_account','',TRUE);
		$this->load->view("template_web/template",$data);
		}
	}
	
	function edit_account($KodePelanggan=''){
		//menampilkan edit pelanggan
		$this->form_validation->set_rules('NamaPelanggan','full name','required');
		$this->form_validation->set_rules('JenisKelamin','sex','required');
		$this->form_validation->set_rules('TempatLahir', 'place of birth', 'required');
		$this->form_validation->set_rules('TanggalLahir', 'date of birth', 'required');
		$this->form_validation->set_rules('AlmtPelanggan', 'address', 'required');
		$this->form_validation->set_rules('NoTelepon', 'phone', 'required|numeric');
		$this->form_validation->set_rules('Email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('Kota', 'city', 'required');
		$this->form_validation->set_rules('Negara', 'country', 'required');
		$this->form_validation->set_rules('Username', 'username', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			if($KodePelanggan==""){
			$KodePelanggan = $_SESSION["kode_user"];
			}
			$result = $this->pelanggan_model->get_detail_pelanggan($KodePelanggan);
			$subdata['result_detail_pelanggan'] = $result;
			$data['content'] = $this->load->view('account_edit_view',$subdata,TRUE);
			$this->load->view("template_web/template",$data);
		}else{
		//mengambil form input
		$data = array(
               'JenisKelamin' => $this->input->post('JenisKelamin'),
               'NamaPelanggan' => $this->input->post('NamaPelanggan'),
               'TempatLahir' => $this->input->post('TempatLahir'),
			   'TanggalLahir' => $this->input->post('TanggalLahir'),
               'AlmtPelanggan' => $this->input->post('AlmtPelanggan'),
               'NoTelepon' => $this->input->post('NoTelepon'),
			   'Email' => $this->input->post('Email'),
               'Kota' => $this->input->post('Kota'),
               'Negara' => $this->input->post('Negara'),
               'KodePos' => $this->input->post('KodePos'),			  
               'Username' => $this->input->post('Username')
				);
		$this->pelanggan_model->update_data_pelanggan($data);
		$this->index();
		$_SESSION['msg_account'] = "Your account have been change.";
		}	
	}
	
	function username_check($Username)
	{
		$result = $this->pelanggan_model->check_username($Username);
		if (!$result){
			$this->form_validation->set_message('username_check', 'username telah digunakan');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
	
	function change_password(){
		$this->form_validation->set_rules('Password_lama', 'old password', 'required|callback_check_password');
		$this->form_validation->set_rules('Password_baru', 'new password', 'required|min_length[6]');
		$this->form_validation->set_rules('Password_konfirm', 'confirm password', 'required|min_length[6]|match[Password_baru]');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			
			$data['content'] = $this->load->view('change_password_view','',TRUE);
			$this->load->view("template_web/template",$data);
		}else{
			$data = array(
				'Password' => md5($this->input->post('Password_baru')),
			);
			$this->pelanggan_model->update_data_pelanggan($data);
			redirect('account');
			$_SESSION['msg_account'] = "Your password have been change.";
		}
	}
	
	function check_password($password){
		//cek benar atau tidak password
		$data = $this->pelanggan_model->get_pelanggan($_SESSION['kode_user']);
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
}