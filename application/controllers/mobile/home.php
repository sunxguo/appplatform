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
		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("info"=>"app的id不正确"));
			return false;
		}
		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
		$navs=$this->dbHandler->SDUNR('nav',array("app_id_nav"=>$_GET['appid']),array("col"=>'order_nav',"by"=>'asc'));
		$sliders=$this->dbHandler->SDUNR('homeslider',array("appid_homeslider"=>$_GET['appid']),array("col"=>'ordernum_homeslider',"by"=>'asc'));
		$this->load->view('mobile/home',
			array(
				'showSlider' => true,
				'title' => WEBSITE_NAME."-手机网站",
				'app'=>$app[0],
				'navs'=>$navs,
				'sliders'=>$sliders
			)
		);
	}
	public function mall()
	{
/*		if(!isset($_GET['appid']) || !is_numeric($_GET['appid'])){
			$this->load->view('redirect',array("info"=>"app的id不正确"));
			return false;
		}
		if(!isset($_GET['navid']) || !is_numeric($_GET['navid'])){
			$this->load->view('redirect',array("info"=>"导航的id不正确"));
			return false;
		}*/
		$nav=$this->dbHandler->SDUNR('nav',array("id_nav"=>$_GET['navid']),array("col"=>'id_nav',"by"=>'asc'));
//		$app=$this->dbHandler->selectPartData('app','id_app',$_GET['appid']);
/*		if($nav->hasmallcat_nav==1){//有分类
			$category=$this->dbHandler->SDUNR('mall_category',array("navid_mall_category"=>$navid),array("col"=>'order_mall_category',"by"=>'asc'));
			foreach($category as $key=>$c){
				$products=$this->dbHandler->SDUNR('product',array("catid_product"=>$c->id_mall_category),array("col"=>'lasttime_product',"by"=>'desc'));
				$nav->products=$products;
			}
		}else{*/
		if($nav->hasmallcat_nav==0)
			$products=$this->dbHandler->SDUNR('product',array("navid_product"=>$_GET['navid']),array("col"=>'lasttime_product',"by"=>'desc'));
		else{
			$products=$this->dbHandler->SDUNR('product',array("catid_product"=>$_GET['catid']),array("col"=>'lasttime_product',"by"=>'desc'));
		}
		$this->load->view('mobile/mall',
			array(
				'title' => WEBSITE_NAME."-购物-手机网站",
				'nav'=>$nav[0],
				'products'=>$products
			)
		);
	}
	public function get_info(){
		$msg="";
		switch($_POST['info_type']){
			case "nav"://1://固定页面2://固定二级页面3://文章列表4://表单页5://商城6://链接
				$navid=$_POST['navid'];
				$nav=$this->dbHandler->selectPartData('nav','id_nav',$navid);
				$nav=$nav[0];
				switch($nav->type_nav){
					case 1:
						$data=$this->dbHandler->selectPartData('content','navid_content',$navid);
						$nav->content=$data[0]->text_content;
					break;
					case 2:
						$subnavs=$this->dbHandler->SDUNR('subnav',array("navid_subnav"=>$navid),array("col"=>'id_subnav',"by"=>'asc'));
						$nav->subnavs=$subnavs;
					break;
					case 3:
						$essays=$this->dbHandler->SDUNR('essay',array("navid_essay"=>$navid),array("col"=>'lasttime_essay',"by"=>'desc'));
						$nav->essays=$essays;
					break;
					case 4:
						$forms=$this->dbHandler->SDUNR('form',array("navid_form"=>$navid),array("col"=>'id_form',"by"=>'asc'));
						$nav->forms=$forms;
					break;
					case 6:
						$links=$this->dbHandler->SDUNR('link',array("navid_link"=>$navid),array("col"=>'id_link',"by"=>'asc'));
						$nav->link=file_get_contents($links[0]->url_link);
					break;
					case 5:
						if($nav->hasmallcat_nav==1){//有分类
							$categorys=$this->dbHandler->SDUNR('mall_category',array("navid_mall_category"=>$navid),array("col"=>'order_mall_category',"by"=>'asc'));
		/*					foreach($category as $key=>$c){
								$products=$this->dbHandler->SDUNR('product',array("catid_product"=>$c->id_mall_category),array("col"=>'id_product',"by"=>'asc'));
								$c->products=$products;
							}*/
							$nav->categorys=$categorys;
						}else{
							$products=$this->dbHandler->SDUNR('product',array("navid_product"=>$navid),array("col"=>'lasttime_product',"by"=>'desc'));
							$nav->products=$products;
						}
					break;
				}
				$msg=$nav;
			break;
			case "subnav":
				$subnavid=$_POST['subnavid'];
				$subnav=$this->dbHandler->selectPartData('subnav','id_subnav',$subnavid);
				$subnav=$subnav[0];
				$msg=$subnav;
			break;
			case "essay":
				$essayid=$_POST['essayid'];
				$essay=$this->dbHandler->selectPartData('essay','id_essay',$essayid);
				$essay=$essay[0];
				$msg=$essay;
			break;
			case "category_product":
				$categoryid=$_POST['categoryid'];
				$products=$this->dbHandler->SDUNR('product',array("catid_product"=>$categoryid),array("col"=>'lasttime_product',"by"=>'desc'));
				$msg=$products;
			break;
			case "product":
				$productid=$_POST['productid'];
				$product=$this->dbHandler->selectPartData('product','id_product',$productid);
				$msg=$product[0];
			break;
			case "cart":
				$products=array();
				$total_price=0;
				$total=0;
				$unit="RMB";
				$is_all_checked=true;
				if(isset($_SESSION["cart"])){
					foreach($_SESSION["cart"] as $key=>$item){
						$pro=$this->dbHandler->selectPartData('product','id_product',$key);
						$pro[0]->countnum=$_SESSION["cart"][$key]["countnum"];
						$pro[0]->checked=$_SESSION["cart"][$key]["checked"];
						$products[]=$pro[0];
						if($_SESSION["cart"][$key]["checked"]){
							$total_price+=($pro[0]->price_product)*$pro[0]->countnum;
							$total+=$pro[0]->countnum;
							$unit=$pro[0]->unit_product;
						}else $is_all_checked=false;
					}}
				$msg=array(
					"products"=>$products,
					"unit"=>$unit,
					"total_price"=>$total_price,
					"total"=>$total,
					"is_all_checked"=>$is_all_checked
				);
			break;
			case "user":
				$userid=$_SESSION['appuserid'];
				$user=$this->dbHandler->selectPartData('user','id_user',$userid);
				$msg=$user[0];
			break;
			case "orderlist":
				$msg=$this->dbHandler->SDUNR('order',array("userid_order"=>$_SESSION["appuserid"]),array("col"=>'time_order',"by"=>'desc'));
			break;
			case "order":
				$orderid=$_POST['orderid'];
				$order=$this->dbHandler->selectPartData('order','id_order',$orderid);
				$msg=$order=$order[0];
				$app=$this->dbHandler->selectPartData('app','id_app',$order->appid_order);
				$app=$app[0];
				$merchant=$this->dbHandler->selectPartData('merchant','id_merchant',$app->merchant_id_app);
				$merchant=$merchant[0];
				$msg->business_paypal=$merchant->paypal_merchant;
			break;
			case "msglist":
				$msg=$this->dbHandler->SDSDUNROR('message',array("type_message"=>"3"),"to_message",array(0,$_SESSION["appuserid"]),array("col"=>'time_message',"by"=>'desc'));
			break;
		}
		echo json_encode(array("result"=>"success","message"=>$msg));
	}
	public function add_formdata(){
		$userid=isset($_SESSION["appuserid"])?$_SESSION["appuserid"]:0;
		$time=date("Y-m-d H:i:s");
		foreach($_POST['data'] as $value){
			$info=array(
				"formid_formdata"=>$value["formid"],
				"data_formdata"=>$value["data"],
				"userid_formdata"=>$userid,
				"time_formdata"=>$time
			);
			$result=$this->dbHandler->insertdata("formdata",$info);
		}
		echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
	}
	public function check_push_msg(){
		$wherein[0]=array("orfield"=>"appid_message","ordata"=>array($_GET["appid"],0));
		$wherein[1]=array("orfield"=>"type_message","ordata"=>array("0","2"));
		$wherein[2]=array("orfield"=>"device_message","ordata"=>array("0",$_GET["device"]=="android"?1:2));
		$order=array("col"=>"time_message","by"=>"asc");
//		$msg=$this->dbHandler->SDSDUNROR("message",$condition,$orfield,$ordata,$order);
		$msg=$this->dbHandler->msgSelect("message",$wherein,$order);
		foreach($msg as $m){
			if(strtotime(date("Y-m-d H:i:s"))-strtotime($m->time_message)<120){
				echo json_encode(array("title"=>$m->title_message,"message"=>$m->msg_message));
			}else echo "";
		}
//		echo json_encode(array("title"=>"放假了","message"=>"赶紧回家"));
	}
	public function putin_cart(){
		if(isset($_SESSION["cart"][$_POST["productid"]])){
			$_SESSION["cart"][$_POST["productid"]]["countnum"]+=1;//购物车
		}else{
			$_SESSION["cart"][$_POST["productid"]]["countnum"]=1;
		}
		$_SESSION["cart"][$_POST["productid"]]["checked"]=true;//选择
		echo json_encode(array("result"=>"success","message"=>"成功加入购物车！"));
	}
	public function putout_cart(){
		if(isset($_SESSION["cart"][$_POST["productid"]])){
			unset($_SESSION["cart"][$_POST["productid"]]);
			echo json_encode(array("result"=>"success","message"=>"成功移除！"));
		}else 
			echo json_encode(array("result"=>"failed","message"=>"删除失败"));
	}
	public function checked(){
		$_SESSION["cart"][$_POST["productid"]]["checked"]=!$_SESSION["cart"][$_POST["productid"]]["checked"];//选择取反
	}
	public function increase_product_cart(){
		if(isset($_SESSION["cart"][$_POST["productid"]])){
			$_SESSION["cart"][$_POST["productid"]]["countnum"]+=1;//购物车
			$_SESSION["cart"][$_POST["productid"]]["checked"]=true;//选择
		}
	}
	public function decrease_product_cart(){
		if(isset($_SESSION["cart"][$_POST["productid"]]) && $_SESSION["cart"][$_POST["productid"]]>1){
			$_SESSION["cart"][$_POST["productid"]]["countnum"]-=1;//购物车
			$_SESSION["cart"][$_POST["productid"]]["checked"]=true;//选择
		}
	}
	public function modify_num_cart(){
		if(isset($_SESSION["cart"][$_POST["productid"]])){
			$_SESSION["cart"][$_POST["productid"]]["countnum"]=$_POST["countnum"];//购物车
			$_SESSION["cart"][$_POST["productid"]]["checked"]=true;//选择
		}
	}
	public function check_all_cart(){
		if(isset($_SESSION["cart"])){
			$is_all_checked=true;
			foreach($_SESSION["cart"] as $key=>$item){
				if(!$item["checked"]) $is_all_checked=false;
			}
			if($is_all_checked){
				foreach($_SESSION["cart"] as $key=>$item){
					$_SESSION["cart"][$key]["checked"]=false;
				}
			}else{
				foreach($_SESSION["cart"] as $key=>$item){
					$_SESSION["cart"][$key]["checked"]=true;
				}
			}
		}
	}
	public function create_order(){
		$products=array();
		$total=0;
		foreach($_SESSION["cart"] as $key=>$item){
			if($item["checked"]){
				$product=new stdClass();
				$pro=$this->dbHandler->selectPartData('product','id_product',$key);
				$product->info=$pro[0];
				$product->countnum=$item["countnum"];
				$products[]=$product;
				$total+=($pro[0]->price_product)*$item["countnum"];
			}
		}
//		print_r($_SESSION["cart"]);
		$info=array(
			"userid_order"=>$_SESSION["appuserid"],
			"total_order"=>$total,
			"products_order"=>json_encode($products),
			"address_order"=>$_POST["address"],
			"phone_order"=>$_POST["phone"],
			"name_order"=>$_POST["name"],
			"time_order"=>date("Y-m-d H:i:s"),
			"state_order"=>0,
			"appid_order"=>$_POST["appid"],
			"num_order"=>$this->get_order_num(),
		);
		$result=$this->dbHandler->insertdata("order",$info);
		if($_POST["saveAsDefault"]){
			$addressInfo=array(
				"realname_user"=>$_POST["name"],
				"phone_user"=>$_POST["phone"],
				"address_user"=>$_POST["address"]
			);
			$this->dbHandler->updatedata("user",$addressInfo,"id_user",$_SESSION["appuserid"]);
		}
		if($result==1){
			unset($_SESSION["cart"]);
			echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		}
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	public function pay(){
		$this->load->helper("pingpp");
		$order=$this->dbHandler->selectPartData('order','id_order',$_POST['orderId']);
		$order=$order[0];
		$app=$this->dbHandler->selectPartData('app','id_app',$order->appid_order);
		$app=$app[0];
		$merchant=$this->dbHandler->selectPartData('merchant','id_merchant',$app->merchant_id_app);
		$merchant=$merchant[0];
		$products=json_decode($order->products_order);
		$extra = array();
		switch ($_POST['channel']) {
			case 'alipay_wap':
				$extra = array(
					'success_url' => WEBSITE_URL.'/mobile/home/get_pay_result',
					'cancel_url' => WEBSITE_URL.'/mobile/home/alipay_cancel'
				);
				break;
			case 'upmp_wap':
				$extra = array(
					'result_url' => WEBSITE_URL.'/mobile/home/get_pay_result?code='
				);
				break;
		}
		
		//获取客户端的参数，这里不能使用 $_POST 接收，所以我们提供了如下的参考方法接收
		//$input_data = json_decode(file_get_contents("php://input"), true);
		//TODO 客户在这里自行处理接收过来的交易所需的数据
		//设置API KEY，如果是测试模式，这里填入 Test Key；如果是真实模式， 这里填入 Live Key。
		Pingpp::setApiKey($merchant->pingkey_merchant);
		//创建支付对象，发起交易
		$ch = Pingpp_Charge::create(
			//array 里需要哪些参数请阅读 API Reference 文档
			array(
				"order_no"  => $order->num_order,  //商户系统自己生成的订单号
				"app"       => array("id" => $app->pingid_app),  //Ping++ 分配给商户的应用 ID
				"amount"    => ($order->total_order)*100,  //交易金额
				"channel"   => $_POST['channel'],  //交易渠道
				"currency"  => "cny",
				"client_ip" => $_SERVER["REMOTE_ADDR"],  //发起交易的客户端的 IP
				"subject"   => ($products[0]->info->name_product)."...",
				"body"      => $products[0]->info->name_product,
				"extra"     => $extra //仅客户端为 HTML5 时此参数不为空，具体请参考 API Reference 文档
			)
		);
		echo $ch;
	}
	public function get_pay_result(){
		if(isset($_GET['code'])){
			$code = $_GET['code'];
			if($code == 0){
				//show result
				echo
				'	<span style="color:green;font-size:16px;">银联：支付成功</span>
					<script>
						setTimeout(function(){
							history.go(-2);location.reload();
						},2000)
					</script>';
			}else if($code == 1){
				//show result
				echo
				'	<span style="color:green;font-size:16px;">银联：支付失败</span>
					<script>
						setTimeout(function(){
							history.go(-2);location.reload();
						},2000)
					</script>';
			}else if($code == -1){
				//show result
				echo
				'	<span style="color:green;font-size:16px;">银联：支付取消</span>
					<script>
						setTimeout(function(){
							history.go(-2);location.reload();
						},2000)
					</script>';
			}else{
				echo '银联：未知错误('.$code.')';
			}
		}else{
			//show result
			echo
			'	<span style="color:green;font-size:16px;">支付宝：支付成功</span>
				<script>
					setTimeout(function(){
						history.go(-2);location.reload();
					},2000)
				</script>';
		}
	}
	public function alipay_cancel(){
		//show result
		echo
		'	<span style="color:green;font-size:16px;">支付宝：支付失败</span>
			<script>
				setTimeout(function(){
					history.go(-2);location.reload();
				},2000)
			</script>';
	}
	public function get_pay_notify(){
		// 读取异步通知数据
		$notify = json_decode(file_get_contents("php://input"));

		// 对异步通知做处理
		if( ! isset($notify->object)){
			exit("fail");
		}
		switch($notify->object){
			case "charge":
				// 开发者在此处加入对支付异步通知的处理代码
				$this->dbHandler->updatedata("order",array("state_order"=>1),"num_order",$notify->order_no);
			break;
			case "refund":
				// 开发者在此处加入对退款异步通知的处理代码
			break;
			default:
			break;
		}
	}
	
	public function email($to,$subject,$message){
		$this->load->library('email');
		//以下设置Email参数
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.163.com';
		$config['smtp_user'] = 'sunxguo@163.com';
		$config['smtp_pass'] = '19910910Mk1024';
		$config['smtp_port'] = '25';
		$config['charset'] = 'utf-8';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		//以下设置Email内容
		$this->email->from('sunxguo@163.com', 'KM AppPlatform');
		$this->email->to($to); 
	//			$this->email->cc('another@another-example.com'); 
	//			$this->email->bcc('them@their-example.com'); 

		$this->email->subject($subject);
		$this->email->message($message); 

		$this->email->send();

	//			echo $this->email->print_debugger();
	}
	public function test(){
		print_r($_POST);
		$content="mc_gross=25.00&invoice=18&protection_eligibility=Eligible&address_status=confirmed&payer_id=SXZZVBRD9D4JJ&tax=0.00&address_street=1+Main+St&payment_date=05%3A23%3A07+Mar+01%2C+2015+PST&payment_status=Completed&charset=windows-1252&address_zip=95131&first_name=test&mc_fee=1.03&address_country_code=US&address_name=test+buyer¬ify_version=3.8&custom=&payer_status=verified&business=sunxguo-facilitator%40163.com&address_country=United+States&address_city=San+Jose&quantity=1&verify_sign=ACkCvEsJvmOecWFvZsZ4A2g5Nt9MApZMHtotk5..k3ZcBn3q0UA7WuLa&payer_email=sunxguo-buyer%40163.com&txn_id=1VL90883LX3271452&payment_type=instant&last_name=buyer&address_state=CA&receiver_email=sunxguo-facilitator%40163.com&payment_fee=1.03&receiver_id=XX2RXQZAHTW58&txn_type=web_accept&item_name=iphone6+plus+64G%26&mc_currency=USD&item_number=&residence_country=US&test_ipn=1&handling_amount=0.00&transaction_subject=iphone6+plus+64G%26&payment_gross=25.00&shipping=0.00&ipn_track_id=e5af3dcbf778";
		$notify = json_decode($content);
		print_r($notify);
	}
	public function paypal_notify() {
		$message="";
		foreach ($_POST as $k=>$v){
			$message+="【key:".$k."=>value:".$v."】";
		}
		$this->email('1220959492@qq.com','Get PayPal PIN',$message);
		$notify = json_decode(file_get_contents("php://input"));
		//$this->email('1220959492@qq.com','Get PayPal PIN',"data2:".$notify->invoice);
		// 由于这个文件只有被Paypal的服务器访问，所以无需考虑做什么页面什么的，
		// 这个页面不是给人看的，是给机器看的 
		$order_id = (int) $notify->invoice; 
		$order=$this->dbHandler->selectPartData('order','id_order',$order_id);
		$order=$order[0];
		$app=$this->dbHandler->selectPartData('app','id_app',$order->appid_order);
		$app=$app[0];
		$merchant=$this->dbHandler->selectPartData('merchant','id_merchant',$app->merchant_id_app);
		$merchant=$merchant[0];
		// 由于该URL不仅仅只有Paypal的服务器能访问，其他任何服务器都可以向该方法发起请求。
		// 所以要判断请求发起的合法性，也就是要判断请求是否是paypal官方服务器发起的 

		// 拼凑 post 请求数据 
		$req = 'cmd=_notify-validate';// 验证请求 
		$message="invoice:".$notify->invoice;
		foreach ((array)$notify as $k=>$v){ 
			$v = urlencode(stripslashes($v)); 
			$req .= "&{$k}={$v}";
			$message+="【key:".$k."=>value:".$v."】";
		}
		$ch = curl_init(); 
		curl_setopt($ch,CURLOPT_URL,'http://www.sandbox.paypal.com/cgi-bin/webscr'); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch,CURLOPT_POST,1); 
		curl_setopt($ch,CURLOPT_POSTFIELDS,$req); 
		$res = curl_exec($ch); 
		curl_close($ch);
		if( $res && !empty($order) ) { 
			// 本次请求是否由Paypal官方的服务器发出的请求 
			if(strcmp($res, 'VERIFIED') == 0) { 
				/** 
				* 判断订单的状态 
				* 判断订单的收款人 
				* 判断订单金额 
				* 判断货币类型 
				*/ 
				if(($$notify->payment_status != 'Completed' && $notify->payment_status != 'Pending')
				 OR ($notify->receiver_email != $merchant->paypal_merchant)
				  OR ($notify->mc_gross != 13)
				   OR ('USD' != $notify->mc_currency)) { 
				// 如果有任意一项成立，则终止执行。由于是给机器看的，所以不用考虑什么页面。直接输出即可 
					exit('fail'); 
				} else {// 如果验证通过，则证明本次请求是合法的 
					//D('Order')->finishOrder($order_id);// 更改订单状态 
		$this->email('1220959492@qq.com','Success',"付款成功");
					$this->dbHandler->updatedata("order",array("state_order"=>1),"num_order",$order_id);
					exit('success'); 
				} 
			} else { 
				exit('fail'); 
			}
		} 
	} 
	public function get_order_num(){
		$order_num = time();
		return $order_num .= rand(1000,9999);
	}
	public function register(){
		$table="user";
		if(!$this->check_unique("user",array("appid_user"=>$_POST['appid'],"username_user"=>$_POST['username']))){
			echo json_encode(array("result"=>"failed","message"=>"该用户名已经被注册"));
			return false;
		}
		$info=array(
			"appid_user"=>$_POST['appid'],
			"username_user"=>$_POST['username'],
			"pwd_user"=>MD5("kmkj".$_POST['pwd']),
			"state_user"=>0,
			"time_user"=>date("Y-m-d H:i:s"),
			"lasttime_user"=>date("Y-m-d H:i:s")
		);
		$result=$this->dbHandler->insertdata($table,$info);
		if($result==1) echo json_encode(array("result"=>"success","message"=>"信息写入成功"));
		else echo json_encode(array("result"=>"failed","message"=>"信息写入失败"));
	}
	
	public function check_unique($type,$value){
		$result=false;
		switch($type){
			case "user":
				$count=$this->dbHandler->ADU('user',$value);
				if($count<1) $result=true;
			break;
		}
		return $result;
	}
	public function check_user_login(){
		if($this->checkLogin()) $msg="login";
		else $msg="unlogin";
		echo json_encode(array("result"=>"success","message"=>$msg));
	}
	public function login(){
		if(isset($_POST["username"]) && isset($_POST["pwd"])){
			$info=$this->dbHandler->sel_data_by_mul_condition('user',array("username_user"=>$_POST["username"],"appid_user"=>$_POST["appid"]));
			if(count($info,0)==1){
				$post_pwd=MD5("kmkj".$_POST["pwd"]);
				$db_pwd=$info[0]->pwd_user;
				if($post_pwd==$db_pwd){
					$_SESSION['appusername']=$info[0]->username_user;
					$_SESSION['appuserid']=$info[0]->id_user;
//					$_SESSION['appuseravatar']=$info[0]->avatar_merchant;
//					$_SESSION['appusertype']="appuser";
					if($_POST["rememberMe"]){
						setcookie("appusername",$info[0]->username_user, time()+2600000);
						setcookie("appuserid",$info[0]->id_user, time()+2600000);
					}
					$this->dbHandler->updatedata("user",array("lasttime_user"=>date("Y-m-d H:i:s")),"id_user",$_SESSION["appuserid"]);
					echo json_encode(array("result"=>"success","message"=>"登录成功"));
				}
				else{
					echo json_encode(array("result"=>"failed","message"=>"密码错误"));
				}
			}
			else{
				echo json_encode(array("result"=>"failed","message"=>"用户名不存在"));
			}
		}else{
			echo json_encode(array("result"=>"failed","message"=>"请输入用户名和密码"));
		}
	}
	function logout(){
		setcookie("appusername");
		setcookie("appuserid");
		unset($_SESSION["appusername"]);
		unset($_SESSION["appuserid"]);
	}
	/**
	 * 检查用户登录状态
	 * @return boolean 是否已登录
	 */
	function checkLogin(){
		if(isset($_SESSION['appuserid']) && $_SESSION['appuserid']!=""){
			return true;
		} else {
			if (isset($_COOKIE["appusername"])&& isset($_COOKIE["appuserid"]) && $_COOKIE["appuserid"]!="") {
				$_SESSION["appusername"] = $_COOKIE["appusername"];
				$_SESSION["appuserid"] = $_COOKIE["appuserid"];
				return true;
			}
			return false;
		}
	}
	public function change_pwd(){
		$user=$this->dbHandler->selectPartData('user','id_user',$_SESSION["appuserid"]);
		$user=$user[0];
		if($user->pwd_user==MD5("kmkj".$_POST['oldpwd'])){
			$condition=array("id_user"=>$_SESSION["appuserid"]);
			$this->dbHandler->UD("user",array("pwd_user"=>MD5("kmkj".$_POST['newpwd'])),$condition);
			echo json_encode(array("result"=>"success","message"=>"修改成功！"));
		}else echo json_encode(array("result"=>"failed","message"=>"密码输入错误"));
	}

}

/* End of file home.php */
/* Location: ./application/controllers/mobile/home.php */
