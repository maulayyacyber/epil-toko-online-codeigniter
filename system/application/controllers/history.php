<?php
Class History extends Controller{
	function History(){
		parent::Controller();
		$this->load->model(array('pelanggan_model','penjualan_model','detail_penjualan_model','pegawai_model'));
	}
	
	function index($KodePelanggan='',$page=0){
		//sesion
		if($KodePelanggan==""){
			$KodePelanggan = $_SESSION["kode_user"];
		}
		//$result_cek = $this->penjualan_model->cek_history_penjualan($KodePelanggan);
		//pagging
		$this->load->library('pagination');
		$config['base_url'] = site_url("history/index/".$KodePelanggan);
		$config['total_rows'] = $this->penjualan_model->get_total_history($KodePelanggan);
		if($config['total_rows'] ==0){
		$data['content'] = $this->load->view('history_view_empty','',TRUE);
		$this->load->view("template_web/template",$data);
		}else{
		$row_per_page = 8;
		$config['per_page'] = $row_per_page;
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		
		//???????????????????
		
		$result = $this->penjualan_model->get_history_penjualan($KodePelanggan,$row_per_page,$page);
		$subdata['result_history_penjualan'] = $result;
		if($subdata!=""){
		$data['content'] = $this->load->view('history_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);
		}
		else{
		$data['content'] = $this->load->view('history_view_empty','',TRUE);
		$this->load->view("template_web/template",$data);
		}
	}
	}
	
	function get_history($KodePelanggan=''){
		//menampilkan detail pelanggan
		if($KodePelanggan==""){
			$KodePelanggan = $_SESSION["kode_user"];
		}
		$result = $this->penjualan_model->get_history_penjualan($KodePelanggan);
		$subdata['result_history_penjualan'] = $result;
		if($subdata==''){
		$data['content'] = $this->load->view('history_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);}
		else{
		$_SESSION['msg_history'] = "There is no history for your account.";
		$this->load->view('history_view_empty','',TRUE);
		$this->load->view("template_web/template");}
		
	}
	
	function detail_penjualan($KodePenjualan,$KodeProduk=''){
		//menampilkan detail penjualan
		$result = $this->penjualan_model->get_detail_penjualan($KodePenjualan);
		$subdata['result_detail_penjualan'] = $result;
		$result = $this->detail_penjualan_model->detail_penjualan($KodePenjualan,$KodeProduk='');
		$subdata['result_isi_detail_penjualan'] = $result;
		$data['content'] = $this->load->view('detail_history_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);	
	}
	
	function cetak_detail_history($KodePenjualan){
	//print detail penjualan
		$result = $this->penjualan_model->get_detail_penjualan($KodePenjualan);
		$subdata['result_detail_penjualan'] = $result;
		$result = $this->detail_penjualan_model->detail_penjualan($KodePenjualan,$KodeProduk='');
		$subdata['result_isi_detail_penjualan'] = $result;
		$this->load->view('cetak_detail_history_view',$subdata);
		echo '<script>
				window.print();
				window.close();
			</script>';
	}
	
}