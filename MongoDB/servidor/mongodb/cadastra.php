<?php

    include __DIR__. "/_database.php";
	
	$colecaoCliente = $mongo->db->cliente;
    
    $dadosCadastro = [ 
    	'nome_cliente' => $_POST['nome'], 
    	'login' =>$_POST['login'], 
    	'senha' =>$_POST['senha'],
    	'cpf' =>$_POST['cpf'],
    	'rg' =>$_POST['rg'],
    	'data_nascimento' =>$_POST['data_nascimento'] 
    ];

    $dadosPesquisa = [ 
    	'login' =>$_POST['login']
    ];

    $cliente = $colecaoCliente->findOne($dadosPesquisa);

    if ( !is_null($cliente) ) {
    	$rErro = [
			"erro" => true,
			"mensagem" => "Login ja cadastrado"
		];

		die( json_encode($rErro) );
    }else{   
        $colecaoCliente->insertOne($dadosCadastro);
    	$rErro = [
			"erro" => false,
			"mensagem" => "Deu tudo certo"
		];
		die( json_encode($rErro) );
	}

