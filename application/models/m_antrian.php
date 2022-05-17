<?php 

class m_apotek extends CI_Model{
	public function tampil_antrian($num,$offset){
		$query = $this->db->get('antrian', $num, $offset);
			return $query->result();
	}
	
	public function input_antrian($data,$table){
		$this->db->insert($table,$data);
	}
	
	public function hapus_antrian($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
	public function edit_obat($where,$table){		
			$this->db->select('*');
			$this->db->from('antrian');
			$this->db->where('no_antrian',$where);
			return $this->db->get();
	}
 
	public function update_antrian($where,$data,$table){
		$this->db->where('no_antrian',$where);
		$this->db->update($table,$data);
	}	
	
	
}