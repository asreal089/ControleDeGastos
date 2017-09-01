<?php
require_once('DataBase.class.php');

echo "<script src='//code.jquery.com/jquery-1.10.2.js'></script>";


$DB= new DataBase();
$conn=$DB::GetConnection();

$id = $_GET['id'];

$DB::DeletaGasto($id, $conn);

echo "<script>alert('gasto deletado.');</script>";
header("Location:controle.php");
