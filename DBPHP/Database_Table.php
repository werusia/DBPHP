<html>
	<head>
	<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #3CBC8D;
    color: white;
}

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
		<title>EMP Table</title>
	</head>
	<body>
		<div>
	<form action= "Database_Table.php" method="Get">
		<fieldset>
			<input type="text" Name="Search" value="" placeholder="Wpisz nazwisko lub ssn">
			<input type="Submit" Name="SearchButton" value="Szukaj">
		</fieldset>
		</form>
		</div>
	<?php
	$Connection = mysql_connect('localhost','root','admin');
	$Selected = mysql_select_db('baza',$Connection);
	if(isset($_GET["SearchButton"])){
		$Search = $_GET["Search"];
		$Search_query = mysql_query("SELECT * FROM emp_baza WHERE enam LIKE '%$Search%' OR ssn LIKE '%$Search%'");
		while($row=mysql_fetch_array($Search_query)){
			$id = $row['id'];
			$name = $row['enam'];
			$ssn = $row['ssn'];
			$salary = $row['salary'];
			$department = $row['dept'];
			$address = $row['homeaddress'];
		?>
		<table id="customers">
		<caption><h1>Wynik wyszukiwania</h1></caption>
		<tr>
			<th>ID</th>
			<th>Nazwisko</th>
			<th>Social Security Number</th> 
			<th>Departament</th>
			<th>Zarobki</th>
			<th>Adres</th>
			<th> + </th>
		</tr>
		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $name; ?></td>
			<td><?php echo $ssn; ?></td>
			<td><?php echo $department; ?></td>
			<td><?php echo $salary; ?></td>
			<td><?php echo $address; ?></td>
			<td><a href="Database_Table.php">Szukaj ponownie</a></td>
		
		</tr>
		</table>
		<?php
	}
	}
?>	
	
	
	
	<table id="customers">
	<caption><h1> EMP Table</h1></caption>
  <tr>
	<th>ID</th>
    <th>Nazwisko</th>
    <th>Social Security Number</th> 
    <th>Departament</th>
	<th>Zarobki</th>
	<th>Adres</th>
	<th>Usun</th>
	<th>Zaktualizuj</th>
  </tr>

<?php 
$Connection = mysql_connect('localhost','root','admin');
$Selected = mysql_select_db('baza',$Connection);
$Query = mysql_query("SELECT * FROM emp_baza");
while($row=mysql_fetch_array($Query)){
	$id = $row["id"];
	$name = $row["enam"];
	$ssn = $row["ssn"];
	$department = $row["dept"];
	$salary = $row["salary"];
	$address = $row["homeaddress"];

?>
<tr>
<td><?php echo $id; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $ssn; ?></td>
<td><?php echo $department; ?></td>
<td><?php echo $salary; ?></td>
<td><?php echo $address; ?></td>
<td><a href = "Delete.php?Delete=<?php echo $id;?>">Usun</a></td>
<td><a href = "Update.php?Update=<?php echo $id;?>">Zaktualizuj</a></td>

</tr>
<?php } ?>
</table>
	</body>

</html>