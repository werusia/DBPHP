<?php
$name='';
$SSN='';
$dept='';
$salary='';
$errEname='';
$errDept='';
$errSSN='';
$errSalary='';
if(isset($_POST['Submit'])){
if (empty($_POST["Ename"])){
	
	$errEname = "wypelnij pole";
	
}else {
	$name = imput($_POST["Ename"]);
	if (!preg_match('/^[a-zA-Z .łęóąśżź]*$/',$name)){
	$errEname = "nieprawidlowe nazwisko";
	}
}
if (empty($_POST["SSN"])){
	
	$errSSN = "wypelnij pole";
	
}else {
	$SSN = imput($_POST["SSN"]);
	if (preg_match('/[a-zA-z]/',$SSN)){
	$errSSN = "nieprawidlowy numer";
	}
}
if (empty($_POST["Dept"])){
	
	$errDept = "wypelnij pole";
	
}else {
	$dept = imput($_POST["Dept"]);
}
if (empty($_POST["Salary"])){
	
	$errSalary = "wypelnij pole";
	
}else {
	$salary = imput($_POST["Salary"]);
	if (preg_match('/[a-zA-z]/',$salary)){
	$errSalary = "nieprawidlowy numer";
	}
}
if (empty($_POST["HomeAddress"])){
	
	$HomeAddress='';
	
}else {
	$HomeAddress = imput($_POST["HomeAddress"]);
	}

}
function imput($data){
	return $data;
}
	?>
<?php
if (!empty($_POST["Ename"])&&!empty($_POST["SSN"])&&!empty($_POST["Dept"])&&!empty($_POST["Salary"])){
	if($errEname == ""&& $errSSN == "" &&$errDept=="" &&$errSalary==''){
	$Ename = $_POST["Ename"];
	$SSN = $_POST["SSN"];
	$Dept = $_POST["Dept"];
	$Salary = $_POST["Salary"];
	$HomeAddress = $_POST["HomeAddress"];
	$Connection = mysql_connect('localhost','root','admin');
	$Selected = mysql_select_db('baza',$Connection);
	$Query = "INSERT INTO emp_baza(enam,ssn,dept,salary,homeaddress)
				VALUES('$Ename','$SSN','$Dept','$Salary','$HomeAddress')";
				mysql_query($Query);
}
}

?>




<!DOCTYPE>
<html>
	<head>
		<title>Insert</title>
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
			<form action="Insert.php" method="Post">
			<fieldset>
		<span class="FieldInfo">Employee name:</span><br><input type ="text" Name="Ename" value=""><span class="error">*<?php echo $errEname;?></span><br>
		<span class="FieldInfo">Social Security Number:</span><br><input type ="text" Name="SSN" value=""><span class="error">*<?php echo $errSSN;?></span><br>
		<span class="FieldInfo">Departament:</span><br><select name="Dept">
				<option value=""></option>
				<option value="Development">Development</option>
				<option value="Clients">Clients</option>
				<option value="Marketing">Marketing</option>
				<option value="Logistics">Logistics</option></select><span class="error">*<?php echo $errDept;?></span><br>
		<span class="FieldInfo">Salary:</span><br><input type ="text" Name="Salary" value=""><span class="error">*<?php echo $errSalary;?></span><br>
		<span class="FieldInfo">(Optional)Home Address:</span><br><textarea Name="HomeAddress"></textarea><br>
		<br><input type ="submit" Name="Submit" value="Submit record"><br>
		</fieldset>
			</form>
			
	</div>
	

	</body>

</html>