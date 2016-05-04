<?php
Class Otentikasi_model extends Model{
	function Otentikasi_model(){
		parent::Model();
	}
	
	function login($Username,$Password){
		$this->db->where('Username',$Username);		
		$this->db->where('Password',$Password);
			
		return $query->result();
		
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
}