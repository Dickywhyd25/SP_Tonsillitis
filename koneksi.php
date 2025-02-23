<?php
// error_reporting(E_ALL ^ E_DEPRECATED);
$host="localhost";
$user="root";
$pass="";
$dbName="db_tonsillitis_ds";
$koneksi=mysql_connect($host,$user,$pass);
$db=mysql_select_db($dbName,$koneksi)
// or die("<center color='red'><strong>" .mysql_error()."</strong></center>")
;
if(!$koneksi){
	echo"<center><font color='red'><strong>Koneksi Gagal...!</strong></font></center>";
	echo"<center><font color='red'><strong>DATABASE $dbName tidak ditemukan...!</strong></font></center>";
	}



?>