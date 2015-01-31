<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();
class Market extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->model("dbHandler");
	}
	public function index(){
		$data["marketscroll"]=$this->dbHandler->selectalldatadesc("marketscroll","order_marketscroll","ASC");
		$this->load->view('header',
			array(
				'title' => WEBSITE_NAME."-首页"
			)
		);
		$data["categories"]=$this->get_categories();
		$this->load->view('index', $data);
		$this->load->view('footer');
	}
	public function appcategory(){
		$this->load->view('header',
			array(
				'title' => WEBSITE_NAME."-应用下载",
			)
		);
		$data=array();
		$this->load->view('appcategory', $data);
		$this->load->view('footer');
	}
	public function appunion(){
		$this->load->view('header',
			array(
				'title' => WEBSITE_NAME."-应用专题",
			)
		);
		$data=array();
		$this->load->view('appunion', $data);
		$this->load->view('footer');
	}
	public function app(){
		$this->load->view('header',
			array(
				'title' => WEBSITE_NAME."-应用下载",
			)
		);
		$data=array();
		$this->load->view('app', $data);
		$this->load->view('footer');
	}
	public function get_categories(){
		 return $this->dbHandler->selectalldatadesc("category","id_category","ASC");
	}
}
?>