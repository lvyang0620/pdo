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
	//echo $pdo->getAttribute(PDO::ATTR_PERSISTENT)."<br>";
	//echo $pdo->getAttribute(PDO::ATTR_AUTOCOMMIT)."<br>";
	//echo $pdo->getAttribute(PDO::ATTR_CLIENT_VERSION)."<br>";
	//echo $pdo->getAttribute(PDO::ATTR_SERVER_VERSION)."<br>";
	//echo $pdo->getAttribute(PDO::ATTR_DRIVER_NAME)."<br>";

	$affected_rows=$pdo->exec("insert into shops(name,price,num,desn) values('xsphp','12','35','nice')");

	if(!$affected_rows){
		echo $pdo->errorCode();
		echo "<pre>";
			print_r($pdo->errorInfo());
		echo "</pre>";
	}else{
		echo "执行成功！<br>";
	}

