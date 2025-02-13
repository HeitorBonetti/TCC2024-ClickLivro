<?php

// Incluir arquivo de configuração
require_once "config.php";
require_once "conexao/conexao.php";

// Defina variáveis e inicialize com valores vazios
$lidas = $estado = $notas = "";
$lidas_err = $estado_err = $notas_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validar páginas lidas
    if (empty(trim($_POST["lidas"]))) {
        $lidas_err = "Por favor insira um número.";
    } else {
        $lidas = trim($_POST["lidas"]);
    }

    if (empty(trim($_POST["estado"]))) {
        $estado_err = "Por favor selecione um.";
    } else {
        $estado = trim($_POST["estado"]);
    }
    
    
    if (empty(trim($_POST["notas"]))) {
        $notas_err = "Por favor insira um número de 0 a 10.";
    } else {
        if ((trim($_POST["notas"])) > 10) {
            $notas_err = "Por favor insira um número de 0 a 10.";
        } else {
            if ((trim($_POST["notas"])) < 0) {
            $notas_err = "Por favor insira um número de 0 a 10.";
        } else
        $notas = trim($_POST["notas"]);
    }}


    // Verifique os erros de entrada antes de inserir no banco de dados
    if (empty($lidas_err) && empty($estado_err) && empty($notas_err)) {

        // Prepare uma declaração de inserção
        $sql = "INSERT INTO livros_biblioteca (lidas, estado, notas) VALUES (:lidas, :estado, :notas)";

        if ($stmt = $pdo->prepare($sql)) {
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":lidas", $param_lidas, PDO::PARAM_STR);
            $stmt->bindParam(":estado", $param_estado, PDO::PARAM_STR);
            $stmt->bindParam(":notas", $param_notas, PDO::PARAM_STR);


            // Definir parâmetros
            $param_lidas = $lidas;
            $param_estado = $estado;
            $param_notas = $notas;


            // Tente executar a declaração preparada
            if ($stmt->execute()) {
                // Reiniciar a página
                header("location: biblioteca.php?acao=recuperarlendo&page-nr=1");
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
    $acao = 'recuperarbiblioteca';
    require_once 'biblioteca.controller.php';
    foreach ($biblioteca as $key => $biblioteca) {
        $lidas = $biblioteca->lidas;
        $estado = $biblioteca->estado;
        $notas = $biblioteca->notas;
        $id = $biblioteca->id;

    }
}



?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastre uma nova biblioteca!</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="topnav"><a href = "biblioteca.php?acao=recuperarlendo&page-nr=1" class="barraitems"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 2 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg>Voltar</a></div>


    <div class="container" style=" width:30rem; text-align:center">
    <br>
            <img src="imgLivros/<?= $biblioteca->imagem?>" style="width:400px; height:600px;">
            <div class="second-column">
                <h2 class="title title-second"></h2>

                <form class="form" method="POST" action="biblioteca.controller.php?acao=<?php if(!isset($metodo)){echo 'inserir';}else if($metodo == 'alterar'){echo 'alterar';}else if($metodo == 'excluir'){echo 'excluir';}?>" method="post" enctype="multipart/form-data">

                    <label class="label-input" for="">
        
                        <input type="number" max="<?= $biblioteca->paginas?>" min="0" name="lidas" placeholder="Páginas Lidas"
                            class="form-control <?php echo (!empty($lidas_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($lidas)) {
                                       echo $lidas;
                                   } else {
                                    echo '';} ?>">

                    </label>
                    <span class="t14">
                        <?php echo $lidas_err; ?>
                    </span>




                    <label class="label-input" for="">
     
                        <select name="estado"
                            class="form-control <?php echo (!empty($estado_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($estado)) {
                                       echo $estado;
                                   } else {
                                       echo '';
                                   } ?>">
                                <option value="Lido">  Lido </option>
                                <option value="Lendo"> Lendo </option>
                                <option value="Quero Ler"> Quero Ler </option>
                                <option value="Abandonado"> Abandonado </option>
                                </select>

                    </label>
                    <span class="t14">
                        <?php echo $estado_err; ?>
                    </span>




                    <label class="label-input" for="">
             
                        <input type="number" max="10" min="0" name="notas" placeholder="Nota"
                            class="form-control <?php echo (!empty($notas_err)) ? 'is-invalid' : ''; ?>" value="<?php if (isset($notas)) {
                                       echo $notas;
                                   } else {
                                       echo '';
                                   } ?>">

                    </label>


                    <?php
                    ?>

                    <input type="hidden" name="id" value=" <?php if (isset($id)) {
                        echo $id;
                    } else {
                        echo '';
                    } ?>">
                    <button type="submit" class="btn btn-primary" style="background-color:#557bad; margin-top: 20px; border-radius:50px">
                        <?php if (!isset($metodo)) {
                            echo 'Inserir';
                        } elseif ($metodo == 'alterar') {
                            echo 'Alterar';
                        } else {
                            echo 'Remover';
                        } ?>
                    </button>
                    <br><br>
                </form>
            </div>
        </div>

    </div>

</body>

</html>