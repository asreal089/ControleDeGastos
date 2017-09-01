<!DOCTYPE html>
<html>
<head>
	<title>CV ONLINE</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script> 
		$(function(){
  			$("#header").load("header.php"); 
  			$("#footer").load("footer.html");
		});
	</script> 

	<div id="header"></div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
		Titulo do Gasto<br>
	<input type="text" name="gasto"><br>
		Valor<br>
	<input type="number" step=0.01 name="valor"><br>
	<input type="hidden" name="id" id="hiddenField" value="<?=$_GET['id'] ?>" />
	<input type="submit" value="Submit">
	</form> 



<div id="footer"></div>
</body>
</html>
<?php
	require_once('DataBase.class.php');

	$DB= new DataBase();
	$conn=$DB::GetConnection();


	if(!isset($_POST["gasto"])){
		die();
	}
	if(!isset($_POST["valor"])){
		die();
	}
	if(!isset($_POST["id"])){
		die();
	}

	$id = $_POST["id"];
	$valor = $_POST["valor"];
	$gasto = $_POST["gasto"];

	$contaEdicao = array(
		'id' => $id,
	);

	$contaEdicao['valor'] = $valor;
	$contaEdicao['gasto'] = $gasto;

	$DB::EditarGasto($contaEdicao, $conn);
	header("Location:controle.php");


?>