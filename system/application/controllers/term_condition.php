<?php
Class Term_condition extends Controller{
	function Term_condition(){
		parent::Controller();
		//$this->load->model('term_condition_model');
	}
	
	function index(){
		//$result = $this->term_condition_model->show_tnc();
		//$subdata['result_tnc'] = $result;
		$data['content'] = $this->load->view('term_condition_view','',TRUE);
		$this->load->view("template_web/template",$data);
	}
	
}