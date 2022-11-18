<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/size.php";
$size_obj = new Size();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get=json_decode(file_get_contents("php://input"),TRUE);
	if(!empty($data_get)){
		$size_obj->deliver_response(200, "Đã nhận được dữ liệu", null);
		$data = array();
		$data['size'] = $data_get['size'];
		$result = $size_obj->insert($data);
		if($result){
			$size_obj->deliver_response(200, "Thêm dữ liệu thành công", null);
		}else{
			$size_obj->deliver_response(200, "Thêm dữ liệu thất bại", null);
		}
	}else{
		$size_obj->deliver_response(200, "Không nhận được dữ liệu", null);
	}
}else{
	$size_obj->deliver_response(400, "Không hợp lệ - yêu cầu phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/create.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 4)
?>