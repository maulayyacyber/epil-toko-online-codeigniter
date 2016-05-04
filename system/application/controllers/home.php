<?php
Class Home extends Controller{
	function Home(){
		parent::Controller();
		$this->load->model(array('produk_model','pegawai_model','pelanggan_model','pemasok_model'));
	}
	
	function index(){
		$result = $this->produk_model->get_limit_produk(6);
		$subdata['result_produk'] = $result;
		$data['content'] = $this->load->view('home_view',$subdata,TRUE);
		$this->load->view("template_web/template",$data);
	}
	
	function login(){
		//input hasil masukan login
		$Username = $this->input->post('username');
		$Password = $this->input->post('password');
		//cek dari pelanggan
		if($Username!=""){
			if($Password!=""){ 
				$result_pelanggan = $this->pelanggan_model->login_pelanggan($Username,$Password);
				if($result_pelanggan){
					//$_SESSION['pelanggan'] = '';
					$_SESSION['username'] = $Username;
					$_SESSION['level'] = "pelanggan";
					$_SESSION['kode_user'] = $result_pelanggan[0]->KodePelanggan;
				}else{
					//login admin
					$result_admin = $this->pegawai_model->login_pegawai($Username,$Password);
					//echo $this->db->last_query();
					if($result_admin){
						//buat session untuk admin
						$level = $result_admin[0]->Level;
						$_SESSION['username'] = $Username;
						$_SESSION['level'] = $level;
						$_SESSION['kode_user'] = $result_admin[0]->KodePegawai;
						switch ($level){
							case 'Admin':redirect('admin/pegawai','refresh');break;
							case 'Manajer':redirect('admin/laporan_harian','refresh');break;
							case 'Pegawai':redirect('admin/produk','refresh');break;
						}
					}else{
					 //login gagal
						$_SESSION['msg']='Wrong username or password, please input the right one to continue login.';
					//}
					}
				}
				redirect('home','refresh');
			}
			else{
				$_SESSION['msg']='Please input your password to continue login.';
				redirect('home','refresh');
			}
		}
		else{
			if($Password!=""){	
				$_SESSION['msg']='Please input your username to continue login.';
				redirect('home','refresh');
			}else{
				$_SESSION['msg']='Please input your username and password to continue login.';
				redirect('home','refresh');
			}
		}
	}
	
	function logout(){
			session_unset();
			session_destroy();
			$this->cart->destroy();
			redirect("home","refresh");
		}
}