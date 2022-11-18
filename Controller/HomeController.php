<?php 
require_once "Controller.php";
class HomeController extends Controller{

	public function dataHome(){
		$allCategory = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/category/read.php");
		$topSelling = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/product/top_selling.php?limit=5");
		$newProduct = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/product/newProduct.php");
		$banner = $this->Get_All("http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/banner/read.php");
		require "View/index.php";
	}
  
}
?>