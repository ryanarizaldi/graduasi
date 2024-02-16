<?php
/*$nama_server="localhost";
	$konek_db=mysqli_connect("$nama_server","root","bankpapua123","gw_dhn");
	
	$url='http://114.4.135.141:3030/Gateway/gateway/services/v2/postData';
	$ipgw='118.97.30.43';
	*/

//KONEKSI SQL SERVER STAGING DATAFARM
// $serverName = "10.234.88.133"; //ip lama //serverName\instanceName 
// $serverName = "10.234.88.57"; //serverName\instanceName
// $connectionInfo = array("Database" => "STAGING_DATAFARM", "UID" => "sikp", "PWD" => "papua123");
// $conn = sqlsrv_connect($serverName, $connectionInfo);
// if ($conn) {
// 	echo "Connection established.<br />";
// } else {
// 	echo "Connection could not be established.<br />";
// 	die(print_r(sqlsrv_errors(), true));
// }

// KONEKSI SQL SERVER local DATAFARMan
// $serverName = "10.234.88.133"; //ip lama //serverName\instanceName 
// $serverName = "10.234.88.57"; //serverName\instanceName
// $serverName = ".\SQLEXPRESS"; //serverName\instanceName
$serverName = ".\SQLEXPRESS"; //serverName\instanceName
// $serverName = "(local)"; //serverName\instanceName
$connectionInfo = array("Database" => "dev_datafarm", "UID" => "coba", "PWD" => "1");
$conn = sqlsrv_connect($serverName, $connectionInfo);
// if ($conn) {
// 	echo "Connection established.<br />";
// } else {
// 	echo "Connection could not be established.<br />";
// 	echo ("<pre>" . print_r(sqlsrv_errors(), true) . "</pre>");
// }

//KONEKSI MYSQL DATABASE UTAMA
// $sikpDb = mysqli_connect("localhost:3306", "root", "bankpapua132", "sikp");
$sikpDb = mysqli_connect("localhost:3309", "root", "bankpapua132", "sikp"); //DATABASE LOCAL
$sikpDevDb = mysqli_connect("localhost:3309", "root", "bankpapua132", "sikp_dev"); //DATABASE LOCAL
// $sikpDb = mysqli_connect("localhost:3306", "root", "bankpapua132", "sikp_dev");//DATABASE DEVELOPMENT

//URL
// $urlsikp = "http://10.242.43.73/api/v1/"; //PRODUCTION
// $urlsikp = "http://10.242.104.166/api/v1/"; //DEVELOPMENT

//API SIKP BARU 29 09 2023
// $urlsikp = "http://10.216.55.13/api/v1/"; //DEVELOPMENT
$urlsikp = "http://10.216.55.9/api/v1/"; //PRODUCTION
$url = 'http://150.150.1.87:6060/Gateway/gateway/services/v2/postData';
