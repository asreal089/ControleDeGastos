<?php
require_once('DataBase.class.php');

$DB= new DataBase();
$conn=$DB::GetConnection();
$registros = $DB::getGastos($conn);

if(!isset($registros)){
	echo "erro ao pegar registros!!!";
	die();
}

?>  

<table class="table table-striped">
<thead>
      <tr>
        <th>Conta:</th>
        <th>Valor:</th>
        <th>Data:</th>
        <th>Opções</th>
      </tr>
</thead>

<?php

foreach ($registros as $reg) {
	?>
	<tr>
        <th><?= $reg['conta'] ?></th>
        <th>R$ <?= $reg['valor'] ?></th>
        <th><?= $reg['dataDaConta'] ?></th>
        <th>
        	<a href=delete.php?id=<?=$reg['conta_id']?> class='btn btn-danger' role='button'>deletar</a>
        	<a href=editar.php?id=<?=$reg['conta_id']?> class='btn btn-warning' role='button'>editar</a>
        </th>
    </tr>

<?php
}