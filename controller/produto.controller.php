<?php
session_start();
require_once 'model/produto.model.php';
require_once 'service/produto.service.php';
require_once 'conexao/conexao.php';



@$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
@$id = isset($_GET['id']) ? $_GET["id"] : $id;

if ($acao == 'inserir') {
    $produto = new Produto();
    $produto->__set('nome', $_POST['nome']);
    $produto->__set('autor', $_POST['autor']);
    $produto->__set('paginas', $_POST['paginas']);
    $produto->__set('idioma', $_POST['idioma']);
    $produto->__set('editora', $_POST['editora']);
    $produto->__set('imagem', $_FILES['imagem']['name']);
    $produto->__set('descricao', $_POST['descricao']);

    $conexao = new Conexao();
    $produtoService = new ProdutoService($produto, $conexao);
    $produtoService->inserir();
    header("location: cadProduto.php");


    
}

if ($acao == 'recuperar') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperar(); 
    
}

if ($acao == 'recuperarpesquisa') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarpesquisa();

    
}

if ($acao == 'recuperarclassicos') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarclassicos();
}

if ($acao == 'recuperarfamosos') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarfamosos();
}

if ($acao == 'recuperarnovos') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarnovos();
}

if ($acao == 'recuperarrestrita') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarrestrita();
}

if ($acao == 'recuperarrecomendado') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarrecomendado();
}

if ($acao == 'recuperarProduto') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produtoService = new ProdutoService($produto, $conexao);
    $produto = $produtoService->recuperarProduto($id);
}

if ($acao == 'excluir') {
    $produto = new Produto();
    $conexao = new Conexao();

    $produto->__set('id', $_POST['id']);


    $produtoService = new ProdutoService($produto, $conexao);
    $produtoService->excluir();
}

if ($acao == 'alterar') {
    $produto = new Produto();
    $produto->__set('nome', $_POST['nome']);
    $produto->__set('autor', $_POST['autor']);
    $produto->__set('paginas', $_POST['paginas']);
    $produto->__set('idioma', $_POST['idioma']);
    $produto->__set('editora', $_POST['editora']);

    if ($_FILES['imagem']['name'] != '')
    {
        $produto->__set('imagem', $_FILES['imagem']['name']);
    } 
    else 
    {
        $produto->__set('imagem', $_SESSION['imagem']);
    }
    $produto->__set('editora', $_POST['descricao']);
    $produto->__set('id', $_POST['id']);

    $conexao = new Conexao();
    $produtoService = new ProdutoService($produto, $conexao);
    $produtoService->alterar();
    header('location: areaRestrita.php');
}


?>