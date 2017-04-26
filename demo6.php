<?php
	$opt=array(PDO::ATTR_AUTOCOMMIT=>1,PDO::ATTR_PERSISTENT=>false);
	try{
		$pdo=new PDO("uri:dsn.ini","root","lvyang@123456",$opt);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "数据库连接失败！".$e->getMessage()."<br>";
		exit;
	}
	echo "连接数据库成功！<br>";
	try{
		//$stmt=$pdo->prepare("insert into shops(name,price,num,desn) values(?,?,?,?)");
		$stmt=$pdo->prepare("insert into shops(name,price,num,desn) values(:name,:price,:num,:desn)");

		$stmt->bindParam(":name",$name);
		$stmt->bindParam(":price",$price);
		$stmt->bindParam(":num",$num);
		$stmt->bindParam(":desn",$desn);
		
		$name="wwww1";
		$price=34.51;
		$num=1001;
		$desn="hello world1";

		if($stmt->execute()){
			echo "执行成功<br>";
			echo "最后插入的ID：".$pdo->lastInsertId()."<br>";
		}else{
			echo "执行失败<br>";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	


