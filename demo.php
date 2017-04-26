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
		//$stmt=$pdo->prepare("insert into shops(name,price,num,desn) values(:name,:price,:num,:desn)");
		//$stmt=$pdo->prepare("update shops set name=:name,price=:price,num=:num,desn=:desn where id=:id");
		//$stmt=$pdo->prepare("update shops set name=?,price=?,num=?,desn=? where id=?");I
		$sql="select id,name,description,pid from bro_category";
/*
		$stmt->bindParam(":name",$name);
		$stmt->bindParam(":price",$price);
		$stmt->bindParam(":num",$num);
		$stmt->bindParam(":desn",$desn);
		$stmt->bindParam(":id",$id);
		
		$name="mmm";
		$price=34.51;
		$num=1001;
		$desn="hello world1";
		$id=126;

		if($stmt->execute()){
			echo "执行成功<br>";
		}else{
			echo "执行失败<br>";
		}
		$name="nnn";
		$price=333;
		$num=333;
		$desn="333333";
		$id=127;

		if($stmt->execute()){
			echo "执行成功<br>";
		}else{
			echo "执行失败<br>";
		}
*/
/*
	$stmt->execute(array(":price"=>99,":name"=>kkk1,":num"=>1,":desn"=>"aaa1",":id"=>125));
	$stmt->execute(array(":price"=>88,":name"=>kkk2,":num"=>2,":desn"=>"aaa2",":id"=>126));
	$stmt->execute(array(":price"=>77,":name"=>kkk3,":num"=>3,":desn"=>"aaa3",":id"=>127));
*/
	//$stmt->execute(array("fff1",12.34,1000,"fine",125));
	//$stmt->execute(array("fff2",123.4,2000,"fine2",126));
	//$stmt->execute(array("fff3",1234,3000,"fine3",127));
	foreach($pdo->query($sql) as $row){
		echo $row['id']."\t";
		echo $row['name']."\t";
		echo $row['description']."\t";
		echo $row['pid']."\n";
	}

	}catch(PDOException $e){
		echo $e->getMessage();
	}
	


