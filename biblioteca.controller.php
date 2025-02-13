<?php
session_start();
require_once 'model/biblioteca.model.php';
require_once 'service/biblioteca.service.php';
require_once "config.php";
require_once "conexao/conexao.php";




@$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
@$idcar = isset($_GET['idcar']) ? $_GET["idcar"] : $idcar;
@$id = isset($_GET['id']) ? $_GET["id"] : $id;
@$save = isset($_GET['save']) ? $_GET["save"] : $save;
@$tipo = isset($_GET['tipo']) ? $_GET["tipo"] : $tipo;
@$pesquisa = isset($_GET['pesquisa']) ? $_GET["pesquisa"] : $pesquisa;

if ($acao == 'inserir') {
    $sql = "SELECT nome FROM livros_biblioteca WHERE nome = :teste";
        $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':teste', $param_nome, PDO::PARAM_STR);
            $param_nome = trim($_POST["nome"]);



            $stmt->execute();
            if ($stmt->rowCount() == 1) {

                if($_POST['tipo'] == "pesquisa") {
 header('Location: livrospesquisa.php?pesquisa='.$_POST['pesquisa'].'&alert=erro');
}elseif($_POST['tipo'] == "classicos"){header('Location: livrosclassicos.php?alert=erro');}
elseif($_POST['tipo'] == "index"){header('Location: index.php?alert=erro');}
elseif($_POST['tipo'] == "famosos"){header('Location: livrosfamosos.php?alert=erro');}
elseif($_POST['tipo'] == "novos"){header('Location: livrosnovos.php?alert=erro');}
else{header('Location: livros.php?page-nr='.$_POST['save'].'&alert=erro');}}
 //sql query (select ... id_livr : $_POST['id_livr'])
 else{

    $biblioteca = new Biblioteca();
    $biblioteca->__set('nome', $_POST['nome']);
    $biblioteca->__set('autor', $_POST['autor']);
    $biblioteca->__set('paginas', $_POST['paginas']);
    $biblioteca->__set('idioma', $_POST['idioma']);
    $biblioteca->__set('editora', $_POST['editora']);
    $biblioteca->__set('descricao', $_POST['descricao']);
    $biblioteca->__set('id_livr', $_POST['id_livr']);
	$biblioteca->__set('id_user', $_POST['id_user']);
	$biblioteca->__set('imagem', $_POST['imagem']);
    $biblioteca->__set('lidas', $_POST['lidas']);
	$biblioteca->__set('estado', $_POST['estado']);
	$biblioteca->__set('notas', 0);

    $conexao = new Conexao();
    $bibliotecaService = new bibliotecaService($biblioteca, $conexao);
	$bibliotecaService->inserir();

    if($_POST['tipo'] == "pesquisa") {
        header('Location: livrospesquisa.php?pesquisa='.$_POST['pesquisa'].'&alert=sucesso');
    }elseif($_POST['tipo'] == "classicos"){header('Location: livrosclassicos.php?alert=sucesso');}
    elseif($_POST['tipo'] == "index"){header('Location: index.php?alert=sucesso');}
    elseif($_POST['tipo'] == "famosos"){header('Location: livrosfamosos.php?alert=sucesso');}
    elseif($_POST['tipo'] == "novos"){header('Location: livrosnovos.php?alert=sucesso');}
    else{header('Location: livros.php?page-nr='.$_POST['save'].'&alert=sucesso');}}}

if ($acao == 'inserirlido') {
    $sql = "SELECT nome FROM livros_biblioteca WHERE nome = :teste";
        $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':teste', $param_nome, PDO::PARAM_STR);
            $param_nome = trim($_POST["nome"]);



            $stmt->execute();
                if ($stmt->rowCount() == 1) {

                       if($_POST['tipo'] == "pesquisa") {
        header('Location: livrospesquisa.php?pesquisa='.$_POST['pesquisa'].'&alert=erro');
    }elseif($_POST['tipo'] == "classicos"){header('Location: livrosclassicos.php?alert=erro');}
    elseif($_POST['tipo'] == "index"){header('Location: index.php?alert=erro');}
    elseif($_POST['tipo'] == "famosos"){header('Location: livrosfamosos.php?alert=erro');}
    elseif($_POST['tipo'] == "novos"){header('Location: livrosnovos.php?alert=erro');}
    else{header('Location: livros.php?page-nr='.$_POST['save'].'&alert=erro');}}
        //sql query (select ... id_livr : $_POST['id_livr'])
        else{


    $biblioteca = new Biblioteca();
    $biblioteca->__set('nome', $_POST['nome']);
    $biblioteca->__set('autor', $_POST['autor']);
    $biblioteca->__set('paginas', $_POST['paginas']);
    $biblioteca->__set('idioma', $_POST['idioma']);
    $biblioteca->__set('editora', $_POST['editora']);
    $biblioteca->__set('descricao', $_POST['descricao']);
    $biblioteca->__set('id_livr', $_POST['id_livr']);
	$biblioteca->__set('id_user', $_POST['id_user']);
	$biblioteca->__set('imagem', $_POST['imagem']);
    $biblioteca->__set('lidas', $_POST['paginas']);
	$biblioteca->__set('estado', 'Lido');
	$biblioteca->__set('notas', 0);

    $conexao = new Conexao();
    $bibliotecaService = new bibliotecaService($biblioteca, $conexao);
	$bibliotecaService->inserirlido();


    if($_POST['tipo'] == "pesquisa") {
        header('Location: livrospesquisa.php?pesquisa='.$_POST['pesquisa'].'&alert=sucesso');
    }elseif($_POST['tipo'] == "classicos"){header('Location: livrosclassicos.php?alert=sucesso');}
    elseif($_POST['tipo'] == "index"){header('Location: index.php?alert=sucesso');}
    elseif($_POST['tipo'] == "famosos"){header('Location: livrosfamosos.php?alert=sucesso');}
    elseif($_POST['tipo'] == "novos"){header('Location: livrosnovos.php?alert=sucesso');}
    else{header('Location: livros.php?page-nr='.$_POST['save'].'&alert=sucesso');}}}

/*if ($acao == 'recuperartodos') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $biblioteca = $bibliotecaService->recuperartodos();
}*/

if ($acao == 'recuperarbiblioteca') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $biblioteca = $bibliotecaService->recuperarbiblioteca($id);
}

if ($acao == 'recuperarlido') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $biblioteca = $bibliotecaService->recuperarlido();
}

if ($acao == 'recuperarlendo') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $biblioteca = $bibliotecaService->recuperarlendo();
}

if ($acao == 'recuperarqueroler') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $biblioteca = $bibliotecaService->recuperarqueroler();
}

if ($acao == 'recuperarabandonado') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $biblioteca = $bibliotecaService->recuperarabandonado();
}

if ($acao == 'excluir') {
    $biblioteca = new Biblioteca();
    $conexao = new Conexao();

    $biblioteca->__set('id', $_POST['idcar']);

    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $bibliotecaService->excluir();
    header('location: biblioteca.php?acao='.$_POST['save'].'&page-nr=1');
    
    
}

if ($acao == 'alterar') {
    $biblioteca = new Biblioteca();
    $biblioteca->__set('lidas', $_POST['lidas']);
    $biblioteca->__set('estado', $_POST['estado']);
    $biblioteca->__set('notas', $_POST['notas']);
    $biblioteca->__set('id', $_POST['idcar']);

    $conexao = new Conexao();
    $bibliotecaService = new BibliotecaService($biblioteca, $conexao);
    $bibliotecaService->alterar();
    header('location: biblioteca.php?acao='.$_POST['save'].'&page-nr=1');
}
?>