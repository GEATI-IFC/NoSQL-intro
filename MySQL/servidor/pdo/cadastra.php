<?php

	include __DIR__. "/_database.php";

    $stmt = $pdo->prepare('INSERT INTO cliente(nome, login, senha, cpf, rg, data_nascimento) VALUES(?, ?, ?, ?, ?, ?)');
    
    $result = $stmt->execute([ 
    	$_POST['nome'], 
    	$_POST['login'], 
    	$_POST['senha'],
    	$_POST['cpf'],
    	$_POST['rg'],
    	$_POST['data_nascimento'] 
    ]);


    if($result){
		$rErro = [
			"erro" => false,
			"mensagem" => "Dados inseridos com sucesso"
		];

		die( json_encode( $rErro ) );
    }else{
		$rErro = [
			"erro" => true,
			"code" => $stmt->errorCode(),
			"mensagem" => $stmt->errorInfo()
		];

		die( json_encode($rErro) );
	}
