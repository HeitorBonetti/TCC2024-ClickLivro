<?php
session_start();
require_once 'model/livro.model.php';
require_once 'service/livro.service.php';
require_once 'conexao/conexao.php';



@$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
@$id = isset($_GET['id']) ? $_GET["id"] : $id;

if ($acao == 'inserir') {
    $livro = new Livro();
    $livro->__set('nome', $_POST['nome']);
    $livro->__set('autor', $_POST['autor']);
    $livro->__set('paginas', $_POST['paginas']);
    $livro->__set('idioma', $_POST['idioma']);
    $livro->__set('editora', $_POST['editora']);
    $livro->__set('imagem', $_FILES['imagem']['name']);
    $livro->__set('descricao', $_POST['descricao']);

    $conexao = new Conexao();
    $livroService = new LivroService($livro, $conexao);
    $livroService->inserir();
    header("location: cadLivro.php");


    
}

if ($acao == 'recuperar') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperar(); 
    
}

if ($acao == 'recuperarpesquisa') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarpesquisa();

    
}

if ($acao == 'recuperarclassicos') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarclassicos();
}

if ($acao == 'recuperarfamosos') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarfamosos();
}

if ($acao == 'recuperarnovos') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarnovos();
}

if ($acao == 'recuperarrestrita') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarrestrita();
}

if ($acao == 'recuperarrecomendado') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarrecomendado();
}

if ($acao == 'recuperarLivro') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livroService = new LivroService($livro, $conexao);
    $livro = $livroService->recuperarLivro($id);
}

if ($acao == 'excluir') {
    $livro = new Livro();
    $conexao = new Conexao();

    $livro->__set('id', $_POST['id']);


    $livroService = new LivroService($livro, $conexao);
    $livroService->excluir();
}

if ($acao == 'alterar') {
    $livro = new Livro();
    $livro->__set('nome', $_POST['nome']);
    $livro->__set('autor', $_POST['autor']);
    $livro->__set('paginas', $_POST['paginas']);
    $livro->__set('idioma', $_POST['idioma']);
    $livro->__set('editora', $_POST['editora']);

    if ($_FILES['imagem']['name'] != '')
    {
        $livro->__set('imagem', $_FILES['imagem']['name']);
    } 
    else 
    {
        $livro->__set('imagem', $_SESSION['imagem']);
    }
    $livro->__set('editora', $_POST['descricao']);
    $livro->__set('id', $_POST['id']);

    $conexao = new Conexao();
    $livroService = new LivroService($livro, $conexao);
    $livroService->alterar();
    header('location: areaRestrita.php');
}


?>