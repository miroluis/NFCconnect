<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>Edição do Cartão</title>

</head>
<body>

	Edição do Cartão</br>

		<?php

		$cardid = $_GET['cardid'];

		//header('Content-Type: text/html; charset=utf-8');

		//Print "";

		$host = "localhost";
		$username = "nfcportu_php";
		$password = "Php2012";
		mysql_connect($host, $username, $password) or die (mysql_error ());

	// Seleciona o Banco de Dados
		mysql_select_db("nfcportu_nfcconnect") or die(mysql_error());

	// Get data from the database depending on the value of the id in the URL
		$strSQL = "SELECT * FROM users where CardID = ".$cardid;
		$rs = mysql_query($strSQL);
	// Encerra conex?o
		mysql_close();
		$num_rows = mysql_num_rows($rs);
		if ($num_rows<1) {
			Print "<form action='insert.php' method='post'>";

			Print	"Numero do Cartão: <input type='text' name='CardID' value = ".$cardid." readonly = 'readonly'><br>";
			Print	"Nome: <input type='text' name='Name' value = ><br>";//'".$row['Username']."''

			Print "<input type='submit' value='Insert' />";
		}
		else{
			$row = mysql_fetch_array($rs);
			Print "<form action='update.php' method='post'>";

			Print	"Numero do Cartão: <input type='text' name='CardID' value = ".$cardid." readonly = 'readonly'><br>";
			Print	"Nome: <input type='text' name='Name' value = '".$row['Username']."''><br>";

			Print "<input type='submit' value='Update' />";
		}
		Print "<a href='/nfcconnect/ListaEntradas.php'>Voltar</a>";
		Print "</form>";
	?>
</body>
</html>