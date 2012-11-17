<html>

<head>
	<meta charset="UTF-8" />
	<title>Inserção na BD e consulta do user por Header Request</title>

</head>
<body>
	<?Php
		//header('Access-Control-Allow-Origin: *');
	//header('Access-Control-Allow-Methods : POST,GET,OPTIONS');
	//header('Access-Control-Allow-Headers : CardID');


if (!isset($_GET['CardID'])) 
{
//If not isset -> set with dumy value 
$_GET['CardID'] = -1; 
}

$cardidApi= $_GET['CardID']; 

echo "recebi este Cartão " .$cardidApi;

	$CardID = -1;
include('DBModel.php');
// if (!function_exists('getallheaders')) 
// {
//     function getallheaders() 
//     {
       foreach ($_SERVER as $name => $value) 
       {
       //	echo "<p> $name: ------ $value\n </p>";
	       	switch ($name) {
				case 'CardID':
					$CardID = $value;
				echo "<p>Boa!!! o CardID é: $name: ------ $value\n </p>";

				break;
				case 'HTTP_CARDID':
					$CardID = $value;
				echo "<p>Boa!!! o HTTP_CARDID é: $name: ------ $value\n </p>";

				break;
				default:
			# code...
				break;
			}
           // if (substr($name, 0, 5) == 'HTTP_') 
           // {
           //     $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
           // }
       }
       //return $headers;
//     }
// }



	

//getallheaders() ;

//echo "<p>Boa!!! FORA o CardID é: $CardID\n </p>";

	// foreach (getallheaders() as $name => $value) {

	// 	switch ($name) {
	// 		case 'CardID':
	// 			$CardID = $value;
	// 		//echo "<p>Boa!!! o CardID é: $name: ------ $value\n </p>";

	// 		break;
	// 		default:
	// 	# code...
	// 		break;
	// 	}

//echo "<p> $name: ------ $value\n </p>";
	//}

//	$agora = time();


//Print "Hora e data actual no servidor: ".date('Y-m-d H:i:s')."<br>";//date('c')
//Print "Hora e data actual no servidor: ".date('c')."<br>";//date('c')

if ($CardID <0) {
	$CardID = $cardidApi ;
}

if ($CardID >0) {
	# code...

	echo 'Inserido na bd: '.insertDB($CardID)."<br>";
	procuraDB($CardID) ;
}
// // Check result
// // This shows the actual query sent to MySQL, and the error. Useful for debugging.
// if (!$result) {
//     $message  = 'Invalid query: ' . mysql_error() . "\n";
//     $message .= 'Whole query: ' . $query;
//     die($message);
// }

	?>

</body>
</html>