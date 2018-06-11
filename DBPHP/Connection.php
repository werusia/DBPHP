<html>
	<head>
		<title>Connection</title>
	</head>

	<body>
<?php 
$Connection = mysql_connect('localhost','root','admin');
if($Connection){
	echo 'Database connected <br>';
}else{
	error.mysql_connect();
}
$Selected = mysql_select_db('baza',$Connection);
if($Selected){
	echo 'Database selected';
}else{
	error.mysql_select_db();
}
?>
	</body>

</html>