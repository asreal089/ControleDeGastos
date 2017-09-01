<?php

class DataBase{

	public static function GetConnection(){

		$servername = "localhost";
		$username = "root";
		$password = "123";
		$dbname = "Contas";

		$conn = null;

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    }
		catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }
		return $conn;

	}

	public static function InsereGasto($gasto, $conn){

		$sql = "INSERT INTO Gastos (conta, valor) VALUES ('".$gasto['gasto']."', '".$gasto['valor']."')";
    	// use exec() because no results are returned
    	$conn->exec($sql);
    	echo "New record created successfully";
	}

	public static function DeletaGasto($id, $conn){
		$sql = "DELETE  FROM Gastos WHERE  conta_id = ".$id."";
    	// use exec() because no results are returned
    	$conn->exec($sql);

	}

	public static function EditarGasto($gasto, $conn){
		$sql = "UPDATE Gastos SET conta= '".$gasto['gasto']."', valor= '".$gasto['valor']."' WHERE  conta_id = '".$gasto['id']."'";
		$conn->exec($sql);
		
	}

	public static function getGastos($conn){
		
		$stmt = $conn->prepare("SELECT * FROM Gastos ORDER BY dataDaConta DESC");
    	$stmt->execute();
    	$registros = $stmt->fetchAll();
		return $registros;
	}



}


?>