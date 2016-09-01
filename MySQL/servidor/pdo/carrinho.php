<?php
	
	session_start();

	if($_REQUEST['acao']=='add'){
		if(!empty($_POST['id']) && !empty($_POST['qtd'])){
			$_SESSION['carrinho'][] = [
				'id' => $_POST['id'],
				'qtd' => $_POST['qtd']
			];
			$resultJson = [
				'erro' => false
			];
			die(json_encode($resultJson));
		}else{
			$resultJson = [
				'erro' => true,
				'mensagem' => "o item não foi adicionado ao carrinho, tente novamente"
			];
			die(json_encode($resultJson));
		}
	}else{
		if(!empty($_POST['id']) && !empty($_POST['qtd'])){
			$x = count($_SESSION['carrinho']);
			if($_REQUEST['qtd']==$_SESSION['carrinho'][$x]['qtd']){
				unset($_SESSION['carrinho'][$x]);
			}else{
				$_SESSION['carrinho'][$x]['qtd'] = $_SESSION['carrinho'][$x]['qtd'] - $_REQUEST['qtd'];
			}
			$resultJson = [
				'erro' => false
			];
			die(json_encode($resultJson));
		}else{
			$resultJson = [
				'erro' => true,
				'mensagem' => "o item não foi adicionado ao carrinho, tente novamente"
			];
			die(json_encode($resultJson));
		}
	}




