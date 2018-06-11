<?php
$Connection = mysql_connect('localhost','root','admin');
$Selected = mysql_select_db('baza',$Connection);

$Delete_id = $_GET['Delete'];
$Delete_query = mysql_query( "DELETE FROM emp_baza WHERE id = '$Delete_id'");
if($Delete_query){
	echo '<script>window.open("Database_Table.php","_self")</script>';
	
}



 ?>