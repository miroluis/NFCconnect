<?php

function insertDB($CardID) {
	$host = 'localhost';
$username = "nfcportu_php";
$password = "Php2012";
// Conexão com o Banco de Dados
	//mysql_connect("localhost", "root", "") or die (mysql_error ());
	mysql_connect($host, $username, $password) or die (mysql_error ());

	// Seleciona o Banco de Dados
	mysql_select_db("nfcportu_nfcconnect") or die(mysql_error());

	// Comando SQL

	$strSQL = "INSERT INTO entradas(";

	$strSQL = $strSQL . "CardID, ";
	//$strSQL = $strSQL . "Name, ";

	//$strSQL = $strSQL . "Plan, ";
	$strSQL = $strSQL . "LastIn_Out) ";

	$strSQL = $strSQL . "VALUES(";

	$strSQL = $strSQL . $CardID . ", ";//"'9993', ";

	//$strSQL = $strSQL . "'Teste inserido do PHP', ";
	//$strSQL = $strSQL . "'Horas', ";

	$strSQL = $strSQL . "'".date('Y-m-d H:i:s')."')";

	//Print $strSQL;
Print "<br>";
	// Comando SQL executado 
	mysql_query($strSQL) or die (mysql_error());

	// Encerra conexão
	mysql_close();
}

function procuraDB($CardID) {
	$host = 'localhost';
$username = "nfcportu_php";
$password = "Php2012";
// Conexão com o Banco de Dados
	//mysql_connect("localhost", "root", "") or die (mysql_error ());
	mysql_connect($host, $username, $password) or die (mysql_error ());

	// Seleciona o Banco de Dados
	mysql_select_db("nfcportu_nfcconnect") or die(mysql_error());

	$query = sprintf("SELECT * FROM users WHERE CardID='%s'",
		mysql_real_escape_string($CardID));
// Perform Query
	$result = mysql_query($query) or die (mysql_error());

		// Encerra conexão
	mysql_close();

	$num_rows = mysql_num_rows($result);

	if ($num_rows == 0) {
		Print "*>Utilizador desconhecido<<|";
		exit;
	}

	while ($row = mysql_fetch_assoc($result)) {
		Print "*>Bom dia ". $row["Username"]."<|";
	}
}

?>
