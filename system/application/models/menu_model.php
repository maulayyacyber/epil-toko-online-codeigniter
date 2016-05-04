<?php
Class Menu_model extends Model{
	function Menu_model(){
		parent::Model();
	}
	
	function get_menu(){
		$query = $this->db->get('menu');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function get_detail_menu($KodeMenu){
		$this->db->where('KodeMenu',$KodeMenu); 
		$query = $this->db->get('menu');
		return $query->result();
	}
	
	function insert_menu($data){
		$this->db->insert('menu',$data);
	}
	
	function update_menu($data,$KodeMenu){
		$this->db->where('KodeMenu',$KodeMenu);
		$this->db->update('menu',$data);
	}
	
	function delete_menu($KodeMenu){
		$this->db->where('KodeMenu',$KodeMenu);
		$this->db->delete('menu');
	}

	function show_menu($KodeMenu){
		$this->db->where('KodeMenu',$KodeMenu);
		$query = $this->db->get('menu');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function get_menu_aktif(){
		$this->db->where("StatusMenu","Enable");
		$query = $this->db->get('menu');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		};
	}
	
	function count_enable_menu(){
		$this->db->where("StatusMenu","Enable");
		return $this->db->count_all_results('menu');
	}
	
}