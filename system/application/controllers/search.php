<?php
Class Search extends Controller{
	function Search(){
		parent::Controller();
		$this->load->model('produk_model');
	}
	
	function index($page=0){
		//input hasil masukan
		$NamaProduk = $this->input->post('search');
		//kondisi
		if($NamaProduk!=""){
		//pagination
		$this->load->library('pagination');
		
		$config['base_url'] = site_url("search/index/");
		$config['total_rows'] = $this->produk_model->total_search_produk($NamaProduk);
		$row_per_page = 6;
		$config['per_page'] = $row_per_page;
		$this->pagination->initialize($config);
				
		$result = $this->produk_model->search_produk($NamaProduk,$row_per_page,$page);
		$subdata['result_produk'] = $result;
		$data['content'] = $this->load->view('produk_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);
		}
		else{
		$_SESSION['msg']='Please input keyword to search products.';
		redirect('home','refresh');
		
		}
	}
}