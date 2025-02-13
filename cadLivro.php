<?php

// Incluir arquivo de configuração
require_once "config.php";
require_once "conexao/conexao.php";

// Defina variáveis e inicialize com valores vazios
$nome = $autor = $paginas = $idioma = $editora = $descricao = $foto = "";
$nome_err = $autor_err = $paginas_err = $idioma_err = $editora_err = $descricao_err = $foto_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar nome do livro
    if (empty(trim($_POST["nome"]))) {
        $nome_err = "Insira o nome do livro.";
    } else {
        $autor = trim($_POST["autor"]);
    }

    // Validar autor
    if (empty(trim($_POST["autor"]))) {
        $autor_err = "Insira o nome do autor.";
    } else {
        $autor = trim($_POST["autor"]);
    }

    // Validar quantidad
    if (empty(trim($_POST["paginas"]))) {
        $paginas_err = "Insira uma quantidade.";
    } else {
        $paginas = trim($_POST["paginas"]);
    }

    // Validar idioma
    if (empty(trim($_POST["idioma"]))) {
        $idioma_err = "Insira um idioma.";
    } else {
        $idioma = trim($_POST["idioma"]);
    }

        // Validar editora
        if (empty(trim($_POST["editora"]))) {
            $editora_err = "Insira um editora.";
        } else {
            $editora = trim($_POST["editora"]);
        }

        if (empty(trim($_POST["descricao"]))) {
            $descricao_err = "Insira uma Sinopse.";
        } else {
            $descricao = trim($_POST["descricao"]);
        }

    // Validar foto

    if (empty(trim($_POST["imagem"]))) {
        $foto_err = "Envie uma foto do Livro.";
    } else {
        $foto = trim($_POST["imagem"]);
    }



    // Verifique os erros de entrada antes de inserir no banco de dados
    if (empty($nome_err) && empty($autor_err) && empty($paginas_err) && empty($idioma_err) && empty($foto_err)) {

        // Prepare uma declaração de inserção
        $sql = "INSERT INTO livros (nome, autor, paginas, idioma, editora, descricao, foto) VALUES (:nome, :autor, :paginas, :idioma, :editora, :descricao, :foto)";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":nome", $param_nome, PDO::PARAM_STR);
            $stmt->bindParam(":autor", $param_autor, PDO::PARAM_STR);
            $stmt->bindParam(":paginas", $param_paginas, PDO::PARAM_STR);
            $stmt->bindParam(":idioma", $param_idioma, PDO::PARAM_STR);
            $stmt->bindParam(":editora", $param_editora, PDO::PARAM_STR);
            $stmt->bindParam(":descricao", $param_descricao, PDO::PARAM_STR);
            $stmt->bindParam(":foto", $param_foto, PDO::PARAM_STR);

            // Definir parâmetros
            $param_nome = $nome;
            $param_autor = $autor;
            $param_paginas = $paginas;
            $param_idioma = $idioma;
            $param_editora = $editora;
            $param_descricao = $descricao;
            $param_foto = $foto;


            // Tente executar a declaração preparada
            if ($stmt->execute()) {
                // Reiniciar a página
                header("location: cadLivro.php");
            } else {
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar declaração
            unset($stmt);
        }
    }

    // Fechar conexão
    unset($pdo);
}

if (isset($_GET['metodo'])) {
    $metodo = $_GET['metodo'];
    $id = $_GET['id'];
    $acao = 'recuperarLivro';
    require_once 'livro.controller.php';
    foreach ($livro as $key => $livro) {
        $nome = $livro->nome;
        $autor = $livro->autor;
        $paginas = $livro->paginas;
        $idioma = $livro->idioma;
        $editora = $livro->editora;
        $descricao = $livro->descricao;
        $imagem = $livro->imagem;
        $id = $livro->id;
        $_SESSION['imagem'] = $imagem;

    }
}



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastre um novo livro!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="topnav"><a href = "index.php" class="barraitems"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 2 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg>Voltar</a>
<a href="areaRestrita.php" class="barraitems">Área Restrita</a>
</div>
<br><br><br><br><br><br><br>

                <div class="container border" style=" width:40rem; text-align:center">
                <br>
                <h2 class="title title-second">Registro de Livro</h2>

                <form class="form" method="POST" action="livro.controller.php?acao=<?php if(!isset($metodo)){echo 'inserir';}else if($metodo == 'alterar'){echo 'alterar';}else if($metodo == 'excluir'){echo 'excluir';}?>" method="post" enctype="multipart/form-data">

                    <label class="label-input" for="">
                        <input type="text" name="nome" placeholder="Nome"
                            class="form-control <?php echo (!empty($nome_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($nome)) {
                                       echo $nome;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>
                    <span class="t14">
                        <?php echo $nome_err; ?>
                    </span>




                    <label class="label-input" for="">
                        <input type="text" name="autor" placeholder="Autor"
                            class="form-control <?php echo (!empty($autor_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($autor)) {
                                       echo $autor;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>
                    <span class="t14">
                        <?php echo $autor_err; ?>
                    </span>




                    <label class="label-input" for="">
                        <input type="text" name="paginas" placeholder="Páginas"
                            class="form-control <?php echo (!empty($paginas_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($paginas)) {
                                       echo $paginas;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>
                    <span class="t14">
                        <?php echo $paginas_err; ?>
                    </span>


                    <label class="label-input" for="">
                        <input type="text" name="idioma" placeholder="Idioma"
                            class="form-control <?php echo (!empty($idioma_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($idioma)) {
                                       echo $idioma;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>
                    <span class="t14">
                        <?php echo $idioma_err; ?>
                    </span>

                    <label class="label-input" for="">
                        <input type="text" name="editora" placeholder="Editora"
                            class="form-control <?php echo (!empty($editora_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($editora)) {
                                       echo $editora;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>
                    <span class="t14">
                        <?php echo $editora_err; ?>
                    </span>

                    <label class="label-input" for="">
                        <input type="text" name="descricao" placeholder="Sinopse"
                            class="form-control <?php echo (!empty($descricao_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($descricao)) {
                                       echo $descricao;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>
                    <span class="t14">
                        <?php echo $descricao_err; ?>
                    </span>

                    <label class="label-input" for="">
                        <input type="file" name="imagem"
                            class="form-control <?php echo (!empty($foto_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $foto; ?>">

                    </label>
                    <span class="t14">
                        <?php echo $foto_err; ?>
                    </span>
                    <?php
                    if (isset($livro->imagem)) {
                        ;
                    }
                    ?>
                    <input type="hidden" name="id" value=" <?php if (isset($id)) {
                        echo $id;
                    } else {
                        echo '';
                    } ?>">
                    <button type="submit" class="btn btn-primary" style="background-color:#557bad; margin-top: 20px; width:350px; border-radius: 20px">
                        <?php if (!isset($metodo)) {
                            echo 'Inserir';
                        } elseif ($metodo == 'alterar') {
                            echo 'Alterar';
                        } else {
                            echo 'Remover';
                        } ?>
                    </button>
                </form>
                <br>
            </div>
        </div>

    </div>

</body>

</html>