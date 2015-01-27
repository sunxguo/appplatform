<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->helper("upload");
		$this->load->model("dbHandler");
	}
	public function index()
	{
		$navs=$this->dbHandler->SDUNR('nav',array("app_id_nav"=>$_GET['appid']),array("col"=>'order_nav',"by"=>'asc'));
		$this->load->view('mobile/home',
			array(
				'showSlider' => true,
				'title' => WEBSITE_NAME."-手机网站",
				'navs'=>$navs
			)
		);
	}
	public function get_nav_info(){
		//$_POST['appid'];
	}

}

/* End of file home.php */
/* Location: ./application/controllers/mobile/home.php */
