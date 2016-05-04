<?php
Class Laporan_bulanan extends Controller{
	function Laporan_bulanan(){
		parent::Controller();
		$this->load->model(array('laporan_bulanan_model'));
	}
	
	function index(){
		//form laporan
		$data['content'] = $this->load->view("admin/form_laporan_bulanan",'',TRUE);
		$data['judul'] = "Laporan Bulanan";
		//cek apakah tahun telah dipilih
		$this->form_validation->set_rules('tahun','Tahun','required');
		if($this->form_validation->run()==true){
			$tahun = $this->input->post('tahun');
			//menampilkan laporan bulanan
			$subdata['result_laporan_bulanan'] = $this->laporan_bulanan_model->get_laporan_bulanan($tahun);
			$data['content'] .= $this->load->view('admin/laporan_bulanan_view',$subdata,TRUE);
		}
		$data['content'] .= "</div>";
		$this->load->view("template_admin/template",$data);
	}

	function get_grafik($tahun){
		$data['judul'] = "Grafik Laporan Tahunan";
		
		//cek apakah bulan dan tahun telah dipilih

		//menampilkan laporan harian
		$subdata['result_grafik_laporan_bulanan'] = $this->laporan_bulanan_model->get_laporan_bulanan($tahun);
		$data['content'] = $this->load->view('admin/grafik_laporan_bulanan_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function cetak_laporan_bulanan($tahun){
		//cek apakah bulan dan tahun telah dipilih
		$tahun = $this->uri->segment(4);
		//menampilkan laporan harian
		$subdata['result_laporan_bulanan'] = $this->laporan_bulanan_model->get_laporan_bulanan($tahun);
		$this->load->view('admin/cetak_laporan_bulanan_view',$subdata);
		
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}