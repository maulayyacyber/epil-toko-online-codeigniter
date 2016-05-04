<?php
Class Produk extends Controller{
	function Produk(){
		parent::Controller();
		$this->load->model('produk_model');
	}
	
	function detail_produk($KodeProduk){
		//menampilkan detail produk
		$result = $this->produk_model->get_detail_produk($KodeProduk);
		$subdata['result_detail_produk'] = $result;
		$result_berat = $this->produk_model->get_daftar_berat($KodeProduk);
		$subdata['result_daftar_berat'] = $result_berat;
		$this->load->view('detail_produk_view',$subdata);
		
	}
	
	function index($page=0){
		//pagging
		$this->load->library('pagination');
		$config['base_url'] = site_url("produk/index/");
		$config['total_rows'] = $this->produk_model->get_total_produk();
		$row_per_page = 9;
		$config['per_page'] = $row_per_page;
		$this->pagination->initialize($config);
		
		$result = $this->produk_model->get_produk($row_per_page,$page);
		$subdata['result_produk'] = $result;
		$data['content'] = $this->load->view('produk_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);
	}
	
}