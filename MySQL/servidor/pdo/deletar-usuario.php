<?php

	include __DIR__. "/_database.php";

	$login = $_REQUEST['login'];
	$senha = $_REQUEST['senha'];

    $stmt = $pdo->prepare("DELETE FROM cliente WHERE login = ? and senha = ?");
    $result = $stmt->execute([$login,$senha]);

    if($result){
		$rErro = [
			"erro" => false,
			"mensagem" => "Usuario deletado com sucesso"
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
