<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Fungsi_bantuan{
	function create_combobox($nama,$arr,$id,$value,$selected="",$atr=""){
		$arr_combobox=array();
		if(!is_array($arr))$arr=array();
		foreach ($arr as $row){
			$arr_combobox[$row->$id] = $row->$value;
		}
		$combo = form_dropdown($nama,$arr_combobox,$selected,$atr);
		return $combo;
	}
	
	function check_session($level=""){
		if(!isset($_SESSION["username"])){
			redirect("home","refresh");
		}else{
			if(is_array($level)){
				if(!in_array($_SESSION['level'],$level)){
					redirect("home/redirect","refresh");
				}
			}else{
				if ($level!=$_SESSION["level"] && $level!=""){
					redirect("home/redirect","refresh");
				}			
			}
		}
	}
	
	function get_daftar_bulan(){
		return array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
	}
}