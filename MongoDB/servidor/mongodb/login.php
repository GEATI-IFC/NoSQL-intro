<?php
	
	session_start();

	$login = $_POST['login']; 
	$senha = $_POST['senha'];

	include __DIR__. "/_database.php";
	
	$colecaoCliente = $mongo->db->cliente;    

	$dadosLogin = [
		'login' => $login,
		'senha'=> $senha		
	];
	$cliente = $colecaoCliente->findOne($dadosLogin);


    if(!is_null($cliente)){
    	$resultJson = [
    		"erro" => false,
    		"payload" => [
    			"nome" => $cliente['nome_cliente']
    		]
    	];

    	session_unset();
        $_SESSION['autenticado'] = true;
        $_SESSION['cliente']['id'] =  $cliente->login ;
    }else{
    	$resultJson = [
    		"erro" => true,
    		"mensagem" => "senha ou usuario não encontrados"
    	];

    	session_destroy();
    }

    die( json_encode($resultJson) );