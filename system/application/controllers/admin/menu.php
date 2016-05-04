<?php
Class Menu extends Controller{
	function Menu(){
		parent::Controller();
		if(isset($_SESSION["username"]) && $_SESSION['level']=='Admin'){
			$this->load->model('menu_model');
		}else{
			redirect('home');
		}
	}
	
	function index(){
		$data['judul'] = "Pengaturan Menu";
		//menampilkan data menu
		$result = $this->menu_model->get_menu();
		$subdata['result_menu'] = $result;
		$data['content'] = $this->load->view('admin/pengaturan_menu_view',$subdata,TRUE);
		$this->load->view("template_admin/template",$data);
	}
	
	function add_menu(){
		$data['judul'] = "Penambahan Menu Website";
		//menampilkan add menu
		$this->form_validation->set_rules('NamaMenu','Nama Menu','required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		if($this->form_validation->run()==false){
			$result = $this->menu_model->count_enable_menu();
			$subdata['result_enable_menu'] = $result;
			$data['content'] = $this->load->view('admin/menu_add_view',$subdata,TRUE);
			$this->load->view("template_admin/template",$data);
		}else{
			$data = array(
					'NamaMenu' => $this->input->post('NamaMenu'),
					'StatusMenu' => $this->input->post('StatusMenu'),
					'Keterangan' => $this->input->post('Keterangan'),
					'IsiMenu' => $this->input->post('IsiMenu')
					);
			$this->menu_model->insert_menu($data);
			$_SESSION['msg']="Penambahan menu website telah berhasil dilakukan.";
			redirect('admin/menu','refresh');
			}
		}
	
	function edit_menu($KodeMenu=''){
		$data['judul'] = "Edit Menu Website";
		//menampilkan edit menu
		$this->form_validation->set_rules('NamaMenu','Nama Menu','required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$data['judul'] = "Edit Menu Website";
			if($this->form_validation->run()==false){
				$result = $this->menu_model->count_enable_menu();
				$subdata['result_enable_menu'] = $result;
				$result = $this->menu_model->get_detail_menu($KodeMenu);
				$subdata['result_detail_menu'] = $result;
				$data['content'] = $this->load->view('admin/menu_edit_view',$subdata,TRUE);
				$this->load->view("template_admin/template",$data);
			}else{
			//mengambil data menu
			$data = array(
				   'NamaMenu' => $this->input->post('NamaMenu'),
				   'StatusMenu' => $this->input->post('StatusMenu'),
				   'Keterangan' => $this->input->post('Keterangan'),
				   'IsiMenu' => $this->input->post('IsiMenu'),
				   );
			$this->menu_model->update_menu($data,$KodeMenu);
			$_SESSION['msg']="Pengubahan menu website telah berhasil dilakukan.";
			redirect('admin/menu','refresh');
		}	
	}
	
	function delete_menu($KodeMenu){
		//hapus menu
		$this->menu_model->delete_menu($KodeMenu);
		$_SESSION['msg']="Penghapusan menu website telah berhasil dilakukan.";
		redirect('admin/menu','refresh');
	}

}