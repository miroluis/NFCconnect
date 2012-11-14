<?php

$name = $_POST['Name']; 
$cardid= $_POST['CardID']; 
$Plano = $_POST['Plan']; 
// Conexão com o Banco de Dados
	//mysql_connect("localhost", "root", "") or die (mysql_error ());
	mysql_connect("localhost", "nfcportu_php", "Php2012") or die (mysql_error ());

	// Seleciona o Banco de Dados
	mysql_select_db("nfcportu_nfcconnect") or die(mysql_error());

	// Comando SQL
//$strSQL = "UPDATE entradas SET Name='Teste3' WHERE CardID=13";
	$strSQL = "UPDATE users ";

	$strSQL = $strSQL . "SET Username = '";

	$strSQL = $strSQL . $name. "' ";
	
//	$strSQL = $strSQL . " Plan = '";

	//$strSQL = $strSQL . $Plano. "' ";

	$strSQL = $strSQL . "Where CardID = ";
	
	$strSQL = $strSQL . $cardid;

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

