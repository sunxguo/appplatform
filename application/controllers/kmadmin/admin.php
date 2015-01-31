<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->model("dbHandler");
	}
	public function checkAdminLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "admin")) {
			$this->load->view('redirect',array("url"=>"/kmadmin/admin/login","info"=>"请先登录管理员账号"));
			return false;
		}else return true;
	}
	public function index()
	{
		//$total=$this->dbHandler->amount_data_no_condition($table);
		$this->checkAdminLogin();
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'title' => WEBSITE_NAME."-后台管理系统",
			)
		);
		$data=array();
		$this->load->view('kmadmin/index', $data);
		$this->load->view('kmadmin/footer');
	}
	public function account()
	{
		$this->checkAdminLogin();
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'title' => WEBSITE_NAME."-后台管理系统",
			)
		);
		$this->load->view('kmadmin/account');
		$this->load->view('kmadmin/footer');
	}
	
	public function market_home(){
		$this->checkAdminLogin();
		$marketscroll=$this->dbHandler->selectalldatadesc("marketscroll","order_marketscroll","ASC");
		//print_r($marketscroll);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-首页滚动图片-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_home',array("scroll"=>$marketscroll));
		$this->load->view('kmadmin/footer');
	}
	public function market_ad(){
		$this->checkAdminLogin();
		$ad=$this->dbHandler->selectalldatadesc("marketad","id_marketad","ASC");
		//print_r($marketscroll);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-首页滚动图片右侧-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_ad',array("ad"=>$ad[0]));
		$this->load->view('kmadmin/footer');
	}
	
	public function get_info_return($info_type,$id){
		switch($info_type){
			case 'app':
				$table="app";
				$where="id_app";
				$content=$id;
			break;
			case 'message':
				$table="message";
				$where="id_message";
				$content=$id;
			break;
			case 'merchant':
				$table="merchant";
				$where="id_merchant";
				$content=$id;
			break;
			case 'marketunion':
				$table="marketunion";
				$where="special_marketunion";
				$content=$id;
			break;
		}
		$result=$this->dbHandler->selectPartData($table,$where,$content);
		if(sizeof($result) >0) return $result[0];
		else return new stdClass();
	}
