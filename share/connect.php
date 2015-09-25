<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
/**
 * Created by PhpStorm.
 * User: TheAnh
 * Date: 29/04/2014
 * Time: 17:18
 */

//Khai bao cac thong tin
$host = 'localhost';
$user = 'root';
$pass = '';
$data_name = 'store_mng';

//Ket toi database
$conn = mysql_connect($host, $user, $pass) or die("Could not connect to database. Fuzk: " . mysql_error());

mysql_select_db($data_name) or die ("Could not select database");
mysql_query("SET NAMES utf8");


?>

