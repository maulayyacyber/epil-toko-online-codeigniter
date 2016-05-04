<?php
Class Summary_produk extends Controller{
	function Summary_produk(){
		parent::Controller();
		$this->load->model(array('produk_model','penjualan_model','detail_penjualan_model','summary_produk_model'));
	}
	
	function index(){
		//judul
		$data['judul'] = "Summary Produk";
		//memanggil model
		$result = $this->summary_produk_model->get_summary_produk();
		$subdata['result_summary_produk'] = $result;
		$data['content'] = $this->load->view('admin/summary_produk_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function get_grafik(){
		$data['judul'] = "Grafik Summary Produk";
		//menampilkan grafik
		$subdata['result_grafik_summary_produk'] = $this->summary_produk_model->get_summary_produk();
		$data['content'] = $this->load->view('admin/grafik_summary_produk_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function cetak_summary_produk(){
		//mencetak data summary pemasok
		$result = $this->summary_produk_model->get_summary_produk();
		$subdata['result_summary_produk'] = $result;
		$this->load->view('admin/cetak_summary_produk_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
	
}