<?php 
require_once('model.php');
class Product extends Model 
{
	var $table = "product";
	var $contens = "idProduct";

	public function similar_product($idProduct){
		$query = "SELECT * FROM product 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize 
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
						FROM image WHERE image.isMain = 1) as image 
						ON product.idProduct = image.idPro 
					WHERE NOT product.idProduct = $idProduct
						AND product.idBrand = (SELECT idBrand FROM product 
												WHERE idProduct =$idProduct) LIMIT 2";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function findFull($id){
		$query = "SELECT * FROM product 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
								FROM image WHERE image.isMain = 1) as image 
					ON product.idProduct = image.idPro
					WHERE product.idProduct = ".$id;
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function searchFull($input){
		$query = "SELECT * FROM product 
					INNER JOIN brand ON product.idBrand = brand.idBrand 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
								FROM image WHERE image.isMain = 1) as image 
					ON product.idProduct = image.idPro
					WHERE ".$input;
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	function search_full($input){
		$columnNames = $this->showAll_nameColumn();
		//print_r($columnNames);
		$f = "";
		foreach($columnNames as $key=>$value){
			$f .= "product.".$value['COLUMN_NAME'] . " LIKE " . "'%".$input."%' OR ";
		}
		$f = trim($f, 'OR ');  // ph???i c?? d???u c??ch ch??? OR v?? h??m trim t??nh lu??n d???u c??ch ????
			//echo $f;
		$query = "SELECT * FROM $this->table 
					INNER JOIN brand ON product.idBrand = brand.idBrand 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
					FROM image WHERE image.isMain = 1) as image 
					ON product.idProduct = image.idPro
					WHERE $f";
		//print_r($query);
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}



	// c?? bao g???m img
	public function read_full(){
		$query = "SELECT * FROM product 
					INNER JOIN brand ON product.idBrand = brand.idBrand 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
						FROM image WHERE image.isMain = 1) as image 
						ON product.idProduct = image.idPro 
					ORDER BY product.idProduct ASC;";

		// th???c thi c??u l???nh truy v???n
		$result = $this->conn->query($query);

		// l???p qua c??c h??ng trong $result v?? l??u v??o m???ng data
		$data = array();

		while($row = $result->fetch_assoc() ){
			$data[] = $row;
		}

		return $data;
	}


	public function read_details($idProduct){
		$query = "Select * from product
		INNER JOIN brand ON product.idBrand = brand.idBrand 
		inner join categoryproduct on product.idCategoryProduct = categoryproduct.idCategoryProduct

		inner join quantity on product.idQuantity = quantity.idQuantity
		inner join color on quantity.idColor = color.idcolor
		inner join size on quantity.idSize = size.idsize
		where product.idProduct = ".$idProduct;

		// th???c thi c??u l???nh truy v???n
		$result = $this->conn->query($query);

		// l???p qua c??c h??ng trong $result v?? l??u v??o m???ng data
		$data = array();
		while($row = $result->fetch_assoc() ){
			$data[] = $row;
		}

		return $data;
	}

	public function create_full($data_quantity, $data){
		$f = "";
		$v = "";
		foreach($data_quantity as $key => $value){
			$f .= $key . ",";
			$v .= "'" . $value . "',";
		}
		// x??a d???u , ??? ?????u ho???c cu???i 
		$f = trim($f, ",");   // $f l?? t??n c??c c???t
		$v = trim($v, ",");	// $v l?? gi?? tr??? th??m v??o c??c c???t
		// query d?????i t????ng ???ng nh?? insert into table(cot1, cot2, cot 3) VALUE (value1, value2, value3)
		$query = "INSERT INTO quantity($f) VALUES($v)";
		$status = $this->conn->query($query);
		if($status == true){
			
			$idQuantity_insert = $this->conn->query("SELECT max(idQuantity) as idQuantity FROM quantity")->fetch_assoc();
			$data['idQuantity'] = (int)$idQuantity_insert['idQuantity'];
			$f2 = "";
			$v2 = "";
			foreach($data as $key => $value){
				$f2 .= $key . ",";
				$v2 .= "'" . $value . "',";
			}
			// x??a d???u , ??? ?????u ho???c cu???i 
			$f2 = trim($f2, ",");   // $f l?? t??n c??c c???t
			$v2 = trim($v2, ",");	// $v l?? gi?? tr??? th??m v??o c??c c???t
			// query d?????i t????ng ???ng nh?? insert into table(cot1, cot2, cot 3) VALUE (value1, value2, value3)
			$query2 = "INSERT INTO $this->table($f2) VALUES($v2)";
			$status2 = $this->conn->query($query2);
			return $status2;
		} else{
			setcookie('msg', 'Th??m kh??ng th??nh c??ng', time() + 2);
			//header('Location: ?mod='.$this->table . '&act=add');
		}
	}

	public function delete_Full($id){
		$q = "SELECT * FROM image WHERE idProduct=$id";
		$result = $this->conn->query($q)->fetch_assoc();
		if($result){
			$query = "DELETE product, image, quantity
			FROM product, image, quantity
			WHERE product.idProduct = $id 
			AND product.idProduct = image.idProduct 
			AND product.idQuantity = quantity.idQuantity;";
			$status = $this->conn->query($query);
			return $status;
		}else{
			$query2 = "DELETE product, quantity
			FROM product, quantity
			WHERE product.idProduct = $id 
			AND product.idQuantity = quantity.idQuantity;";
			$status2 = $this->conn->query($query2);
			return $status2;
		}
	}


	public function update_full($data_quantity, $data_product){
		$v = "";
		foreach($data_quantity as $key => $value){
			$v .= $key."='".$value."',";
		}
		$v = trim($v, ",");	// $v l?? gi?? tr??? th??m v??o c??c c???t
		$query = "UPDATE quantity SET $v WHERE idQuantity = ".$data_product['idQuantity'];
		$status = $this->conn->query($query);
		if($status == true){
			$v2 = "";
			foreach($data_product as $key => $value){
				$v2 .= $key."='".$value."',";
			}
			$v2 = trim($v2, ",");
			$query2 = "UPDATE $this->table SET $v2 WHERE $this->contens = ".$data_product[$this->contens];
			$status2 = $this->conn->query($query2);
			return $status2;
		} else{
			setcookie('msg', 'Th??m kh??ng th??nh c??ng', time() + 2);
			//header('Location: ?mod='.$this->table . '&act=add');
		}
	}

	public function topSelling($num_limit){
		$query = "SELECT * FROM product 
		LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
			FROM image WHERE image.isMain = 1) as image 
		ON product.idProduct = image.idPro 
		ORDER BY product.productSold DESC
		LIMIT $num_limit";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function newProduct(){
		$query = "SELECT * FROM product 
		LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
			FROM image WHERE image.isMain = 1) as image 
		ON product.idProduct = image.idPro 
		ORDER BY product.dateIN DESC
		LIMIT 5";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}


}
?>