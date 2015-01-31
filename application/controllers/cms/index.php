<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->helper("upload");
		$this->load->model("dbHandler");
	}
	public function checkMerchantLogin(){
		if (!checkLogin() || strcmp($_SESSION["usertype"], "merchant")) {
			$this->load->view('redirect',array("url"=>"/cms/index/login","info"=>"请先登录商户账号"));
			return false;
		}else return true;
	}
	public function index()
	{
		$this->checkMerchantLogin();
		//$total=$this->dbHandler->amount_data_no_condition($table);
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'title' => WEBSITE_NAME."-app管理",
			)
		);
		$data=array();
		$this->load->view('cms/index', $data);
		$this->load->view('cms/footer');
	}
	public function account()
	{
		$merchant=$this->dbHandler->selectPartData('merchant','id_merchant',$_SESSION['userid']);
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'account' => true,
				'title' => WEBSITE_NAME."-基本信息-账号管理",
			)
		);
		$this->load->view('cms/account',array("merchant"=>$merchant[0]));
		$this->load->view('cms/footer');
	}
	public function pwd()
	{
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'account' => true,
				'title' => WEBSITE_NAME."-修改密码-账号管理",
			)
		);
		$this->load->view('cms/pwd');
		$this->load->view('cms/footer');
	}
	public function checklog()
	{
		$this->checkMerchantLogin();
		$limit=8;
		$amount=$this->dbHandler->ADU('log',array("merchant_log"=>$_SESSION['userid']));
		$page_amount=ceil($amount/$limit);
		$page=isset($_GET['page']) && is_numeric($_GET['page'])?$_GET['page']:1;
		$offset=($page-1)*$limit;
		//$logs=$this->dbHandler->SDU('log',array("merchant_log"=>$_SESSION['userid']),array("limit"=>$limit,"offset"=>$offset),array("col"=>'time_log',"by"=>'desc'));
		$like=array();
		$logs=$this->dbHandler->SDSDOR('log',array("merchant_log"=>$_SESSION['userid']),array("limit"=>$limit,"offset"=>$offset),"<app>",array(),array("col"=>'time_log',"by"=>'desc'),$like,"merchant","merchant_log=id_merchant");
		$ex_url="";
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/cms/index/checklog?page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/cms/index/checklog?page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/cms/index/checklog?page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/cms/index/checklog?page=".$page_amount.$ex_url:"no";
		$jump_link="/cms/index/checklog?jump=1".$ex_url."&page=";
		$select_link="/cms/index/checklog?jump=1";
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'log' => true,
				'title' => WEBSITE_NAME."-操作日志",
				"prev_link"=>$prev_link,
				"next_link"=>$next_link,
				"first_link"=>$first_link,
				"jump_link"=>$jump_link,
				"last_link"=>$last_link,
				"select_link"=>$select_link,
				"page"=>$page,
				"page_amount"=>$page_amount,
				"amount"=>$amount
			)
		);
		$this->load->view('cms/loglist',array("logs"=>$logs));
		$this->load->view('cms/footer');
	}
	public function correlation()
	{
		$merchant=$this->dbHandler->selectPartData('merchant','id_merchant',$_SESSION['userid']);
		$merchant=$merchant[0];
		$correlation=array();
		$FMerchant=array();
		if($merchant->accept_apply_merchant!=2)//无上一级
			$correlation=$this->dbHandler->selectPartData('merchant','correlation_merchant',$_SESSION['userid']);
		else //有上一级
			$FMerchant=$this->dbHandler->selectPartData('merchant','id_merchant',$merchant->correlation_merchant);
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'account' => true,
				'title' => WEBSITE_NAME."-设置子帐号-账号管理",
			)
		);
		$this->load->view('cms/correlation',
			array(
				"merchant"=>$merchant,
				"correlation"=>$correlation,
				"FMerchant"=>$FMerchant,
			));
		$this->load->view('cms/footer');
	}
	public function preview(){
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$this->load->view('cms/header',
			array( 
				'title' => WEBSITE_NAME."-编辑app",
			)
		);
		$this->load->view('cms/preview',array(
			"appid"=>$_GET["appid"]
		));
		$this->load->view('cms/footer');
	}
	public function login(){
		$this->load->view('header',
			array( 
				'title' => WEBSITE_NAME."-商户登录",
			)
		);
		$this->load->view('cms/login',array('title'=>"商户登录"));
		$this->load->view('cms/footer');
	}
	public function register(){
		$this->load->view('header',
			array(
				'title' => WEBSITE_NAME."-商户注册",
			)
		);
		$this->load->view('cms/register');
		$this->load->view('cms/footer');
	}
	/**
	 ** 应用管理
	 **/
	public function app(){
		$this->checkMerchantLogin();
		$limit=8;
		$del=isset($_GET['type']) && $_GET['type']=="del"?'state_app':'state_app !=';
		$amount=$this->dbHandler->ADU('app',array("merchant_id_app"=>$_SESSION['userid'],$del=>7,"validity_app"=>1));
		$page_amount=ceil($amount/$limit);
		$page=isset($_GET['page']) && is_numeric($_GET['page'])?$_GET['page']:1;
		$offset=($page-1)*$limit;
		$apps=$this->dbHandler->SDU('app',array("merchant_id_app"=>$_SESSION['userid'],$del=>7,"validity_app"=>1),array("limit"=>$limit,"offset"=>$offset),array("col"=>'update_time_app',"by"=>'desc'));
		foreach($apps as $item){
			$item->state_app_cn=$this->state_convert($item->state_app);
			$create_time_app=strtotime($item->create_time_app);
			$today=date("Y-m-d ");
			$mid_time=strtotime($today."12:00:00");
			$night_time=strtotime($today."18:00:00");
			if($create_time_app<=$mid_time){
				$left_time=ceil(($mid_time-$create_time_app)/60);
				$item->left_time_app=$left_time<10?10:$left_time;
			}else{
				$left_time=ceil(($night_time-$create_time_app)/60);
				$item->left_time_app=$left_time<10?10:$left_time;
			}
		}
		$pre_link=($page<2)?"javascript:void()":"/cms/index/app?page=".($page-1);
		$next_link=($page>=$page_amount)?"javascript:void()":"/cms/index/app?page=".($page+1);
		$this->load->view('cms/header',
			array(
				'showSlider' => true,
				'appManager' => true,
				'title' => WEBSITE_NAME."-应用管理-app管理",
			)
		);
		$this->load->view('cms/app',
			array(
				"apps"=>$apps,
				"amount"=>$amount,
				"page_amount"=>$page_amount,
				"pre_link"=>$pre_link,
				"next_link"=>$next_link
			)
		);
		$this->load->view('cms/footer');
	}
	public function state_convert($num){
//	0未生成1生成中2已生成3待发布4发布审核中5已发布6发布审核不通过7删除
		$state_cn="";
		switch($num){
			case 0:
				$state_cn="未生成";
			break;
			case 1:
				$state_cn="生成中";
			break;
			case 2:
				$state_cn="已生成";
			break;
			case 3:
				$state_cn="待发布";
			break;
			case 4:
				$state_cn="发布审核中";
			break;
			case 5:
				$state_cn="已发布";
			break;
			case 6:
				$state_cn="发布审核不通过";
			break;
			case 7:
				$state_cn="删除";
			break;
		}
		return $state_cn;
	}	
	public function createapp(){
		$this->load->view('cms/header',
			array( 
				'title' => WEBSITE_NAME."-创建app",
			)
		);
		$this->load->view('cms/createapp',array("category"=>$this->get_category()));
		$this->load->view('cms/footer');
	}
	public function get_category(){
		$category=$this->dbHandler->selectAllData("category");
		$new_cat=array();
		foreach($category as $cat){
			$new_cat[$cat->id_category]=$cat->name_category;
		}
		return $new_cat;
	}
	public function editapp(){
		$this->checkMerchantLogin();
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		$app=$app[0];
		if($_SESSION['userid']!=$app->merchant_id_app){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"抱歉你没有设置该app的权限！"));
			return false;
		}
		$launch=array(
				1=>"/resource/launch/1.png",
				2=>"/resource/launch/2.png",
				3=>"/resource/launch/3.png",
				4=>"/resource/launch/4.png"
		);
		$app->poslaunch=array_search($app->launch_app,$launch);
		$this->load->view('cms/header',
			array( 
				'title' => WEBSITE_NAME."-编辑app",
			)
		);
		$this->load->view('cms/editapp',array("info"=>$app,"category"=>$this->get_category()));
		$this->load->view('cms/footer');
	}
	/*
	 * 发布文章/商品
	 */
	public function publish(){
		$this->checkMerchantLogin();
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		$app=$app[0];
		if($_SESSION['userid']!=$app->merchant_id_app){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"抱歉你没有设置该app的权限！"));
			return false;
		}
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'app' => true,
				'publish' => true,
				'info' => $app,
				'title' => WEBSITE_NAME."-发布内容/商品",
			)
		);
		$view="home";
		if(!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type']=="home")){
			$app->homeslider=$this->dbHandler->SDUNR('homeslider',array("appid_homeslider"=>$_GET['appid']),array("col"=>'ordernum_homeslider',"by"=>'asc'));
		}elseif($_GET['type']=="essay"){
			$view="essay";
			$app->essay=$this->dbHandler->SDUNR('nav',array("app_id_nav"=>$_GET['appid'],"type_nav"=>3),array("col"=>'order_nav',"by"=>'asc'));
		}elseif($_GET['type']=="product"){
			$view="product";
			$app->product=$this->dbHandler->SDUNR('nav',array("app_id_nav"=>$_GET['appid'],"type_nav"=>5),array("col"=>'order_nav',"by"=>'asc'));
		}
		$this->load->view('cms/'.$view,array("info"=>$app));
		$this->load->view('cms/footer');
	}
	/*
	 * GET参数 page;appid;type;state;nav;search
	 */
	public function contents(){
		$this->checkMerchantLogin();
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		$app=$app[0];
		if($_SESSION['userid']!=$app->merchant_id_app){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"抱歉你没有设置该app的权限！"));
			return false;
		}
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'app' => true,
				'contents' => true,
				'info' => $app,
				'title' => WEBSITE_NAME."-内容查询",
			)
		);
		$view="";
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$essay=array();
		$product=array();
		$navdata=array();
		$type=!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type']=="essay")?"essay":"product";
		
		$amount=0;//总条数
		$limit=30;//每页显示
		$page_amount=0;//总页数
		if(!isset($_GET['type']) || (isset($_GET['type']) && $_GET['type']=="essay")){
			$view="essaylist";
			$app->navs=$this->dbHandler->SDUNR('nav',array('app_id_nav'=>$app->id_app,'type_nav'=>3),array("col"=>'order_nav',"by"=>'asc'));
			$ordata=array();
			foreach($app->navs as $key=>$nav){
				$ordata[$key]=$nav->id_nav;
				$navdata[$nav->id_nav]=$nav->name_nav;
			}
			if(isset($_GET['nav']) && is_numeric($_GET['nav'])) $ordata=array($_GET['nav']);
			$condition=array();
			if(isset($_GET['state']) && $_GET['state']=="draft") $condition["state_essay"]=1;
			elseif(isset($_GET['state']) && $_GET['state']=="delete") $condition["state_essay"]=2;
			elseif(isset($_GET['state']) && $_GET['state']=="normal") $condition["state_essay"]=0;
			if(isset($_GET['search']) && $_GET['search']!="") $like["title_essay"]=$_GET['search'];
			else $like=array();
			if(sizeof($ordata)<1)
				$amount=0;
			else
				$amount=$this->dbHandler->ADUOR('essay',$condition,"navid_essay",$ordata,$like);
			$page_amount=ceil($amount/$limit);
			if($page>$page_amount) $page=1;
			$offset=($page-1)*$limit;
			if(sizeof($ordata)<1)
				$essay=array();
			else
				$essay=$this->dbHandler->SDSDOR('essay',$condition,array("limit"=>$limit,"offset"=>$offset),"navid_essay",$ordata,array("col"=>'lasttime_essay',"by"=>'desc'),$like);
		}elseif($_GET['type']=="product"){
			$type="product";
			$view="productlist";
			$app->navs=$this->dbHandler->SDUNR('nav',array('app_id_nav'=>$app->id_app,'type_nav'=>5),array("col"=>'order_nav',"by"=>'asc'));
			$ordata=array();
			foreach($app->navs as $key=>$nav){
				$ordata[$key]=$nav->id_nav;
				$navdata[$nav->id_nav]=$nav->name_nav;
			}
			if(isset($_GET['nav']) && is_numeric($_GET['nav'])) $ordata=array($_GET['nav']);
			$condition=array();
			if(isset($_GET['state']) && $_GET['state']=="draft") $condition["state_product"]=1;
			elseif(isset($_GET['state']) && $_GET['state']=="delete") $condition["state_product"]=2;
			elseif(isset($_GET['state']) && $_GET['state']=="normal") $condition["state_product"]=0;
			if(isset($_GET['search']) && $_GET['search']!="")$like["name_product"]=$_GET['search'];
			else $like=array();
			if(sizeof($ordata)<1)
				$amount=0;
			else
				$amount=$this->dbHandler->ADUOR('product',$condition,"navid_product",$ordata,$like);
			$page_amount=ceil($amount/$limit);
			if($page>$page_amount) $page=1;
			$offset=($page-1)*$limit;
			if(sizeof($ordata)<1)
				$product=array();
			else
				$product=$this->dbHandler->SDSDOR('product',$condition,array("limit"=>$limit,"offset"=>$offset),"navid_product",$ordata,array("col"=>'lasttime_product',"by"=>'desc'),$like);
		}
		$ex_url="";
		if(isset($_GET["state"]))$ex_url.="&state=".$_GET["state"];
		if(isset($_GET["nav"]))$ex_url.="&nav=".$_GET["nav"];
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/cms/index/contents?type=".$type."&appid=".$_GET['appid']."&page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/cms/index/contents?type=".$type."&appid=".$_GET['appid']."&page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/cms/index/contents?type=".$type."&appid=".$_GET['appid']."&page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/cms/index/contents?type=".$type."&appid=".$_GET['appid']."&page=".$page_amount.$ex_url:"no";
		$jump_link="/cms/index/contents?type=".$type."&appid=".$_GET['appid'].$ex_url."&page=";
		$select_link="/cms/index/contents?type=".$type."&appid=".$_GET['appid'];
		$this->load->view('cms/'.$view,
			array(
				"info"=>$app,
				"essay"=>$essay,
				"product"=>$product,
				"navdata"=>$navdata,
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
		$this->load->view('cms/footer');
	}
	public function essay(){
		$this->checkMerchantLogin();
		$essay=$this->dbHandler->selectPartData('essay','id_essay',$_GET['essayid']);
		$essay=$essay[0];
		$thumb=json_decode($essay->thumbnail_essay);
		$essay->thumbnail_essay=sizeof($thumb)>0?$thumb:array();
		$nav=$this->dbHandler->selectPartData('nav','id_nav',$essay->navid_essay);
		$nav=$nav[0];
		$app=$this->dbHandler->selectPartData('app','id_app',$nav->app_id_nav);
		$app=$app[0];
		$app->navs=$this->dbHandler->SDUNR('nav',array('app_id_nav'=>$app->id_app,'type_nav'=>3),array("col"=>'order_nav',"by"=>'asc'));
		$this->load->view('cms/header',
			array( 
				'title' => WEBSITE_NAME."-编辑文章",
				'showSlider' => true,
				'app' => true,
				'contents' => true,
				'info' => $app
			)
		);
		$this->load->view('cms/show-essay',array("essay"=>$essay,"app"=>$app));
		$this->load->view('cms/footer');
	}
	public function product(){
		$this->checkMerchantLogin();
		$product=$this->dbHandler->selectPartData('product','id_product',$_GET['productid']);
		$product=$product[0];
		$thumb=json_decode($product->thumbnail_product);
		$product->thumbnail_product=sizeof($thumb)>0?$thumb:array();
		$nav=$this->dbHandler->selectPartData('nav','id_nav',$product->navid_product);
		$nav=$nav[0];
		$app=$this->dbHandler->selectPartData('app','id_app',$nav->app_id_nav);
		$app=$app[0];
		$app->navs=$this->dbHandler->SDUNR('nav',array('app_id_nav'=>$app->id_app,'type_nav'=>5),array("col"=>'order_nav',"by"=>'asc'));
		$this->load->view('cms/header',
			array( 
				'title' => WEBSITE_NAME."-编辑商品",
				'showSlider' => true,
				'app' => true,
				'contents' => true,
				'info' => $app
			)
		);
		$this->load->view('cms/show-product',array("product"=>$product,"app"=>$app));
		$this->load->view('cms/footer');
	}
	public function users(){
		$this->checkMerchantLogin();
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		$app=$app[0];
		if($_SESSION['userid']!=$app->merchant_id_app){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"抱歉你没有设置该app的权限！"));
			return false;
		}
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'app' => true,
				'users' => true,
				'info' => $app,
				'title' => WEBSITE_NAME."-用户管理",
			)
		);
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$users=array();
		$amount=0;//总条数
		$limit=30;//每页显示
		$page_amount=0;//总页数
		
		$condition=array("appid_user"=>$_GET['appid']);
		if(isset($_GET['state']) && $_GET['state']=="freeze") $condition["state_user"]=1;
		elseif(isset($_GET['state']) && $_GET['state']=="normal") $condition["state_user"]=0;
		if(isset($_GET['gender']) && $_GET['gender']=="male") $condition["gender_user"]=0;
		elseif(isset($_GET['gender']) && $_GET['gender']=="female") $condition["gender_user"]=1;
		elseif(isset($_GET['gender']) && $_GET['gender']=="unknown") $condition["gender_user"]=2;
		if(isset($_GET['search']) && $_GET['search']!=""){
			$like["username_user"]=$_GET['search'];
			$orlike["realname_user"]=$_GET['search'];
		}
		else{
			$like=array();
			$orlike=array();
		}
		$amount=$this->dbHandler->ADUlike('user',$condition,$like,$orlike);
		$page_amount=ceil($amount/$limit);
		if($page>$page_amount) $page=1;
		$offset=($page-1)*$limit;
		$user=$this->dbHandler->SDSDlike('user',$condition,array("limit"=>$limit,"offset"=>$offset),array("col"=>'lasttime_user',"by"=>'desc'),$like,$orlike);
		
		$ex_url="";
		if(isset($_GET["state"]))$ex_url.="&state=".$_GET["state"];
		if(isset($_GET["gender"]))$ex_url.="&gender=".$_GET["gender"];
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/cms/index/users?appid=".$_GET['appid']."&page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/cms/index/users?appid=".$_GET['appid']."&page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/cms/index/users?appid=".$_GET['appid']."&page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/cms/index/users?appid=".$_GET['appid']."&page=".$page_amount.$ex_url:"no";
		$jump_link="/cms/index/users?appid=".$_GET['appid'].$ex_url."&page=";
		$select_link="/cms/index/users?appid=".$_GET['appid'];
		$this->load->view('cms/userlist',
			array(
				"info"=>$app,
				"user"=>$user,
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
		$this->load->view('cms/footer');
	}
	public function form(){
		$this->checkMerchantLogin();
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		$app=$app[0];
		if($_SESSION['userid']!=$app->merchant_id_app){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"抱歉你没有设置该app的权限！"));
			return false;
		}
		$this->load->view('cms/header',
			array( 
				'showSlider' => true,
				'app' => true,
				'form' => true,
				'info' => $app,
				'title' => WEBSITE_NAME."-内容查询",
			)
		);
		$view="";
		$page=isset($_GET["page"]) && is_numeric($_GET['page']) && $_GET['page']>0?$_GET["page"]:1;
		$form=array();
		$product=array();
		$navdata=array();
		$amount=0;//总条数
		$limit=30;//每页显示
		$page_amount=0;//总页数
		$app->navs=$this->dbHandler->SDUNR('nav',array('app_id_nav'=>$app->id_app,'type_nav'=>4),array("col"=>'order_nav',"by"=>'asc'));
		$ordata=array();
		foreach($app->navs as $key=>$nav){
			$ordata[$key]=$nav->id_nav;
			$navdata[$nav->id_nav]=$nav->name_nav;
		}
		if(isset($_GET['nav']) && is_numeric($_GET['nav'])) $ordata=array($_GET['nav']);
		$condition=array();
		if(isset($_GET['search']) && $_GET['search']!="") $like["title_essay"]=$_GET['search'];
		else $like=array();
		$amount=$this->dbHandler->ADUOR('formdata',$condition,"navid_formdata",$ordata,$like);
		$page_amount=ceil($amount/$limit);
		if($page>$page_amount) $page=1;
		$offset=($page-1)*$limit;
		$form=$this->dbHandler->SDSDOR('formdata',$condition,array("limit"=>$limit,"offset"=>$offset),"navid_formdata",$ordata,array("col"=>'time_formdata',"by"=>'desc'),$like);
		
		$ex_url="";
		if(isset($_GET["nav"]))$ex_url.="&nav=".$_GET["nav"];
		if(isset($_GET["search"]))$ex_url.="&search=".$_GET["search"];
		$prev_link=$page>1?"/cms/index/contents?appid=".$_GET['appid']."&page=".($page-1).$ex_url:"no";
		$next_link=$page<$page_amount?"/cms/index/contents?appid=".$_GET['appid']."&page=".($page+1).$ex_url:"no";
		$first_link=($page!=1)?"/cms/index/contents?appid=".$_GET['appid']."&page=1".$ex_url:"no";
		$last_link=($page!=$page_amount)?"/cms/index/contents?appid=".$_GET['appid']."&page=".$page_amount.$ex_url:"no";
		$jump_link="/cms/index/contents?appid=".$_GET['appid'].$ex_url."&page=";
		$select_link="/cms/index/contents?appid=".$_GET['appid'];
		$this->load->view('cms/formlist',
			array(
				"info"=>$app,
				"form"=>$form,
				"navdata"=>$navdata,
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
		$this->load->view('cms/footer');
	}
	public function login_handler(){
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$info=$this->dbHandler->selectPartData('merchant','username_merchant',$_POST["username"]);
			if(count($info,0)==1){
				$post_pwd=MD5("kmkj".$_POST["pwd"]);
				$db_pwd=$info[0]->pwd_merchant;
				if($post_pwd==$db_pwd){
					$_SESSION['username']=$info[0]->username_merchant;
					$_SESSION['userid']=$info[0]->id_merchant;
					$_SESSION['useravatar']=$info[0]->avatar_merchant;
					$_SESSION['usertype']="merchant";
					$this->load->view('redirect',array("url"=>"/cms/index"));
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
		unset($_SESSION["useravatar"]);
		$this->load->view('redirect',array("url"=>"/cms/index/login"));
	}
	public function modify(){
		$data=array();
		$is_modify=true;
		$message="";
		switch($_POST['modifytype']){
			case "merchantpwd":
			$info=$this->dbHandler->selectPartData('merchant','username_merchant',$_SESSION["username"]);
			if(MD5("kmkj".$_POST["oldpwd"])==$info[0]->pwd_merchant){
				$data=array('username_merchant'=>$_POST["username"],'pwd_merchant'=>MD5("kmkj".$_POST["newpwd"]));
			}else{
				$is_modify=false;
				$message="输入密码错误";
			}
			break;
		}
		if($is_modify){
			$result=$this->dbHandler->updatedata('merchant',$data,'id_merchant',$_SESSION["userid"]);
			if($result==1) echo json_encode(array("result"=>"success","message"=>"修改成功"));
			$this->log("修改密码");
		}else{
			echo json_encode(array("result"=>"failed","message"=>$message));
		}
	}
	public function upload_img(){
		$result=upload("image");
		echo json_encode($result);
	}
	public function add_info(){
		switch($_POST['info_type']){
			case "app":
				$table="app";
				$icon=$_POST['icon'];
				if($_POST['isicontext']=="yes"){
					$savebase='/resource/cusicon/' . date("YmdHis") . '_' . $_SESSION['userid'] . '.';
					$savefile=$_SERVER['DOCUMENT_ROOT'].$savebase;
					$color=array("red"=>255,"green"=>255,"blue"=>255);
					if($icon=="/resource/icon/6.png") $color=array("red"=>0,"green"=>0,"blue"=>0);
					$font_size=13;$x=10;$y=10;
					$icon_text=$_POST['icontext'];
					switch(mb_strlen($icon_text,'UTF8')){
						case 1:
						$font_size=36;$x=6;$y=48;
						break;
						case 2:
						$font_size=18;$x=6;$y=40;
						break;
						case 3:
						$font_size=12;$x=4;$y=35;
						break;
						case 4:
						$font_size=18;$x=6;$y=20;
						$icon_text=mb_substr($icon_text,0,2)."\n".mb_substr($icon_text,2,2);
						break;
					}
					$ext=$this->mark_text($_SERVER['DOCUMENT_ROOT'].$icon,$font_size,$x,$y,$color,$icon_text,$savefile);
					$icon=$savebase.$ext;
				}
				$info=array(
					"name_app"=>$_POST['name'],
					"icon_app"=>$icon,
					"icon_text_app"=>$_POST['isicontext']=="yes"?$_POST['icontext']:"",
					"cat_app"=>$_POST['category'],
					"state_app"=>1,
					"desc_app"=>$_POST['description'],
					"merchant_id_app"=>$_SESSION['userid'],
					"launch_app"=>$_POST['launch'],
					"template_app"=>$_POST['template'],
					"skin_app"=>$_POST['skin'],
					"create_time_app"=>date("Y-m-d H:i:s"),
					"update_time_app"=>date("Y-m-d H:i:s"),
					"download_time_app"=>0
				);
				$log="添加APP【".$_POST['name']."】";
			break;
			case "register":
				$table="merchant";
				if(!$this->check_unique("merchant",$_POST['username'])){
					echo json_encode(array("result"=>"notunique","message"=>"该用户名已经存在"));
					return false;
				}
				$info=array(
					"username_merchant"=>$_POST['username'],
					"pwd_merchant"=>MD5("kmkj".$_POST['pwd']),
					"grade_merchant"=>1,
					"reg_time_merchant"=>date("Y-m-d H:i:s")
				);
				$log="【".$_POST['username']."】注册";
			break;
			case "nav":
				$table="nav";
				$info=array(
					"app_id_nav"=>$_POST['appid'],
					"icon_nav"=>$_POST['icon'],
					"name_nav"=>$_POST['name'],
					"order_nav"=>$_POST['order']
				);
				$log="添加id为".$_POST['appid']."的APP的导航【".$_POST['name']."】";
			break;
			case "slider":
				$table="homeslider";
				$info=array(
					"appid_homeslider"=>$_POST['appid'],
					"src_homeslider"=>$_POST['src'],
					"ordernum_homeslider"=>$_POST['order']
				);
				$log="添加id为".$_POST['appid']."的APP的滚动图【".$_POST['src']."】";
			break;
			case "essay":
				$table="essay";
				$info=array(
					"navid_essay"=>$_POST['navid'],
					"title_essay"=>$_POST['title'],
					"summary_essay"=>$_POST['summary'],
					"text_essay"=>$_POST['content'],
					"thumbnail_essay"=>json_encode($_POST['thumbnail']),
					"state_essay"=>$_POST['draft'],
					"time_essay"=>date("Y-m-d H:i:s"),
					"lasttime_essay"=>date("Y-m-d H:i:s")
				);
				$log="添加文章【".$_POST['title']."】";
			break;
			case "product":
				$table="product";
				$info=array(
					"navid_product"=>$_POST['navid'],
					"catid_product"=>isset($_POST['catid']) && is_numeric($_POST['catid'])?$_POST['catid']:0,
					"unit_product"=>$_POST['unit'],
					"price_product"=>$_POST['price'],
					"oriprice_product"=>$_POST['oriPrice'],
					"name_product"=>$_POST['title'],
					"summary_product"=>$_POST['summary'],
					"description_product"=>$_POST['content'],
					"thumbnail_product"=>json_encode($_POST['thumbnail']),
					"state_product"=>$_POST['draft'],
					"collect_product"=>0,
					"time_product"=>date("Y-m-d H:i:s"),
					"lasttime_product"=>date("Y-m-d H:i:s")
				);
				$log="添加商品【".$_POST['title']."】";
			break;
		}
		$this->log($log);
		$result=$this->dbHandler->insertdata($table,$info);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	public function modify_info(){
		switch($_POST['info_type']){
			case "app_drop":
				$table='app';
				$info=array(
					"state_app"=>$_POST['data']
				);
				$where="id_app";
				$content=$_POST['id'];
				$log="删除id为【".$_POST['id']."】的APP";
			break;
			case "app_validity":
				$table='app';
				$info=array(
					"validity_app"=>$_POST['data']
				);
				$where="id_app";
				$content=$_POST['id'];
				$log="彻底清除id为【".$_POST['id']."】的APP";
			break;
			case "app_info":
				$table="app";
				$icon=$_POST['icon'];
				if($_POST['isicontext']=="yes"){
					$savebase='/resource/cusicon/' . date("YmdHis") . '_' . $_SESSION['userid'] . '.';
					$savefile=$_SERVER['DOCUMENT_ROOT'].$savebase;
					$color=array("red"=>255,"green"=>255,"blue"=>255);
					if($icon=="/resource/icon/6.png") $color=array("red"=>0,"green"=>0,"blue"=>0);
					$font_size=13;$x=10;$y=10;
					$icon_text=$_POST['icontext'];
					switch(mb_strlen($icon_text,'UTF8')){
						case 1:
						$font_size=36;$x=6;$y=48;
						break;
						case 2:
						$font_size=18;$x=6;$y=40;
						break;
						case 3:
						$font_size=12;$x=4;$y=35;
						break;
						case 4:
						$font_size=18;$x=6;$y=20;
						$icon_text=mb_substr($icon_text,0,2)."\n".mb_substr($icon_text,2,2);
						break;
					}
					$ext=$this->mark_text($_SERVER['DOCUMENT_ROOT'].$icon,$font_size,$x,$y,$color,$icon_text,$savefile);
					$icon=$savebase.$ext;
				}
				$info=array(
					"name_app"=>$_POST['name'],
					"icon_app"=>$icon,
					"icon_text_app"=>$_POST['isicontext']=="yes"?$_POST['icontext']:"",
					"cat_app"=>$_POST['category'],
					"desc_app"=>$_POST['description'],
					"launch_app"=>$_POST['launch'],
					"template_app"=>$_POST['template'],
					"skin_app"=>$_POST['skin'],
					"update_time_app"=>date("Y-m-d H:i:s"),
				);
				$where="id_app";
				$content=$_POST['id'];
				$log="修改id为【".$_POST['id']."】的APP【".$_POST['name']."】";
			break;
			case "nav_order":
				$table='nav';
				if($_POST['direction']=="plus") $dst_order=$_POST['order']-1;
				else $dst_order=$_POST['order']+1;
				$info=$this->dbHandler->UD('nav',array("order_nav"=>$_POST['order']),array("app_id_nav"=>$_POST['appid'],"order_nav"=>$dst_order));
				$info=array(
					"order_nav"=>$dst_order
				);
				$where="id_nav";
				$content=$_POST['navid'];
				$log="修改导航id为【".$_POST['navid']."】的顺序";
			break;
			case "slider_order":
				$table='homeslider';
				if($_POST['direction']=="forward") $dst_order=$_POST['order']-1;
				else $dst_order=$_POST['order']+1;
				$info=$this->dbHandler->UD('homeslider',array("ordernum_homeslider"=>$_POST['order']),array("appid_homeslider"=>$_POST['appid'],"ordernum_homeslider"=>$dst_order));
				$info=array(
					"ordernum_homeslider"=>$dst_order
				);
				$where="id_homeslider";
				$content=$_POST['sliderid'];
				$log="修改滚动图id为【".$_POST['sliderid']."】的顺序";
			break;
			case "essay":
				$table="essay";
				$info=array(
					"navid_essay"=>$_POST['navid'],
					"title_essay"=>$_POST['title'],
					"summary_essay"=>$_POST['summary'],
					"text_essay"=>$_POST['content'],
					"thumbnail_essay"=>json_encode($_POST['thumbnail']),
					"state_essay"=>$_POST['draft'],
					"lasttime_essay"=>date("Y-m-d H:i:s")
				);
				$where="id_essay";
				$content=$_POST['essayid'];
				$log="修改文章【".$_POST['title']."】";
			break;
			case "essay_del":
				$table="essay";
				$info=array(
					"lasttime_essay"=>date("Y-m-d H:i:s"),
					"state_essay"=>2
				);
				$where="id_essay";
				$content=$_POST['essayid'];
				$log="删除文章【".$_POST['essayid']."】";
			break;
			case "essay_re":
				$table="essay";
				$info=array(
					"lasttime_essay"=>date("Y-m-d H:i:s"),
					"state_essay"=>0
				);
				$where="id_essay";
				$content=$_POST['essayid'];
				$log="恢复文章【".$_POST['essayid']."】";
			break;
			case "product":
				$table="product";
				$info=array(
					"navid_product"=>$_POST['navid'],
					"name_product"=>$_POST['title'],
					"catid_product"=>isset($_POST['catid']) && is_numeric($_POST['catid'])?$_POST['catid']:0,
					"unit_product"=>$_POST['unit'],
					"price_product"=>$_POST['price'],
					"oriprice_product"=>$_POST['oriPrice'],
					"summary_product"=>$_POST['summary'],
					"description_product"=>$_POST['content'],
					"thumbnail_product"=>json_encode($_POST['thumbnail']),
					"state_product"=>$_POST['draft'],
					"lasttime_product"=>date("Y-m-d H:i:s")
				);
				$where="id_product";
				$content=$_POST['productid'];
				$log="修改商品【".$_POST['title']."】";
			break;
			case "product_del":
				$table="product";
				$info=array(
					"lasttime_product"=>date("Y-m-d H:i:s"),
					"state_product"=>2
				);
				$where="id_product";
				$content=$_POST['productid'];
				$log="删除商品id【".$_POST['productid']."】";
			break;
			case "product_re":
				$table="product";
				$info=array(
					"lasttime_product"=>date("Y-m-d H:i:s"),
					"state_product"=>0
				);
				$where="id_product";
				$content=$_POST['productid'];
				$log="恢复商品id【".$_POST['productid']."】";
			break;
			case "merchant_avatar":
				$table="merchant";
				$info=array(
					"avatar_merchant"=>$_POST["src"]
				);
				$_SESSION["useravatar"]=$_POST["src"];
				$where="id_merchant";
				$content=$_SESSION['userid'];
				$log="修改商户头像";
			break;
			case "merchant_data":
				$table="merchant";
				$info=array(
					"gender_merchant"=>$_POST["gender"],
					"email_merchant"=>$_POST["email"],
					"phone_merchant"=>$_POST["phone"],
					"qq_merchant"=>$_POST["qq"],
					"birthday_merchant"=>$_POST["birthday"]
				);
				$where="id_merchant";
				$content=$_SESSION['userid'];
				$log="修改商户信息";
			break;
			case "merchant_correlation":
				$table="merchant";
				$info=array(
					"correlation_merchant"=>$_SESSION['userid'],
					"msg_apply_merchant"=>$_POST["apply_msg"]
				);
				$where="username_merchant";
				$content=$_POST["username"];
				$log="申请添加子帐号";
			break;
			case "merchant_apply":
				$table="merchant";
				$info=array(
					"accept_apply_merchant"=>$_POST['resultnum']
				);
				$where="id_merchant";
				$content=$_SESSION['userid'];
				$log="同意成为子帐号";
			break;
		}
		$this->log($log);
		$result=$this->dbHandler->updatedata($table,$info,$where,$content);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息修改成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息修改失败"));
	}
	public function del_info(){
		switch($_POST['info_type']){
			case 'nav':
				$app=$this->dbHandler->selectPartData('app','id_app',$_POST['appid']);
				if($_SESSION['userid']!=$app[0]->merchant_id_app){
					echo json_encode(array("result"=>"failed","message"=>"抱歉，你没有权限修改"));
					return false;
				}
				$table="nav";
				$condition=array("id_nav"=>$_POST['navid']);
				//更新之后的序号
				for($i=($_POST['order']+1);$i<=$_POST['amount'];$i++){
					$info=$this->dbHandler->UD('nav',array("order_nav"=>($i-1)),array("app_id_nav"=>$_POST['appid'],"order_nav"=>$i));
				}
				$log="删除导航id".$_POST['navid'];
			break;
			case 'essay':
				$table="essay";
				$condition=array("id_essay"=>$_POST['essayid']);
				$log="删除文章id".$_POST['essayid'];
			break;
			case 'product':
				$table="product";
				$condition=array("id_product"=>$_POST['productid']);
				$log="删除商品id".$_POST['productid'];
			break;
			case 'slider':
				$app=$this->dbHandler->selectPartData('app','id_app',$_POST['appid']);
				if($_SESSION['userid']!=$app[0]->merchant_id_app){
					echo json_encode(array("result"=>"failed","message"=>"抱歉，你没有权限修改"));
					return false;
				}
				$table="homeslider";
				$condition=array("id_homeslider"=>$_POST['sliderid']);
				//更新之后的序号
				for($i=($_POST['order']+1);$i<=$_POST['amount'];$i++){
					$info=$this->dbHandler->UD('homeslider',array("ordernum_homeslider"=>($i-1)),array("appid_homeslider"=>$_POST['appid'],"ordernum_homeslider"=>$i));
				}
				$log="删除滚动图id".$_POST['sliderid'];
			break;
		}
		$this->log($log);
		$result=$this->dbHandler->deletedata($table,$condition);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息删除成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息删除失败"));
	}
	public function mark_text($img,$font_size,$x,$y,$color,$text,$savefile){
		//创建图片的实例
		$dst = imagecreatefromstring(file_get_contents($img));
		//打上文字
		$font = $_SERVER['DOCUMENT_ROOT'].'/assets/font/msyh.ttf';//字体
		$color_text = imagecolorallocate($dst, $color['red'], $color['green'], $color['blue']);//字体颜色
		imagefttext($dst, $font_size, 0, $x,$y, $color_text, $font, $text);
		//输出图片
		list($dst_w, $dst_h, $dst_type) = getimagesize($img);
		$ext="";
		switch ($dst_type) {
			case 1://GIF
				header('Content-Type: image/gif');
				imagegif($dst,$savefile."gif");
				$ext="gif";
				break;
			case 2://JPG
				header('Content-Type: image/jpeg');
				imagejpeg($dst,$savefile."jpg");
				$ext="jpg";
				break;
			case 3://PNG
				header('Content-Type: image/png');
				imagepng($dst,$savefile."png");
				$ext="png";
				break;
			default:
				break;
		}
		imagedestroy($dst);
		return $ext;
	}
	public function create_veri_code(){
		veri_code();
	}
	public function check_code(){
		if(isset($_POST['code']) && strcasecmp($_POST['code'],$_SESSION['authcode'])==0){
			echo json_encode(array("result"=>"success","message"=>"验证码输入正确！"));
		}else{
			echo json_encode(array("result"=>"failed","message"=>"验证码输入错误！"));
		}
	}
	public function check_unique($type,$value){
		$result=false;
		switch($type){
			case "merchant":
				$info=$this->dbHandler->selectPartData('merchant','username_merchant',$value);
				if(sizeof($info)==0){
					$result=true;
				}
			break;
		}
		return $result;
	}
	public function navedit(){
		$this->checkMerchantLogin();
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"app的id不正确"));
			return false;
		}
		$navs=$this->dbHandler->SDUNR('nav',array("app_id_nav"=>$_GET['appid']),array("col"=>'order_nav',"by"=>'asc'));
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		if($_SESSION['userid']!=$app[0]->merchant_id_app){
			$this->load->view('redirect',array("url"=>"/cms/index/app","info"=>"抱歉你没有设置该app的权限！"));
			return false;
		}
		$this->load->view('cms/header',
			array( 
				'title' => WEBSITE_NAME."-APP导航设计",
			)
		);
		$this->load->view('cms/editnav',array("app"=>$app[0],"navs"=>$navs));
		$this->load->view('cms/footer');
	}
	public function get_nav_info(){
		$navid=$_POST['navid'];
		$nav=$this->dbHandler->selectPartData('nav','id_nav',$navid);
		$nav=$nav[0];
		$message="";
		switch($nav->type_nav){
			case 1://固定页面
			$content=$this->dbHandler->selectPartData('content','navid_content',$navid);
			$message=$content[0]->text_content;
			break;
			case 2://固定二级页面
			$subnavs=$this->dbHandler->SDUNR('subnav',array("navid_subnav"=>$navid),array("col"=>'id_subnav',"by"=>'asc'));
			$message=json_encode($subnavs);
			break;
			case 3://文章列表
			break;
			case 4://表单页
			$formitems=$this->dbHandler->SDUNR('form',array("navid_form"=>$navid),array("col"=>'id_form',"by"=>'asc'));
			$message=json_encode($formitems);
			break;
			case 5://商城
			break;
			case 6://链接
			$link=$this->dbHandler->selectPartData('link','navid_link',$navid);
			$message=$link[0]->url_link;
			break;
		}
		echo json_encode(array("result"=>$nav->type_nav,"message"=>$message));
	}
	public function get_mallcat_info(){
		$navid=$_POST['navid'];
		$nav=$this->dbHandler->selectPartData('nav','id_nav',$navid);
		$nav=$nav[0];
		$category="";
		if($nav->hasmallcat_nav==1){
			$category=$this->dbHandler->SDUNR('mall_category',array("navid_mall_category"=>$navid),array("col"=>'order_mall_category',"by"=>'asc'));
			$category=json_encode($category);
		}
		echo json_encode(array("result"=>$nav->hasmallcat_nav,"message"=>$category));
	}
	public function update_nav(){
		$navid=$_POST['navid'];
		$nav=$this->dbHandler->selectPartData('nav','id_nav',$navid);
		$nav=$nav[0];
		//删除原内容
		switch($nav->type_nav){
			case 1:
				$table="content";
				$condition=array("navid_content"=>$navid);
			break;
			case 2:
				$table="subnav";
				$condition=array("navid_subnav"=>$navid);
			break;
			case 3:
				$table="";
				//$condition=array("navid_essay"=>$navid);
			break;
			case 4://表单
				$table="form";
				$condition=array("navid_form"=>$navid);
			break;
			case 5://商城
				$table="";
				//$condition=array("navid_mall"=>$navid);
			break;
			case 6://链接
				$table="link";
				$condition=array("navid_link"=>$navid);
				$this->dbHandler->deletedata($table,$condition);
			break;
			default:
			break;
		}
		if($table!="")$this->dbHandler->deletedata($table,$condition);
		//修改type_nav
		$info=$this->dbHandler->UD('nav',array("type_nav"=>$_POST['type'],"name_nav"=>$_POST['name']),array("id_nav"=>$navid));
		//添加对应内容
		switch($_POST['type']){
			case 1:
				$table="content";
				$info=array(
					"text_content"=>$_POST['cat1_content'],
					"navid_content"=>$navid
				);
				$result=$this->dbHandler->insertdata($table,$info);
			break;
			case 2:
				if(isset($_POST['subnavs']) && $_POST['subnavs']!=""){
					foreach($_POST['subnavs'] as $value){
						$info=array(
							"navid_subnav"=>$navid,
							"name_subnav"=>$value["name"],
							"content_subnav"=>$value["content"]
						);
						$result=$this->dbHandler->insertdata("subnav",$info);
					}
				}
			break;
			case 3://文章
			break;
			case 4://表单
				if(isset($_POST['form']) && $_POST['form']!=""){
					foreach($_POST['form'] as $value){
						$info=array(
							"navid_form"=>$navid,
							"name_form"=>$value["name"],
							"type_form"=>$value["type"]
						);
						$result=$this->dbHandler->insertdata("form",$info);
					}
				}
			break;
			case 5://商城
			break;
			case 6://链接
				$table="link";
				$info=array(
					"url_link"=>$_POST['link'],
					"navid_link"=>$navid
				);
				$result=$this->dbHandler->insertdata($table,$info);
			break;
			default:
			break;
		}
		$this->log("修改导航".($nav->name_nav));
		echo json_encode(array("result"=>"success","message"=>""));
	}
	public function log($log){
		$info=array(
			"time_log"=>date("Y-m-d H:i:s"),
			"operation_log"=>$log,
			"merchant_log"=>$_SESSION["userid"]
		);
		$result=$this->dbHandler->insertdata("log",$info);
	}
}

/* End of file index.php */
/* Location: ./application/controllers/cms/index.php */
?>