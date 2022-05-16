<?php 
	$host = "localhost";
	$user = "root";
	$pass = "mysql";
	$dbname = "attendance_db";
	$charset = "utf8mb4";

	$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

	try{
		$pdo = new pdo($dsn,$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch (PDOException $e){
		echo $e->getMessage();
	};

	require_once 'crud.php';
	$crud = new crud($pdo);
?>