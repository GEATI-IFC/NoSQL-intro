<?php

	session_start();

	$login = $_POST['login']; 
	$senha = $_POST['senha'];
	$novaSenha = $_POST['novaSenha'];


	include __DIR__. "/_database.php";

	$cliente = $mongo->db->cliente;  

	$dadosCliente = [
		'login' => $login,
		'senha'=> $senha
	];
	$result = $cliente->updateOne(
		$dadosCliente,
		['$set' => ["senha" => $novaSenha]]
	);


    if( $result->getModifiedCount()>=1){
    	$resultJson = [
    		"erro" => false,
    	];
    	die(json_encode($resultJson));

    }else{
    	$resultJson = [
    		"erro" => true,
    		"mensagem" => "a senha nao foi alterada"
    	];

    die(json_encode($resultJson));
    }

