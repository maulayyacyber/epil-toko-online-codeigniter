<?php
Class Menu_login extends Controller{
	function Menu_login(){
		parent::Controller();
		$this->load->model(array('pegawai_model','pelanggan_model'));
	}
	
	function index(){
		//load view login dan sign up
		$data['content'] = $this->load->view('login_menu_view','',TRUE);
		$this->load->view("template_web/template",$data);
	}

}