<?php
$Connection = mysql_connect('localhost','root','admin');
$Selected = mysql_select_db('baza',$Connection);

$Update_Record = $_GET['Update'];
$Update_query = mysql_query( "SELECT * FROM emp_baza WHERE id = '$Update_Record'");
while($row=mysql_fetch_array($Update_query)){
	$Update_id = $row["id"];
	$name = $row["enam"];
	$ssn = $row["ssn"];
	$department = $row["dept"];
	$salary = $row["salary"];
	$homeaddress = $row["homeaddress"];
	
}

?>
<!DOCTYPE>
<html>
	<head>
		<title>Update</title>
	</head>
<style type ="text/css">
input[type="text"], textarea,  select {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-color: #99ccff;
    border-radius: 40px;
    background-color: #3CBC8D;
    color: white;
}
input[type="submit"]{
	
	background-color: #3CBC8D;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
	
}
.FieldInfo{
	text-indent: 50px;
    text-align: justify;
    letter-spacing: 3px;
}
form{
	margin: 0 auto; 
	width:700px;
	text-align: center;
}
</style>
	<body>
	<div>
			<form action="Update.php?Update_id=<?php echo $Update_id;?>" method="Post">
			<fieldset>
		<span class="FieldInfo">Employee name:</span><br><input type ="text" Name="Ename" value="<?php echo $name; ?>"><br>
		<span class="FieldInfo">Social Security Number:</span><br><input type ="text" Name="SSN" value="<?php echo $ssn; ?>"><br>
		<span class="FieldInfo">Departament:</span><br><select name="Dept"><?php echo $department; ?>
				<option value=""></option>
				<option value="Development">Development</option>
				<option value="Clients">Clients</option>
				<option value="Marketing">Marketing</option>
				<option value="Logistics">Logistics</option>
				</select><br>
		<span class="FieldInfo">Salary:</span><br><input type ="text" Name="Salary" value="<?php echo $salary;?>"><br>
		<span class="FieldInfo">(Optional)Home Address:</span><br><textarea Name="HomeAddress"><?php echo $homeaddress; ?></textarea><br>
		<br><input type ="submit" Name="Submit" value="Update"><br>
		</fieldset>
			</form>
			
	</div>
	

	</body>

</html>








<?php
//edycja
$Connection = mysql_connect('localhost','root','admin');
$Selected = mysql_select_db('baza',$Connection);
if(isset($_POST['Submit'])){
	$Update_id = $_GET["Update_id"];
	$name = $_POST["Ename"];
	$ssn = $_POST["SSN"];
	$department = $_POST["Dept"];
	$salary = $_POST["Salary"];
	$homeaddress = $_POST["HomeAddress"];
$UpdateQuery = mysql_query("UPDATE emp_baza SET enam = '$name', ssn = '$ssn', dept = '$department', salary = '$salary', homeaddress = '$homeaddress'
WHERE id='$Update_id'");
if($UpdateQuery){
	echo '<script>window.open("Database_Table.php","_self")</script>';
}
	
	
}

	




 ?>
 