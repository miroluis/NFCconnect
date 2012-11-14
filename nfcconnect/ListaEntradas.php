<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();
//if($_SESSION["Login"]="No"){
if(!isset($_SESSION['myusername']) ){
	//!session_is_registered(myusername)){
header("location:main_login.php");
}
?>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Teste do Header Request - entradas</title>

</head>
<body>

	Estas foram os Cartões que deram entrada: </br>

	<?php
		$host = "localhost";
		$username = "nfcportu_php";
		$password = "Php2012";
		mysql_connect($host, $username, $password) or die (mysql_error ());

	// Seleciona o Banco de Dados
	mysql_select_db("nfcportu_nfcconnect") or die(mysql_error());

	// Get data from the database depending on the value of the id in the URL
	//$strSQL = "SELECT * FROM entradas";
	$strSQL = "SELECT entradas.CardID, users.username, entradas.LastIn_Out";
	$strSQL = $strSQL . " FROM entradas ";
	$strSQL = $strSQL . " LEFT JOIN users ";
	$strSQL = $strSQL . " ON entradas.cardid = users.cardid";
	$strSQL = $strSQL . " ORDER BY UNIX_TIMESTAMP(entradas.LastIn_Out) desc";
	$rs = mysql_query($strSQL);
	
	Print "<table border cellpadding=3>"; 

 		Print "<tr>"; 
 		Print "<th>CardID</th> <th>Name</th><th>Plano</th><th>Last In Out Time</th><th>Remanig Time</th><th>Edit</th>";
 		Print "</tr>";
	// Loop the recordset $rs
	while($row = mysql_fetch_array($rs)) {

 		Print "<tr>"; 
 		Print "<td>".$row['CardID'] . "</td> "; 
		Print "<td>".$row['username'] . " </td>";
		Print "<td> </td>";//".$row['Plan'] . "
		Print "<td>".$row['LastIn_Out'] . " </td>";
		Print "<td> </td>";//".$row['Remaning_Time'] . "
		$link = "<a href=/nfcconnect/EditaCartao.php?cardid=".$row['CardID'].">link</a>";//http://localhost
		Print "<td> ".$link." </td>";
		Print "</tr>"; 
		//"<a href=http://localhost/editacartao.php?cardid=".$row['CardID'].">link</a>"
		// Write the data of the person
	//	echo "<dt>Name:</dt><dd>" . $row["FirstName"] . " " . $row["LastName"] . "</dd>";
	//	echo "<dt>Phone:</dt><dd>" . $row["Phone"] . "</dd>";
	//	echo "<dt>Birthdate:</dt><dd>" . $row["BirthDate"] . "</dd>";

	}
	Print "</table>"; 
	// Close the database connection
	mysql_close();


	
	?>
<a href="/nfcconnect/logout.php">LogOut</a>
<!--http://localhost-->
</body>
</html>
