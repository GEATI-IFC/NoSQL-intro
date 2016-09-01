<?php
	session_start();
	include __DIR__. "/_database.php";
		
	$data = date('Y-m-d H:i');
	$stmt = $pdo->prepare("INSERT INTO nota_fiscal(data,id_cliente) VALUES(?,?)");
	$result_nf = $stmt->execute([ 
    	$data,
    	$_SESSION['cliente']['id'] 
    ]);

	$stmt = $pdo->prepare("SELECT id_nf FROM nota_fiscal WHERE id_nf IN (SELECT MAX(id_nf) FROM nota_fiscal)");
	$stmt->execute();
	$result_nf = $stmt->fetchAll(PDO::FETCH_ASSOC);		
	$idNf = $result_nf[0]['id_nf'];

	for($x=0;$x<=(count($_SESSION['carrinho'])-1);$x++){
		$stmt = $pdo->prepare("INSERT INTO iten_nf (id_nf,id_prod, qtd_iten, seq_iten) VALUES(?, ?, ?, ?)");
		$stmt->execute([ 
    		$idNf,
    		$_SESSION['carrinho'][$x]['id'],
    		$_SESSION['carrinho'][$x]['qtd'],
    		$x
   		]);
	}
	//-------------------------------------------------------------------------------------

	$dadosDaNf = [];

    $stmt = $pdo->prepare("SELECT * FROM nota_fiscal WHERE id_nf=?");
    $stmt->execute([$idNf]);
    $result_cabecalho['nf'] = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];


    $idCliente = $_SESSION['cliente']['id'];
	$stmt = $pdo->prepare("SELECT nome,cpf FROM cliente WHERE id_cliente=?");
    $stmt->execute([$idCliente]);
    $result_cabecalho['cliente'] = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    $dadosDaNf['cabecalho'] = $result_cabecalho;

    // -------------------------------------------------------------------------------

    $stmt = $pdo->prepare("SELECT * FROM iten_nf, produto WHERE iten_nf.id_prod = produto.id_prod AND id_nf=?");
    $stmt->execute([$idNf]);
    $result_itens_nf = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $tam=count($result_itens_nf);

    $dadosDaNf['produtos'] = $result_itens_nf;
	
	unset($_SESSION['carrinho']);
	
    die(json_encode($dadosDaNf));


