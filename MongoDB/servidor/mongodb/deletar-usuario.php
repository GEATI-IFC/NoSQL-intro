<?php
	
	include __DIR__. "/_database.php";
	
	$cliente = $mongo->db->cliente;    

	$login = $_REQUEST['login'];
	$senha = $_REQUEST['senha'];

	$dadosDel = [
		'login' => $login,
		'senha'=> $senha		
	];

    $result = $cliente->deleteOne($dadosDel);  

    if($result->getDeletedCount()>=1){
		$rErro = [
			"erro" => false,
			"mensagem" => "Usuario deletado"
		];

		die( json_encode( $rErro ) );
    }else{
		$rErro = [
			"erro" => true,
			"mensagem" => "Ocorreu um erro durante a delecao, tente novamente"
		];

		die( json_encode($rErro) );
	}
