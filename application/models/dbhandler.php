<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DbHandler extends CI_Model{
	function _construct()
	{
		parent::__construct();
	}

	 public function insertdata($table,$data)
	 {
		$this->load->database();
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	 }
	 public function deletedata($table,$condition)
	 {
		$this->load->database();
	 	$this->db->where($condition);
		$this->db->delete($table);
		return $this->db->affected_rows();
	 }
	 public function  updatedata($table,$data,$where,$content)
	 {
		$this->load->database();
	 	$this->db->where($where,$content);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	 }
	 public function  UD($table,$data,$condition)
	 {
		$this->load->database();
	 	$this->db->where($condition);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	 }
	 public function selectdata($table,$where,$content,$limit,$offset,$ordercol,$orderby)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->limit($limit,$offset);
		$this->db->from($table);
		$this->db->order_by($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	 public function SDU($table,$condition,$range,$order){
		$this->load->database();
		$this->db->where($condition);
		$this->db->limit($range['limit'],$range['offset']);
		$this->db->from($table);
		$this->db->order_by($order['col'],$order['by']);
	 	return $query = $this->db->get()->result();
	 }
	 public function SDUNR($table,$condition,$order){
		$this->load->database();
		$this->db->where($condition);
		$this->db->from($table);
		$this->db->order_by($order['col'],$order['by']);
	 	return $query = $this->db->get()->result();
	 }
	 public function SDSDUNROR($table,$condition,$orfield,$ordata,$order){
		$this->load->database();
		$this->db->where($condition);
		$this->db->where_in($orfield, $ordata);
		$this->db->from($table);
		$this->db->order_by($order['col'],$order['by']);
	 	return $query = $this->db->get()->result();
	}	
	 public function SDSDlike($table,$condition,$range,$order,$like=array(),$orlike=array()){
		$this->load->database();
		$this->db->where($condition);
		if(sizeof($like)>0) $this->db->like($like);
		if(sizeof($orlike)>0) $this->db->or_like($orlike);
		$this->db->limit($range['limit'],$range['offset']);
		$this->db->from($table);
		$this->db->order_by($order['col'],$order['by']);
	 	return $query = $this->db->get()->result();
	}	
	 public function SDSDOR($table,$condition,$range,$orfield,$ordata,$order,$like=array(),$table2="",$eqution="",$or_like=array()){
		$this->load->database();
		$this->db->where($condition);
		if(sizeof($ordata)>0) $this->db->where_in($orfield, $ordata);
		if(sizeof($like)>0) $this->db->like($like);
		if(sizeof($or_like)>0) $this->db->or_like($or_like);
		if($table2!="") $this->db->join($table2,$eqution);
		$this->db->limit($range['limit'],$range['offset']);
		$this->db->from($table);
		$this->db->order_by($order['col'],$order['by']);
	 	return $query = $this->db->get()->result();
	}
	 public function SDSDORG($table,$condition,$range,$orfield,$ordata,$order,$group=array(),$like=array()){
		$this->load->database();
		$this->db->where($condition);
		$this->db->where_in($orfield, $ordata);
		if(sizeof($like)>0) $this->db->like($like);
		$this->db->limit($range['limit'],$range['offset']);
		$this->db->group_by($group); 
		$this->db->from($table);
		$this->db->order_by($order['col'],$order['by']);
	 	return $query = $this->db->get()->result();
	}
	  public function select_all_data_by_order($table,$where,$content,$ordercol,$orderby)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->from($table);
		$this->db->order_by($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	  public function selectdata_no_condition($table,$limit,$offset,$ordercol,$orderby)
	 {
		$this->load->database();
		$this->db->limit($limit,$offset);
		$this->db->from($table);
		$this->db->order_by($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	 public function selectPartData($table,$where,$content)
	 {
		$this->load->database();
		$this->db->where($where,$content);
		$this->db->from($table);
		//$this->db->orderby($ordercol,$orderby);
	 	return $query = $this->db->get()->result();
	 }
	 public function sel_data_by_mul_condition($table,$condition){
		$this->load->database();
		$this->db->where($condition);
		$this->db->from($table);
	 	return $query = $this->db->get()->result();
	 }
	 public function selectAllData($table){
		$this->load->database();
	 	return $query = $this->db->get($table)->result();
	 }
	 public function selectalldatadesc($table,$ordercol,$ordertype="desc")
	 {
		$this->load->database();
		$this->db->from($table);
	 	$this->db->order_by($ordercol,$ordertype);
	 	return $query = $this->db->get()->result();
	 }
	 public function amount_data($table,$where,$content)
	 {
		$this->load->database();
	 	$this->db->where($where,$content);
		$this->db->from($table);
		return $total = $this->db->count_all_results();
	 }
	 public function ADU($table,$condition)
	 {
		$this->load->database();
	 	$this->db->where($condition);
		$this->db->from($table);
		return $total = $this->db->count_all_results();
	 }
	 public function ADUlike($table,$condition,$like=array(),$orlike=array())
	 {
		$this->load->database();
	 	$this->db->where($condition);
		if(sizeof($like)>0) $this->db->like($like);
		if(sizeof($orlike)>0) $this->db->or_like($orlike);
		$this->db->from($table);
		return $total = $this->db->count_all_results();
	 }
	 public function ADUOR($table,$condition,$orfield, $ordata,$like=array())
	 {
		$this->load->database();
	 	$this->db->where($condition);
		if(sizeof($ordata)>0) $this->db->where_in($orfield, $ordata);
		if(sizeof($like)>0) $this->db->like($like);
		$this->db->from($table);
		return $total = $this->db->count_all_results();
	 }
	 public function amount_data_no_condition($table)
	 {
		$this->load->database();
		return $total = $this->db->count_all($table);
	 }

}
?>
