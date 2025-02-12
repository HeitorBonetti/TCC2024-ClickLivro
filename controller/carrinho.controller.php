<?php
require_once "../model/carrinho.model.php";
require_once "../service/carrinho.service.php";
require_once "../conexao/conexao.php";

@$acaocar = isset($_GET['acaocar']) ? $_GET['acaocar'] : $acaocar;
@$idcar = isset($_GET['idcar']) ? $_GET['idcar'] : $idcar;


if ($acaocar == 'inserir') {
	$carrinho = new Carrinho();
	$carrinho->__set('id_user', $_POST['id_user']);
	$carrinho->__set('id_prod', $_POST['id_prod']);
	$carrinho->__set('qtn', $_POST['quantidade']);
	$carrinho->__set('preco_prod', $_POST['preco_prod']);

	$conexao = new Conexao();
	$carrinhoService = new CarrinhoService($carrinho, $conexao);
	$carrinhoService->inserir();
	header("location: ../produtos.php");
}


