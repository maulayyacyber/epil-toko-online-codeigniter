<?php
Class Contact extends Controller{
	function Contact(){
		parent::Controller();
		//$this->load->model('term_condition_model');
	}
	
	function index(){
		//$result = $this->term_condition_model->show_tnc();
		//$subdata['result_tnc'] = $result;
		$data['content'] = $this->load->view('contact_view','',TRUE);
		$this->load->view("template_web/template",$data);
	}
	
}