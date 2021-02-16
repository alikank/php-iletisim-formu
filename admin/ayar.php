<?php

try {
	$db=new PDO("mysql:host=localhost;dbname=akose_iletisim;charset=utf8;","root","");

	
} catch (PDOException $e) {
	echo $e->getMessage();
}


?>