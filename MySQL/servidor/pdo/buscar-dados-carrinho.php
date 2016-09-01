<?php
	session_start();
	include __DIR__. "/_database.php";
	
	for($i=0;$i<count($_SESSION['carrinho']);$i++){
		$id = $_SESSION['carrinho'][$i]['id'];
		$qtd = $_SESSION['carrinho'][$i]['qtd'];
	    $stmt = $pdo->prepare("SELECT * FROM produto WHERE id_prod=?");
	    $stmt->execute([ $id ]);
	    $dados = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
	    $dados['qtd'] = $qtd;
	    $result[] = $dados;

	}

	die(json_encode($result));