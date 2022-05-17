<?php 

class m_imigrasi extends CI_Model{
	public function tampil_paspor($num,$offset){
		$query = $this->db->get('paspor',$num,$offset);
			return $query->result();
	}
	
	public function input_paspor($data,$table){
		$this->db->insert($table,$data);
	}
	
	public function hapus_paspor($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
	public function edit_paspor($where,$table){		
			$this->db->select('*');
			$this->db->from('paspor');
			$this->db->where('no_paspor',$where);
			return $this->db->get();
	}
 
	public function update_paspor($where,$data,$table){
		$this->db->where('no_paspor',$where);
		$this->db->update($table,$data);
	}	
	
	
}