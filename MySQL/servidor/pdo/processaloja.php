<?php
	$acao = $_GET['acao'];

	if($acao=='adiciona'){
		$id=$_POST['iten'];
		$qtd=$_POST["qtd".$id];

		$_SESSION['qtd'][$_SESSION['ncar']] = $qtd;
		$_SESSION['carrinho'][$_SESSION['ncar']] = $id;

		$_SESSION['ncar']=$_SESSION['ncar']+1;
		die();
	}else if($acao=='vizualiza'){
		
	}else if($acao=='finaliza'){
		
	}