<?php

	include __DIR__. "/_database.php";


    $stmt = $pdo->prepare("SELECT * FROM nf WHERE id_nf='?'");
    $stmt->execute($_GET['id-nf']);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$resultJson = json_encode($result);

	$stmt = $pdo->prepare("SELECT * FROM iten_nf WHERE id_nf='?'");
    $stmt->execute($_GET['id-nf']);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tam=count($result);
    $resultJson = $resultJson + json_encode($result);

	$idCliente = $resultJson.id_cliente;
	$stmt = $pdo->prepare("SELECT nome,cpf FROM cliente WHERE id_=cliente='?'");
    $stmt->execute($idCliente);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $resultJson = $resultJson + json_encode($result);

    $i=0;
    for($i<$tam;$i++){
    	$idProd = $resultJson.iten_nf.id_prod
    	$stmt = $pdo->prepare("SELECT nome,cpf FROM cliente WHERE id_=cliente='?'");
    	$stmt->execute($idCliente);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$resultJson = $resultJson + json_encode($result);	
    }