/*	public function get_special_union($special_num){
		$ad=$this->dbHandler->selectPartData("marketunion","id_marketunion",$special_num);
		return $ad[0];
	}*/
	public function market_necessity(){
		$this->checkAdminLogin();
		$necessity=$this->get_union_data(1);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-首页专辑必备-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_necessity',
			array(
				"necessity"=>$necessity,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_selection(){
		$this->checkAdminLogin();
		$selection=$this->get_union_data(2);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-首页精选应用-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_selection',
			array(
				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_softdown_life(){
		$this->checkAdminLogin();
		$selection=$this->get_union_data(3);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-生活-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_softdown_life',
			array(
				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_softdown_news(){
		$this->checkAdminLogin();
		$selection=$this->get_union_data(4);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-新闻-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_softdown_news',
			array(
				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_softdown_joy(){
		$this->checkAdminLogin();
		$selection=$this->get_union_data(5);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-娱乐-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_softdown_joy',
			array(
				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_softdown_shopping(){
		$this->checkAdminLogin();
		$selection=$this->get_union_data(6);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-购物-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_softdown_shopping',
			array(
				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_recommend(){
		$this->checkAdminLogin();
		$selection=$this->get_union_data(7);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'recommend' => true,
				'title' => WEBSITE_NAME."-推荐-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_recommend',
			array(
				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()
			));
		$this->load->view('kmadmin/footer');
	}
	
	public function market_select_union(){
		$this->checkAdminLogin();
		$condition=array("special_marketunion"=>0,"home_marketunion"=>1);
		$order=array("col"=>"id_marketunion","by"=>"desc");
		$select_union=$this->dbHandler-> SDUNR("marketunion",$condition,$order);
		foreach($select_union as $u){
			if(isset($u->appidarray_marketunion) && is_array(json_decode($u->appidarray_marketunion))){
				foreach(json_decode($u->appidarray_marketunion) as $key=>$a){
					$u->app[$key]=$this->get_info_return("app",$a->appid);
				}
			}else $u->app=array();
		}
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'home' => true,
				'title' => WEBSITE_NAME."-精选专题-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_select_union',
			array(
				"select_union"=>$select_union
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_union(){
		$this->checkAdminLogin();
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$orlike=$like=array();
		$amount=0;//总条数
		$limit=5;//每页显示
		if(isset($_GET['search']) && $_GET['search']!=""){
			$like["name_marketunion"]=$_GET['search'];
			$orlike["description_merchant"]=$_GET['search'];
		}
		else $like=array();
		$condition=array("special_marketunion"=>0);
		$amount=$this->dbHandler->ADUlike('marketunion',$condition,$like,$orlike);
		$page_amount=ceil($amount/$limit);//总页数
		if($page>$page_amount) $page=1;
		$offset=($page-1)*$limit;
		$marketunion=$this->dbHandler->SDSDlike('marketunion',$condition,array("limit"=>$limit,"offset"=>$offset),array("col"=>'id_marketunion',"by"=>'desc'),$like,$orlike);
		foreach($marketunion as $u){
			if(isset($u->appidarray_marketunion) && is_array(json_decode($u->appidarray_marketunion))){
				foreach(json_decode($u->appidarray_marketunion) as $key=>$a){
					$u->app[$key]=$this->get_info_return("app",$a->appid);
				}
			}else $u->app=array();
		}
		$ex_url="";
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/kmadmin/admin/market_union?page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/kmadmin/admin/market_union?page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/kmadmin/admin/market_union?page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/kmadmin/admin/market_union?page=".$page_amount.$ex_url:"no";
		$jump_link="/kmadmin/admin/market_union?jump=1".$ex_url."&page=";
		$select_link="/kmadmin/admin/market_union?jump=1";
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'union' => true,
				'title' => WEBSITE_NAME."-专题管理-后台管理系统",
			)
		);
		$start=$page>3?$page-2:1;
		$end=($page+2)<=$page_amount?$page+2:$page_amount;
		$this->load->view('kmadmin/market_union',
			array(
				"marketunion"=>$marketunion,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state(),
				"prev_link"=>$prev_link,
				"next_link"=>$next_link,
				"first_link"=>$first_link,
				"jump_link"=>$jump_link,
				"last_link"=>$last_link,
				"select_link"=>$select_link,
				"page"=>$page,
				"page_amount"=>$page_amount,
				"amount"=>$amount,
				"start"=>$start,
				"end"=>$end
			));
		$this->load->view('kmadmin/footer');
	}
	public function market_newunion(){
		$this->checkAdminLogin();
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'market' => true,
				'union' => true,
				'title' => WEBSITE_NAME."-新专题-后台管理系统",
			)
		);
		$this->load->view('kmadmin/market_newunion',
			array(
/*				"selection"=>$selection,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state()*/
			));
		$this->load->view('kmadmin/footer');
	}
	public function get_union_data($special){
		$selection=$this->get_info_return("marketunion",$special);
		$data=isset($selection->appidarray_marketunion)?json_decode($selection->appidarray_marketunion):null;
		if(isset($data)){
			foreach($data as $key=>$a){
				$app=$this->get_info_return("app",$a->appid);
				$merchant=$this->get_info_return("merchant",$app->merchant_id_app);
				$selection->app[$key]=$app;
				$selection->app[$key]->merchant=$merchant;
			}
		}else $selection->app=array();
		return $selection;
	}
	public function login(){
		$this->load->view('kmadmin/login',array('title'=>"管理员登录"));
	}
	/**
	 ** 应用管理
	 **/
	public function app(){
		$this->checkAdminLogin();
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$app=array();
		$amount=0;//总条数
		$limit=30;//每页显示
		$page_amount=0;//总页数
		$condition=array();
		if(isset($_GET['cat']) && is_numeric($_GET['cat'])) $condition["cat_app"]=$_GET['cat'];
		if(isset($_GET['merchant']) && is_numeric($_GET['merchant'])) $condition["merchant_id_app"]=$_GET['merchant'];
		if(isset($_GET['state']) && is_numeric($_GET['state'])) $condition["state_app"]=$_GET['state'];
		if(isset($_GET['search']) && $_GET['search']!="") $like["name_essay"]=$_GET['search'];
		else $like=array();
		$amount=$this->dbHandler->ADUOR('app',$condition,"<app>",array(),$like);
		$page_amount=ceil($amount/$limit);
		if($page>$page_amount) $page=1;
		$offset=($page-1)*$limit;
		$app=$this->dbHandler->SDSDOR('app',$condition,array("limit"=>$limit,"offset"=>$offset),"<app>",array(),array("col"=>'update_time_app',"by"=>'desc'),$like,"merchant","merchant_id_app=id_merchant");
		//print_r($app);
		$ex_url="";
		if(isset($_GET["cat"]))$ex_url.="&cat=".$_GET["cat"];
		if(isset($_GET["state"]))$ex_url.="&state=".$_GET["state"];
		if(isset($_GET["merchant"]))$ex_url.="&merchant=".$_GET["merchant"];
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/kmadmin/admin/app?page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/kmadmin/admin/app?page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/kmadmin/admin/app?page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/kmadmin/admin/app?page=".$page_amount.$ex_url:"no";
		$jump_link="/kmadmin/admin/app?jump=1".$ex_url."&page=";
		$select_link="/kmadmin/admin/app?jump=1";
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'app' => true,
				'title' => WEBSITE_NAME."-应用管理-后台管理系统",
			)
		);
		$this->load->view('kmadmin/applist',
			array(
				"app"=>$app,
				"category"=>$this->get_category(),
				"state"=>$this->get_app_state(),
				"prev_link"=>$prev_link,
				"next_link"=>$next_link,
				"first_link"=>$first_link,
				"jump_link"=>$jump_link,
				"last_link"=>$last_link,
				"select_link"=>$select_link,
				"page"=>$page,
				"page_amount"=>$page_amount,
				"amount"=>$amount
			));
		$this->load->view('kmadmin/footer');
	}
	public function get_category(){
		$category=$this->dbHandler->selectAllData("category");
		$new_cat=array();
		foreach($category as $cat){
			$new_cat[$cat->id_category]=$cat->name_category;
		}
		return $new_cat;
	}
	//0未生成1生成中2已生成3待发布4发布审核中5已发布6发布审核不通过7删除
	public function get_app_state(){
		$state=array(
			"0"=>"未生成",
			"1"=>"生成中",
			//"2"=>"已生成",
			"3"=>"待发布",
			"4"=>"发布审核中",
			"5"=>"已发布",
			"6"=>"发布审核不通过",
			"7"=>"删除"
		);
		return $state;
	}
	// 商户管理
	public function merchant(){
		$this->checkAdminLogin();
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$users=array();
		$orlike=array();
		$amount=0;//总条数
		$limit=30;//每页显示
		$page_amount=0;//总页数
		
		$condition=array();
		if(isset($_GET['state']) && $_GET['state']=="freeze") $condition["state_merchant"]=1;
		elseif(isset($_GET['state']) && $_GET['state']=="normal") $condition["state_merchant"]=0;
		if(isset($_GET['gender']) && $_GET['gender']=="male") $condition["gender_merchant"]=0;
		elseif(isset($_GET['gender']) && $_GET['gender']=="female") $condition["gender_merchant"]=1;
		elseif(isset($_GET['gender']) && $_GET['gender']=="unknown") $condition["gender_merchant"]=2;
		if(isset($_GET['search']) && $_GET['search']!=""){
			$like["username_merchant"]=$_GET['search'];
			$orlike["corporation_merchant"]=$_GET['search'];
		}
		else $like=array();
		$amount=$this->dbHandler->ADUlike('merchant',$condition,$like,$orlike);
		$page_amount=ceil($amount/$limit);
		if($page>$page_amount) $page=1;
		$offset=($page-1)*$limit;
		$merchant=$this->dbHandler->SDSDlike('merchant',$condition,array("limit"=>$limit,"offset"=>$offset),array("col"=>'lasttime_merchant',"by"=>'desc'),$like,$orlike);
		
		$ex_url="";
		if(isset($_GET["state"]))$ex_url.="&state=".$_GET["state"];
		if(isset($_GET["gender"]))$ex_url.="&gender=".$_GET["gender"];
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/kmadmin/admin/merchant?page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/kmadmin/admin/merchant?page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/kmadmin/admin/merchant?page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/kmadmin/admin/merchant?page=".$page_amount.$ex_url:"no";
		$jump_link="/kmadmin/admin/merchant?jump=1".$ex_url."&page=";
		$select_link="/kmadmin/admin/merchant?jump=1";
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'merchant' => true,
				'title' => WEBSITE_NAME."-商户管理-后台管理系统",
			)
		);
		$this->load->view('kmadmin/merchantlist',
			array(
				"merchant"=>$merchant,
				"prev_link"=>$prev_link,
				"next_link"=>$next_link,
				"first_link"=>$first_link,
				"jump_link"=>$jump_link,
				"last_link"=>$last_link,
				"select_link"=>$select_link,
				"page"=>$page,
				"page_amount"=>$page_amount,
				"amount"=>$amount
			));
		$this->load->view('kmadmin/footer');
	}
	public function message(){
		$this->checkAdminLogin();
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$message=array();
		$orlike=array();
		$amount=0;//总条数
		$limit=30;//每页显示
		$page_amount=0;//总页数
		
		$condition=array();
		$type=0;
		if(isset($_GET['to']) && $_GET['to']=="all") $condition["to_message"]=0;
		if(isset($_GET['type']) && is_numeric($_GET['type'])){
			$condition["type_message"]=$_GET['type'];
			$type=$_GET['type'];
		}else $condition["type_message"]=$type;
		if(isset($_GET['search']) && $_GET['search']!=""){
			$like["title_message"]=$_GET['search'];
			$orlike["msg_message"]=$_GET['search'];
		}
		else $like=array();
		$amount=$this->dbHandler->ADUlike('message',$condition,$like,$orlike);
		$page_amount=ceil($amount/$limit);
		if($page>$page_amount) $page=1;
		$offset=($page-1)*$limit;
		if($type==1)
			$message=$this->dbHandler->SDSDOR('message',$condition,array("limit"=>$limit,"offset"=>$offset),"<app>",array(),array("col"=>'time_message',"by"=>'desc'),$like,"merchant","to_message=id_merchant");
		else 
			$message=$this->dbHandler->SDSDlike('message',$condition,array("limit"=>$limit,"offset"=>$offset),array("col"=>'time_message',"by"=>'desc'),$like,$orlike);
		$ex_url="";
		if(isset($_GET["to"]))$ex_url.="&to=".$_GET["to"];
		if(isset($_GET["type"]))$ex_url.="&type=".$_GET["type"];
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/kmadmin/admin/message?page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/kmadmin/admin/message?page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/kmadmin/admin/message?page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/kmadmin/admin/message?page=".$page_amount.$ex_url:"no";
		$jump_link="/kmadmin/admin/message?jump=1".$ex_url."&page=";
		$select_link="/kmadmin/admin/message?jump=1";
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'message' => true,
				'title' => WEBSITE_NAME."-消息管理-后台管理系统",
			)
		);
		$this->load->view('kmadmin/msglist',
			array(
				"message"=>$message,
				"prev_link"=>$prev_link,
				"next_link"=>$next_link,
				"first_link"=>$first_link,
				"jump_link"=>$jump_link,
				"last_link"=>$last_link,
				"select_link"=>$select_link,
				"page"=>$page,
				"page_amount"=>$page_amount,
				"amount"=>$amount
			));
		$this->load->view('kmadmin/footer');
	}
	public function sendmsg(){
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'message' => true,
				'title' => WEBSITE_NAME."-发送消息-后台管理系统",
			)
		);
		$this->load->view('kmadmin/sendmsg',
			array(
				//"message"=>$message
			));
		$this->load->view('kmadmin/footer');
	}
	public function ad(){
		$ad=$this->dbHandler->selectPartData('ad','position_ad',1);
		$this->load->view('kmadmin/header',
			array( 
				'showSlider' => true,
				'ad' => true,
				'title' => WEBSITE_NAME."-广告管理-后台管理系统",
			)
		);
		$this->load->view('kmadmin/ad',
			array(
				"ad"=>$ad[0]
			));
		$this->load->view('kmadmin/footer');
	}
	
	public function add_info(){
		switch($_POST['info_type']){
			case "message":
				$table="message";
				$info=array(
					"type_message"=>$_POST["type"],
					"from_message"=>$_SESSION["userid"],
					"to_message"=>($_POST["to"]!="" && is_numeric($_POST["to"]))?$_POST["to"]:0 ,
					"device_message"=>$_POST["device"],
					"title_message"=>$_POST["title"],
					"msg_message"=>$_POST["msg"],
					"time_message"=>date("Y-m-d H:i:s"),
					"check_message"=>0
				);
			break;
			case "scroll":
				$table="marketscroll";
				$info=array(
					"src_marketscroll"=>$_POST["src"],
					"order_marketscroll"=>$_POST["order"]
				);
			break;
			case "union":
				$table="marketunion";
				$info=array(
					"img_marketunion"=>$_POST["img"],
					"name_marketunion"=>$_POST["name"],
					"description_marketunion"=>$_POST["description"]
				);
			break;
		}
		$result=$this->dbHandler->insertdata($table,$info);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	public function login_handler(){
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$info=$this->dbHandler->selectPartData('admin','username_admin',$_POST["username"]);
			if(count($info,0)==1){
				$post_pwd=MD5("kmkj".$_POST["pwd"]);
				$db_pwd=$info[0]->pwd_admin;
				if($post_pwd==$db_pwd){
					$_SESSION['username']=$info[0]->username_admin;
					$_SESSION['userid']=$info[0]->id_admin;
					$_SESSION['usertype']="admin";
					$this->load->view('redirect',array("url"=>"/kmadmin/admin/index"));
				}
				else{
					$this->load->view('redirect',array("info"=>"密码错误"));
				}
			}
			else{
				$this->load->view('redirect',array("info"=>"用户名不存在"));
			}
		}else{
			$this->load->view('redirect',array("info"=>"请输入用户名和密码"));
		}
	}
	public function logout(){
		unset($_SESSION["username"]);
		unset($_SESSION["userid"]);
		unset($_SESSION["usertype"]);
		$this->load->view('redirect',array("url"=>"/kmadmin/admin/login"));
	}
	public function modify(){
		$data=array();
		$is_modify=true;
		$message="";
		switch($_POST['modifytype']){
			case "adminpwd":
			$info=$this->dbHandler->selectPartData('admin','username_admin',$_SESSION["username"]);
			if(MD5("kmkj".$_POST["oldpwd"])==$info[0]->pwd_admin){
				$data=array('username_admin'=>$_POST["username"],'pwd_admin'=>MD5("kmkj".$_POST["newpwd"]));
			}else{
				$is_modify=false;
				$message="输入密码错误";
			}
			$table="admin";
			$where="id_admin";
			break;
			case "merchantpwd":
			$info=$this->dbHandler->selectPartData('merchant','id_merchant',$_SESSION["userid"]);
			if(MD5("kmkj".$_POST["oldpwd"])==$info[0]->pwd_merchant){
				$data=array('username_merchant'=>$_POST["username"],'pwd_merchant'=>MD5("kmkj".$_POST["newpwd"]));
			}else{
				$is_modify=false;
				$message="输入密码错误";
			}
			$table="merchant";
			$where="id_merchant";
			break;
		}
		if($is_modify){
			$result=$this->dbHandler->updatedata($table,$data,$where,$_SESSION["userid"]);
			if($result==1) echo json_encode(array("result"=>"success","message"=>"修改成功"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>$message));
		}
	}
	public function modify_info(){
		switch($_POST['info_type']){
			case "merchant_freeze":
				$table="merchant";
				$info=array(
					"state_merchant"=>1
				);
				$where="id_merchant";
				$content=$_POST['merchantid'];
			break;
			case "merchant_re":
				$table="merchant";
				$info=array(
					"state_merchant"=>0
				);
				$where="id_merchant";
				$content=$_POST['merchantid'];
			break;
			case "merchant_delete":
				$table="merchant";
				$info=array(
					"state_merchant"=>2
				);
				$where="id_merchant";
				$content=$_POST['merchantid'];
			break;
			case "app_permission":
				$table="app";
				$info=array(
					"perid_app"=>$_POST['permission']
				);
				$where="id_app";
				$content=$_POST['appid'];
			break;
			case "ad":
				$table="ad";
				$info=array(
					"img_ad"=>$_POST['img'],
					"content_ad"=>$_POST['content'],
				);
				$where="position_ad";
				$content=$_POST['position'];
			break;
			case "scroll_order":
				$table='marketscroll';
				if($_POST['direction']=="forward") $dst_order=$_POST['order']-1;
				else $dst_order=$_POST['order']+1;
				$info=$this->dbHandler->UD('marketscroll',array("order_marketscroll"=>$_POST['order']),array("order_marketscroll"=>$dst_order));
				$info=array(
					"order_marketscroll"=>$dst_order
				);
				$where="id_marketscroll";
				$content=$_POST['scrollid'];
			break;
			case "scroll_data":
				$table="marketscroll";
				$info=array(
					"link_marketscroll"=>$_POST['link'],
					"title_marketscroll"=>$_POST['title'],
				);
				$where="id_marketscroll";
				$content=$_POST['scrollid'];
			break;
			case "scroll_img":
				$table="marketscroll";
				$info=array(
					"src_marketscroll"=>$_POST['src']
				);
				$where="id_marketscroll";
				$content=$_POST['scrollid'];
			break;
			case "ad_img":
				$table="marketad";
				$info=array(
					"src_marketad"=>$_POST['src']
				);
				$where="id_marketad";
				$content=$_POST['adid'];
			break;
			case "ad_data":
				$table="marketad";
				$info=array(
					"link_marketad"=>$_POST['link'],
					"title_marketad"=>$_POST['title'],
				);
				$where="id_marketad";
				$content=$_POST['adid'];
			break;
			case "union_apparray":
				$table="marketunion";
	//			$union=$this->get_info_return("marketunion",$_POST['unionid']);
				$union=$this->dbHandler->selectPartData("marketunion","id_marketunion",$_POST['unionid']);
				$union=$union[0];
				//echo $union->appidarray_marketunion;
				$apparray=json_decode($union->appidarray_marketunion);
				if($_POST['type']=="add"){
					$is_has=false;
					if(isset($apparray)){
						foreach($apparray as $value){
							if(isset($value->appid) && $value->appid==$_POST['appid']){
								$is_has=true;
							}
						}
					}
					if(!$is_has){
						$acount=sizeof($apparray);
						$apparray[$acount]["appid"]=$_POST['appid'];
					}
				}elseif($_POST['type']=="drop"){
					if(isset($apparray)){
						foreach($apparray as $key=>$value){
							if(isset($value->appid) && $value->appid==$_POST['appid'])
								array_splice($apparray, $key, 1);
						}
					}
				}
				$info=array(
					"appidarray_marketunion"=>json_encode($apparray)
				);
				$where="id_marketunion";
				$content=$_POST['unionid'];
			break;
			case "union_img":
				$table="marketunion";
				$info=array(
					"img_marketunion"=>$_POST['src']
				);
				$where="id_marketunion";
				$content=$_POST['unionid'];
			break;
			case "union_data":
				$table="marketunion";
				$info=array(
					"name_marketunion"=>$_POST['name'],
					"description_marketunion"=>$_POST['description'],
				);
				$where="id_marketunion";
				$content=$_POST['unionid'];
			break;
			case "union_home":
				$table="marketunion";
				$info=array(
					"home_marketunion"=>$_POST["direction"]=="up"?1:0
				);
				$where="id_marketunion";
				$content=$_POST['unionid'];
			break;
		}
		$result=$this->dbHandler->updatedata($table,$info,$where,$content);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息修改成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息修改失败"));
	}
	public function del_info(){
		switch($_POST['info_type']){
			case 'merchant':
				$table="merchant";
				$condition=array("id_merchant"=>$_POST['merchantid']);
			break;
			case 'scroll':
				$table="marketscroll";
				$condition=array("id_marketscroll"=>$_POST['scrollid']);
				//更新之后的序号
				for($i=($_POST['order']+1);$i<=$_POST['amount'];$i++){
					$info=$this->dbHandler->UD('marketscroll',array("order_marketscroll"=>($i-1)),array("order_marketscroll"=>$i));
				}
			break;
			case 'union':
				$table="marketunion";
				$condition=array("id_marketunion"=>$_POST['unionid']);
			break;
		}
		$result=$this->dbHandler->deletedata($table,$condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息删除失败"));
	}
	public function get_info(){
		switch($_POST['info_type']){
			case 'app':
				$table="app";
				$where="id_app";
				$content=$_POST['appid'];
			break;
			case 'message':
				$table="message";
				$where="id_message";
				$content=$_POST['messageid'];
			break;
		}
		$result=$this->dbHandler->selectPartData($table,$where,$content);
		echo json_encode(array("result"=>"success","message"=>$result[0]));
	}
	public function get_allunion(){
		$data=array();
		$unions=$this->dbHandler->selectAllData("marketunion");
		foreach($unions as $u){
			$unionid=$u->id_marketunion;
			$data[$unionid]["unionname"]=$u->name_marketunion;
			$apparray=json_decode($u->appidarray_marketunion);
			$data[$unionid]["has"]=0;
			if(isset($apparray)){
				foreach($apparray as $a){
					if(isset($a->appid) && $a->appid==$_POST['appid']){
						$data[$unionid]["has"]=1;
						continue 2;
					}
				}
			} 
		}
		echo json_encode(array("result"=>"success","message"=>$data));
	}
}
/* End of file admin.php */
/* Location: ./application/controllers/kmadmin/admin.php */
?>