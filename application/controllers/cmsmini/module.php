<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();

class Module extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->helper("upload");
		$this->load->helper("phpqrcode");
		$this->load->model("dbHandler");
		$this->language();
	}
	public function language(){
		$this->load->helper('language');
		if(isset($_SESSION['language'])){
			if($_SESSION['language']=="english"){
				$this->config->set_item('language', 'english');
				$this->load->language('cms','english');
				return true;
			}elseif($_SESSION['language']=="tw_cn"){
				$this->config->set_item('language', 'tw_cn');
				$this->load->language('cms','tw_cn');
				return true;
			}else{
				$this->config->set_item('language', 'zh_cn');
				$this->load->language('cms','zh_cn');
				return true;
			}
		}
		//判断浏览器语言
		$default_lang_arr = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
		$strarr = explode(",",$default_lang_arr);
		$default_lang = $strarr[0];
//		echo '1'.$default_lang;
		$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); //只取前4位，这样只判断最优先的语言。如果取前5位，可能出现en,zh的情况，影响判断。  
		if (preg_match("/en/i", $lang)){ 
			$this->config->set_item('language', 'english');
			// 根据设置的语言类型加载语言包
			$this->load->language('cms','english');
		}
		elseif (preg_match("/zh-c/i", $lang)){
			$this->config->set_item('language', 'zh_cn');
			$this->load->language('cms','zh_cn');
		}
		elseif (preg_match("/zh/i", $lang)){ 
			$this->config->set_item('language', 'tw_cn');
			$this->load->language('cms','tw_cn');
		}else{
			$this->config->set_item('language', 'zh_cn');
			$this->load->language('cms','zh_cn');
		}
/*		// 根据浏览器类型设置语言
		if( $default_lang == 'en-us' || $default_lang == 'en'){
			$this->config->set_item('language', 'english');
			// 根据设置的语言类型加载语言包
			$this->load->language('cms','english');
		}elseif( $default_lang == 'en-us' || $default_lang=='zh-CN'){
			$this->config->set_item('language', 'zh_cn');
			$this->load->language('cms','zh_cn');
		}
		// 当前语言
		echo $this->config->item('language');*/
	}
	public function set_language(){
		$_SESSION['language']=$_POST['language'];
	}
