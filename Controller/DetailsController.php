<?php 
require_once "Controller.php";
class Details extends Controller{
	public function index(){
		$allCategory = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/category/read.php");
		$idProduct = isset($_GET['id']) ? $_GET['id'] : Null;
		if($idProduct){
			$productDetails = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/product/read_one.php?id=".$idProduct);
			$productImages = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/image/read.php?idProduct=".$idProduct);
			$productSimilar = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/product/read_similar.php?id=".$idProduct);
		}else{
			$productDetails = Null;
		}
		require "View/index.php";
	}
}

?>