<?php
Class Statik extends Controller{
	function Statik(){
		parent::Controller();
	}
	
	function show($KodeMenu=""){
		$result = $this->menu_model->show_menu($KodeMenu);
		$subdata['result_statik'] = $result;
		$data['content'] = $this->load->view('statik_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);
	}
}