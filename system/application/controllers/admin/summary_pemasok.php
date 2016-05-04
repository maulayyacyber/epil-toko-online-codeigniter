<?php
Class Summary_pemasok extends Controller{
	function Summary_pemasok(){
		parent::Controller();
		$this->load->model(array('pemasok_model','pembelian_model','detail_pembelian_model','summary_pemasok_model'));
	}
	
	function index(){
		$data['judul'] = "Summary Pemasok";
		$subdata['result_summary_pemasok'] = $this->summary_pemasok_model->get_summary_pemasok();
		$data['content'] = $this->load->view('admin/summary_pemasok_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function get_grafik(){
		$data['judul'] = "Grafik Summary Pemasok";
		//menampilkan grafik
		$subdata['result_grafik_summary_pemasok'] = $this->summary_pemasok_model->get_summary_pemasok();
		$data['content'] = $this->load->view('admin/grafik_summary_pemasok_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function cetak_summary_pemasok(){
		//mencetak data summary pemasok
		$result = $this->summary_pemasok_model->get_summary_pemasok();
		$subdata['result_summary_pemasok'] = $result;
		$this->load->view('admin/cetak_summary_pemasok_view',$subdata);
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}