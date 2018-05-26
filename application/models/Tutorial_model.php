<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial_model extends CI_Model {


	public function insertTutorial()
	{
		$idUser = $this->getUser($where);
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'deskripsi' => $this->input->post('deskripsi'),
						'idUser' => $this->input->post('$idUser'),  
						'foto_tutorial' => $this->upload->data('file_name'));
		$this->db->insert('tutorial',$object);
	}

	public function getDataTutorial()
	{
		$query = $this->db->get('tutorial');
		return $query->result();	
	}

	public function getTutorial($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('tutorial');
		return $query->result();
	}

	public function updateById($id)
	{
		$idUser = $this->getUser($where);
		$object = array('nama_tutorial' => $this->input->post('nama_tutorial'),
						'deskripsi' => $this->input->post('deskripsi'),
						'foto_tutorial' => $this->upload->data('file_name'),
						'idUser' => $this->input->post('$idUser'));
		$this->db->where('id',$id);
		$this->db->update('tutorial', $object);
	}

	public function deleteById($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->delete('tutorial');
	}

	public function list($limit, $start)
    {
        // $this->db->limit($limit, $start);
        $query = $this->db->get('tutorial', $limit, $start);
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	
	public function getUser($where)
	{
		$this->db->select('*')    
          	 ->from('tutorial t')
             ->join('user u', 'u.idUser=t.idUser','left')
             ->where('u.idUser',$where);
    	$query =$this->db->get();
    	return $query->result();
	}

	public function getTotal()
    {
        return $this->db->count_all('tutorial');
    }

	public function cari($keyword)
    {
    	$keyword    =   $this->input->post('cari'); 
        $query = $this->db->query("SELECT * FROM tutorial WHERE nama_tutorial LIKE '%$keyword%'");
        $this->db->like('nama_tutorial', $keyword);
        return $query->result();
    }    

}

/* End of file Pegawai_model.php */
/* Location: ./application/models/Pegawai_model.php */