/*	public function test(){
		echo twoDimensionCode("bbbbb",1212,"/uploads/image/20150107/20150107151144_45678.jpg");
	}*/
	public function checkMerchantLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "merchant")) {
			$this->load->view('redirect',array("url"=>"/cmsmini/index/login","info"=>"请先登录商户账号"));
			return false;
		}else return true;
	}
	public function index()
	{
		$this->checkMerchantLogin();
		//$total=$this->dbHandler->amount_data_no_condition($table);
		$byMerchantId=(isset($_SESSION['Fuserid']) && $_SESSION['Fuserid']!="")?$_SESSION['Fuserid']:$_SESSION['userid'];
		$apps=$this->dbHandler->SDUNR('app',array("merchant_id_app"=>$byMerchantId),array("col"=>'update_time_app',"by"=>'desc'));
		$navs=$this->dbHandler->SDUNR('nav',array("app_id_nav"=>$apps[0]->id_app),array("col"=>'order_nav',"by"=>'asc'));
		if(isset($_GET['nav'])){
			$currentNav=$this->dbHandler->selectPartData('nav','id_nav',$_GET['nav']);
			$currentNav=$currentNav[0];
		}else{
			$currentNav=$navs[0];
		}
		$view='cmsmini/module/';
		$data=array('nav'=>$currentNav);
		$navArray=array();
		foreach($navs as $key=>$nav){
			$navArray[$nav->id_nav]=$nav->name_nav;
		}
		$data['navArray']=$navArray;
		//1://固定页面2://固定二级页面3://文章列表4://表单页5://商城6://链接
		switch($currentNav->type_nav){
			case 1:
				$view.='content';
				$result=$this->dbHandler->selectPartData('content','navid_content',$currentNav->id_nav);
				$data['content']=$result[0];
			break;
			case 2:
				$view.='subNavList';
				$result=$this->dbHandler->selectPartData('subnav','navid_subnav',$currentNav->id_nav);
				$data['subNavs']=$result;
			break;
			case 3:
				$view.='essayList';
				$amount=0;//总条数
				$limit=30;//每页显示
				$page_amount=0;//总页数
				$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
				$condition=array();
				if(isset($_GET['state']) && $_GET['state']=="draft") $condition["state_essay"]=1;
				elseif(isset($_GET['state']) && $_GET['state']=="delete") $condition["state_essay"]=2;
				elseif(isset($_GET['state']) && $_GET['state']=="normal") $condition["state_essay"]=0;
				if(isset($_GET['search']) && $_GET['search']!="") $like["title_essay"]=$_GET['search'];
				else $like=array();
//				$amount=$this->dbHandler->ADUOR('essay',array('navid_essay'=>$currentNav->id_nav),"navid_essay",array(),array());
				$amount=$this->dbHandler->ADUOR('essay',$condition,"navid_essay",array($currentNav->id_nav),$like);
				$page_amount=ceil($amount/$limit);
				if($page>$page_amount) $page=1;
				$offset=($page-1)*$limit;
//				$result=$this->dbHandler->selectPartData('essay','navid_essay',$currentNav->id_nav);
				$result=$this->dbHandler->SDSDOR('essay',$condition,array("limit"=>$limit,"offset"=>$offset),"navid_essay",array($currentNav->id_nav),array("col"=>'lasttime_essay',"by"=>'desc'),$like);
				$data['essays']=$result;
				$baseUrl='/cmsmini/module?nav='.$currentNav->id_nav;
				$data['prev_link']=$page>1?$baseUrl."&page=".($page-1):"no";
				$data['next_link']=$page<$page_amount?$baseUrl."&page=".($page+1):"no";
				$data['first_link']=($page!=1)?$baseUrl."&page=1":"no";
				$data['last_link']=($page!=$page_amount)?$baseUrl."&page=".$page_amount:"no";
				$data['jump_link']=$baseUrl."&page=";
				$data['select_link']=$baseUrl;
				$data['page']=$page;
				$data['amount']=$amount;
				$data['page_amount']=$page_amount;
			break;
			case 4:
				$view.='formList';
				$result=$this->dbHandler->selectPartData('form','navid_form',$currentNav->id_nav);
				foreach($result as $item){
					$item->formData=$this->dbHandler->selectPartData('formdata','formid_formdata',$item->id_form);
				}
				$data['forms']=$result;
			break;
			case 5:
				$view.='productList';
				$amount=0;//总条数
				$limit=30;//每页显示
				$page_amount=0;//总页数
				$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
				$condition=array();
				if(isset($_GET['state']) && $_GET['state']=="draft") $condition["state_essay"]=1;
				elseif(isset($_GET['state']) && $_GET['state']=="delete") $condition["state_essay"]=2;
				elseif(isset($_GET['state']) && $_GET['state']=="normal") $condition["state_essay"]=0;
				if(isset($_GET['search']) && $_GET['search']!="") $like["name_product"]=$_GET['search'];
				else $like=array();
//				$amount=$this->dbHandler->ADUOR('essay',array('navid_essay'=>$currentNav->id_nav),"navid_essay",array(),array());
				$amount=$this->dbHandler->ADUOR('product',$condition,"navid_product",array($currentNav->id_nav),$like);
				$page_amount=ceil($amount/$limit);
				if($page>$page_amount) $page=1;
				$offset=($page-1)*$limit;
//				$result=$this->dbHandler->selectPartData('essay','navid_essay',$currentNav->id_nav);
				$result=$this->dbHandler->SDSDOR('product',$condition,array("limit"=>$limit,"offset"=>$offset),"navid_product",array($currentNav->id_nav),array("col"=>'lasttime_product',"by"=>'desc'),$like);
				$data['products']=$result;
				$baseUrl='/cmsmini/module?nav='.$currentNav->id_nav;
				$data['prev_link']=$page>1?$baseUrl."&page=".($page-1):"no";
				$data['next_link']=$page<$page_amount?$baseUrl."&page=".($page+1):"no";
				$data['first_link']=($page!=1)?$baseUrl."&page=1":"no";
				$data['last_link']=($page!=$page_amount)?$baseUrl."&page=".$page_amount:"no";
				$data['jump_link']=$baseUrl."&page=";
				$data['select_link']=$baseUrl;
				$data['page']=$page;
				$data['amount']=$amount;
				$data['page_amount']=$page_amount;
			break;
		}
		$this->load->view('cmsmini/header',
			array(
				'showSlider' => true,
				'panelModule' => true,
				'navs'=>$navs,
				'nav'=>$currentNav,
				'title' => lang('cms_website_name')."-".lang('cms_sider_home')
			)
		);
		$this->load->view($view, $data);
		$this->load->view('cmsmini/footer');
	}
	public function addEssay(){
		
	}

//		$this->log("修改导航".($nav->name_nav));
	public function log($log){
		$info=array(
			"time_log"=>date("Y-m-d H:i:s"),
			"operation_log"=>$log
		);
		$info["merchant_log"]=isset($_SESSION["userid"])?$_SESSION["userid"]:0;
		$result=$this->dbHandler->insertdata("log",$info);
	}
}

/* End of file index.php */
/* Location: ./application/controllers/cmsmini/index.php */
?>