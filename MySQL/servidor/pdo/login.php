<?php

	session_start();

	$login = $_POST['login']; 
	$senha = $_POST['senha'];


	include __DIR__. "/_database.php";

    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE login=? and senha=?");
    $stmt->execute([$login, $senha]);
 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if( count($result) == 1 ){
    	$resultJson = [
    		"erro" => false,
    		"payload" => [
    			"nome" => $result[0]['nome']
    		]
    	];

    	session_unset();
        $_SESSION['autenticado'] = true;
        $_SESSION['cliente']['id'] =  $result[0]['id_cliente'];
    }else{
    	$resultJson = [
    		"erro" => true,
    		"mensagem" => "senha ou usuario não encontrados"
    	];

    	session_destroy();
    }

    die( json_encode($resultJson) );

	