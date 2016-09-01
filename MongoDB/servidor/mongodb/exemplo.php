<?php
	require 'vendor/autoload.php'; // include Composer goodies

	$mongo = new MongoDB\Client("mongodb://localhost:27017");
	
	$colecaoPessoa = $mongo->naoRelacional->pessoas;

	// Inserir
	
	// $pessoa1 = [ 
	// 	'nome' => 'Daniel', 
	// 	'snome' => 'de Andrade Varela',
	// 	'telefone' => [
	// 		'zebra' => '44 8805 5775',
	// 		'47 3050 2535'
	// 	]
	// ];

	// $pessoa2 = [ 
	// 	'nome' => 'Nicolas', 
	// 	'snome' => 'Ryberg' 
	// ];

	// //$result = $colecaoPessoa->insertOne( );
	// $result = $colecaoPessoa->insertOne($pessoa1);
	// $result = $colecaoPessoa->insertOne($pessoa2);

	// echo "Inserted with Object ID '{$result->getInsertedId()}'";

	// --------------------------------------
	//Buscar Dados

	$pessoa = [
		"telefone" => "44 8805 5775"
	];

	$daniel = $colecaoPessoa->findOne($pessoa);

	print_r( $daniel->telefone[1] );
	// print_r( $daniel->telefone->zebra );

	// --------------------------------------

	// $daniel->telefone = [
	// 	"44 8805 5775",
	// 	"47 3050 2535"
	// ];

	// $colecaoPessoa->saveOne($daniel);