<?php
Class Laporan_harian extends Controller{
	function Laporan_harian(){
		parent::Controller();
		$this->load->model(array('laporan_harian_model'));
	}
	
	function index(){
		//form laporan
		$data['content'] = $this->load->view("admin/form_laporan_harian",'',TRUE);
		$data['judul'] = "Laporan Harian";
		
		//cek apakah bulan dan tahun telah dipilih
		$this->form_validation->set_rules('bulan','Bulan','required');
		$this->form_validation->set_rules('tahun','Tahun','required');
		if($this->form_validation->run()==true){
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			//menampilkan laporan harian
			$subdata['result_laporan_harian'] = $this->laporan_harian_model->get_laporan_harian($bulan,$tahun);
			$data['content'] .= $this->load->view('admin/laporan_harian_view',$subdata,TRUE);
		}
		$data['content'] .= "</div>";
		$this->load->view("template_admin/template",$data);
	}

	function get_grafik($tahun,$bulan){
		$data['judul'] = "Grafik Laporan Harian";
		
		//cek apakah bulan dan tahun telah dipilih

		//menampilkan laporan harian
		$subdata['result_grafik_laporan_harian'] = $this->laporan_harian_model->get_laporan_harian($bulan,$tahun);
		$data['content'] = $this->load->view('admin/grafik_laporan_harian_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function cetak_laporan_harian($bulan,$tahun){
		//cek apakah bulan dan tahun telah dipilih
		$tahun = $this->uri->segment(4);
		$bulan = $this->uri->segment(5);
		//menampilkan laporan harian
		$subdata['result_laporan_harian'] = $this->laporan_harian_model->get_laporan_harian($bulan,$tahun);
		$this->load->view('admin/cetak_laporan_harian_view',$subdata);
		
		echo '<script>
				window.print();
				window.close();
		   	  </script>';
	}
}