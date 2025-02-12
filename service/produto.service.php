<?php

require_once "pagLivros.php";
require_once "pagRestrita.php";
class ProdutoService
{
    private $conexao;
    private $produto;

    public function __construct(Produto $produto, Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
        $this->produto = $produto;
    }
    public function inserir()
    {
        
        $query = "insert into produtos (nome, autor, paginas, idioma, editora, imagem, descricao)
         values(?,?,?,?,?,?,?);";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->produto->__get('nome'));
        $stmt->bindValue(2, $this->produto->__get('autor'));
        $stmt->bindValue(3, $this->produto->__get('paginas'));
        $stmt->bindValue(4, $this->produto->__get('idioma'));
        $stmt->bindValue(5, $this->produto->__get('editora'));
        $stmt->bindValue(6, $this->produto->__get('imagem'));
        $stmt->bindValue(7, $this->produto->__get('descricao'));

        if ($stmt->execute()) 
        {
            $diretorio = "imgProdutos/";
            move_uploaded_file($_FILES['imagem']['tmp_name'],
            $diretorio . $this->produto->__get('imagem'));
        }
    }

    public function recuperar()
    {

        $start = 0;
        $livrosporpagina = 16;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

        $query = "select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos limit ".$start.",".$livrosporpagina."";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);


    }

    public function recuperarpesquisa()
    {

        $start = 0;
        $livrosporpagina = 16;
        $pesquisa = $_GET['pesquisa'];

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

        $query = "select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos where (nome like '%".$pesquisa."%' or autor like '%".$pesquisa."%') limit ".$start.",".$livrosporpagina."";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);


        
    }

    public function recuperarclassicos()
    {

        $start = 0;
        $livrosporpagina = 16;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

            $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos where tag ="classico" limit '.$start.','.$livrosporpagina.' ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);


    }

    public function recuperarfamosos()
    {

        $start = 0;
        $livrosporpagina = 16;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

            $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos where tag = "famoso" limit '.$start.','.$livrosporpagina.' ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarnovos()
    {

        $start = 0;
        $livrosporpagina = 16;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos where tag = "novo" limit '.$start.','.$livrosporpagina.' ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarrestrita()
    {

        $start = 0;
        $livrosporarea = 6;
        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporarea;}

            

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos limit '.$start.','.$livrosporarea.' ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarrecomendado()
    {    
        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from produtos order by rand () limit 6 ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarProduto($id)
    {
        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao
        from produtos where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }


    public function excluir()
    {
        $query = 'delete from produtos where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->produto->__get('id'));

        if ($stmt->execute()) {
            unlink('imgProdutos\\' . $_SESSION['imagem']);
        }
    }

    public function alterar()
    {
        $query = "update produtos set nome=?, autor=?,paginas=?,idioma=?,editora=?,imagem=?,descricao=? where id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->produto->__get('nome'));
        $stmt->bindValue(2, $this->produto->__get('autor'));
        $stmt->bindValue(3, $this->produto->__get('paginas'));
        $stmt->bindValue(4, $this->produto->__get('idioma'));
        $stmt->bindValue(5, $this->produto->__get('editora'));
        $stmt->bindValue(6, $this->produto->__get('imagem'));
        $stmt->bindValue(7, $this->produto->__get('descricao'));
        $stmt->bindValue(8, $this->produto->__get('id'));

        if ($stmt->execute()) 
        {
            if ($_SESSION['imagem'] != $this->produto->__get('imagem'))
            {
            unlink('imgProdutos/\\' . $_SESSION['imagem']);
            $diretorio = "imgProdutos/";
            move_uploaded_file($_FILES['imagem']['tmp_name'],
            $diretorio . $this->produto->__get('imagem'));
            }
        }
    }
}

?>