<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<html>
	
<head>
	<title>Controle de Gastos:</title>
	<link rel="stylesheet" type="text/css" href="main.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script>
		$(function(){
  			$("#header").load("header.php"); 
  			$("#footer").load("footer.html");
  			$("#sidebar").load("sidebar.html"); 
			});
	</script> 
	</head>
<div id="header"></div>
<p>OLÁ , BEM VINDO AO SISTEMA DE CONTROLE DE GASTOS!!!.</p>
<h1><strong>CONTROLE DE GASTOS</strong></h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		Titulo do Gasto<br>
	<input type="text" name="gasto"><br>
		Valor<br>
	<input type="number" step=0.01 name="valor"><br>
	<input type="submit" value="Submit">
	</form> 


</div>
<div id="footer"></div>
</body>
</html>

<?php
require_once('DataBase.class.php');


	if(!isset($_POST["gasto"])){
		die();
	}

$gasto = $valor = NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["gasto"])) {
    	$gasto = "gasto é necessario";
    	print_r($gasto);
    	die();

  	} else {
    	$gasto = $_POST["gasto"];
  	}
  
  	if (empty($_POST["valor"])) {
    	$valor = "valor é necessario";
    	print_r($valor);
    	die();
  	} else {
    	$valor = $_POST["valor"];
  	}
}

$DB= new DataBase();
$conn=$DB::GetConnection();

$contas = array(
	'gasto'=>$gasto,
	'valor'=>$valor,
	);
$DB::InsereGasto($contas, $conn);



?>