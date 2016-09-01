<?php
	session_start();
	
	if($_SESSION['autenticado']){

		include __DIR__. "/_database.php";

	    $stmt = $pdo->prepare('SELECT * FROM produto');
	    $stmt->execute();
	    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	    die( json_encode($result) );

	} else {
		$result = [
			"erro" => true,
			"mensagem" => "usuario nao autenticado"
		];
		die( json_encode($result) );
	}