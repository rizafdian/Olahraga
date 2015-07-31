<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {
	public function UpdateData($tabelName,$data,$where){
        $res = $this->db->update($tabelName,$data,$where);
        return $res;
    }
    public function GetAtlit($where=""){
		$data = $this->db->query("select * from atlit".$where);
		return $data->result_array();
	}

	public function GetData($tabelName,$data){
		$res = $this->db->select($tabelName,$data);
		return $res;
	}

	public function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	public function UpdateAtlit($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;	
	}
	public function DeleteData($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}
	    public function GetPelatih($where=""){
		$data = $this->db->query("select * from pelatih".$where);
		return $data->result_array();
	}

	public function GetDataPelatih($tabelName,$data){
		$res = $this->db->select($tabelName,$data);
		return $res;
	}

	public function InsertPelatih($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	public function UpdatePelatih($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;	
	}
	public function DeletePelatih($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}
	    public function GetAdmin($where=""){
		$data = $this->db->query("select * from admin".$where);
		return $data->result_array();
	}

	public function GetDataAdmin($tabelName,$data){
		$res = $this->db->select($tabelName,$data);
		return $res;
	}

	public function InsertAdmin($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	public function UpdateAdmin($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;	
	}
	public function DeleteAdmin($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}

	public function GetcbOlahraga($where=""){
		$data = $this->db->query("select * from cb_olahraga".$where);
		return $data->result_array();
	}

	public function GetDatacbOlahraga($tabelName,$data){
		$res = $this->db->select($tabelName,$data);
		return $res;
	}

	public function InsertcbOlahraga($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	public function UpdatecbOlahraga($tabelName,$data,$where){
		$res = $this->db->update($tabelName,$data,$where);
		return $res;	
	}
	public function DeletecbOlahraga($tabelName,$where){
		$res = $this->db->delete($tabelName,$where);
		return $res;
	}
}