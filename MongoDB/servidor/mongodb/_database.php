<?php	

	try{
		require 'vendor/autoload.php'; // include Composer goodies

		$mongo = new MongoDB\Client("mongodb://localhost:27017");

	}catch(Exception $e){
		$rErro = [
			"erro" => true,
			"mensagem" => "Não foi possivel conectar com o banco de dados"
		];

		die( json_encode( $rErro ) );
	}