<?php

$name = $_POST['Name']; 
$cardid= $_POST['CardID']; 
//$Plano = $_POST['Plan']; 
// Conexão com o Banco de Dados
	//mysql_connect("localhost", "root", "") or die (mysql_error ());
$host = "localhost";
$username = "nfcportu_php";
$password = "Php2012";
mysql_connect($host, $username, $password) or die (mysql_error ());

	// Seleciona o Banco de Dados
mysql_select_db("nfcportu_nfcconnect") or die(mysql_error());

	// Comando SQL
//$strSQL = "UPDATE entradas SET Name='Teste3' WHERE CardID=13";
$strSQL = "INSERT INTO users(";

	$strSQL = $strSQL . "CardID, ";
	//$strSQL = $strSQL . "Name, ";

	//$strSQL = $strSQL . "Plan, ";
	$strSQL = $strSQL . "Username) ";

	$strSQL = $strSQL . "VALUES(";

	$strSQL = $strSQL . $cardid . ", '";//"'9993', ";

	//$strSQL = $strSQL . "'Teste inserido do PHP', ";
	//$strSQL = $strSQL . "'Horas', ";

	$strSQL = $strSQL . $name."')";

	//Print $strSQL;

	// Comando SQL executado 
	mysql_query($strSQL) or die (mysql_error());

	// Encerra conexão
	mysql_close();
//UPDATE `entradas` SET `Name`='Teste' WHERE `CardID`=13
	ob_start(); // ensures anything dumped out will be caught

// do stuff here
$url = '/nfcconnect/ListaEntradas.php'; // this can be set based on whatever

// clear out the output buffer
while (ob_get_status()) 
{
    ob_end_clean();
}

// no redirect
header( "Location: $url" );
?>
