<?php

	session_start();

	$login = $_POST['login']; 
	$senha = $_POST['senha'];
	$novaSenha = $_POST['novaSenha'];

	include __DIR__. "/_database.php";

    $stmt = $pdo->prepare("UPDATE cliente SET senha=? WHERE login=? and senha=?");
    $stmt->execute([$novaSenha, $login, $senha]);
 
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if( count($result) == 1 ){
    	$resultJson = [
    		"erro" => false,
    	];
    }else{
    	$resultJson = [
    		"erro" => true,
    		"mensagem" => "a senha nao foi alterada"
    	];

    die(json_encode($resultJson));
    }

