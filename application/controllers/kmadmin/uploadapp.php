<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
@session_start();

class Uploadapp extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper("base");
		$this->load->helper("phpqrcode");
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
//		$apps=$this->dbHandler->selectPartData("app","state_app","1");
		$condition=array("state_app"=>"1");
		$apps=$this->dbHandler->SDSDOR('app',$condition,array("limit"=>100,"offset"=>0),"<app>",array(),array("col"=>'update_time_app',"by"=>'asc'),array(),"merchant","merchant_id_app=id_merchant");
		$data=array("apps"=>$apps);
		$this->load->view('kmadmin/uploadapp', $data);
	}
	public function upload(){
//		if(($_FILES["file"]["type"] == "application/octet-stream") || ($_FILES["file"]["type"] == "image/jpeg") && ($_FILES["file"]["size"] < 20000000)){
			if ($_FILES["file"]["error"] > 0){
				echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
			}
			else{
				$dst_name=time().$_POST['merchant'].$_POST['appid'];
				$dst_name=time().$_POST['merchant'].$_POST['appid'];
				$data=array();
				if($_POST['apptype']=="android"){
					$field="android_link_app";
					$dst_name.=".apk";
					$app=$this->dbHandler->selectPartData('app','id_app',$_POST['appid']);
					$app=$app[0];
					$data["two_code_app"]=$this->twoDimensionCode(WEBSITE_URL."/market/download?appid=".$_POST['appid'],$_POST['appid'],$app->icon_app);
				}else{
					$field="ios_link_app";
					$dst_name.=".ipa";
				}
				$data[$field]="/uploads/app/".$dst_name;
				$data["state_app"]=3;
				echo "Upload: " . $dst_name . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
				if (file_exists("uploads/app" . $dst_name)){
					echo $dst_name . " already exists. ";
				}else{
					move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/app/" . $dst_name);
					echo "Stored in: " . "uploads/app/" . $dst_name;
					$this->dbHandler->UD("app",$data,array("id_app"=>$_POST['appid']));
				}
			}
//		}else{
//			echo "Invalid file";
//		}
	}
	public function twoDimensionCode($text,$appid,$logoSrc){
		$value = $text; //二维码内容   
		$errorCorrectionLevel = 'H';//容错级别   
		$matrixPointSize = 10;//生成图片大小    
		$QR = $_SERVER['DOCUMENT_ROOT'].'/uploads/2dcode/'.$appid.'qrcode.png';//已经生成的原始二维码图    
		
		//生成二维码图片
		QRcode::png($value,$QR, $errorCorrectionLevel, $matrixPointSize, 2);   
		$logo = $_SERVER['DOCUMENT_ROOT'].$logoSrc;//准备好的logo图片 

		if ($logo !== FALSE) {
			$QR = imagecreatefromstring(file_get_contents($QR));   
			$logo = imagecreatefromstring(file_get_contents($logo));   
			$QR_width = imagesx($QR);//二维码图片宽度   
			$QR_height = imagesy($QR);//二维码图片高度   
			$logo_width = imagesx($logo);//logo图片宽度   
			$logo_height = imagesy($logo);//logo图片高度   
			$logo_qr_width = $QR_width / 4;
			$scale = $logo_width/$logo_qr_width;
			$logo_qr_height = $logo_height/$scale;
			$from_width = ($QR_width - $logo_qr_width) / 2;
			//重新组合图片并调整大小   
			imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,   
			$logo_qr_height, $logo_width, $logo_height);   
		}   
		//输出图片地址
		$dstLocation='/uploads/2dcode/'.$appid.'withlogo.png';
		//输出图片   
		imagepng($QR,$_SERVER['DOCUMENT_ROOT'].$dstLocation);   
		return  $dstLocation; 
	}
}
/* End of file uploadapp.php */
/* Location: ./application/controllers/kmadmin/uploadapp.php */
?>