<?php

require_once "pagLivros.php";
require_once "pagRestrita.php";
class LivroService
{
    private $conexao;
    private $livro;

    public function __construct(Livro $livro, Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
        $this->livro = $livro;
    }
    public function inserir()
    {
        
        $query = "insert into livros (nome, autor, paginas, idioma, editora, imagem, descricao)
         values(?,?,?,?,?,?,?);";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->livro->__get('nome'));
        $stmt->bindValue(2, $this->livro->__get('autor'));
        $stmt->bindValue(3, $this->livro->__get('paginas'));
        $stmt->bindValue(4, $this->livro->__get('idioma'));
        $stmt->bindValue(5, $this->livro->__get('editora'));
        $stmt->bindValue(6, $this->livro->__get('imagem'));
        $stmt->bindValue(7, $this->livro->__get('descricao'));

        if ($stmt->execute()) 
        {
            $diretorio = "imgLivros/";
            move_uploaded_file($_FILES['imagem']['tmp_name'],
            $diretorio . $this->livro->__get('imagem'));
        }
    }

    public function recuperar()
    {

        $start = 0;
        $livrosporpagina = 16;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

        $query = "select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros limit ".$start.",".$livrosporpagina."";
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

            

        $query = "select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros where (nome like '%".$pesquisa."%' or autor like '%".$pesquisa."%') limit ".$start.",".$livrosporpagina."";
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

            

            $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros where tag ="classico" limit '.$start.','.$livrosporpagina.' ';
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

            

            $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros where tag = "famoso" limit '.$start.','.$livrosporpagina.' ';
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

            

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros where tag = "novo" limit '.$start.','.$livrosporpagina.' ';
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

            

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros limit '.$start.','.$livrosporarea.' ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarrecomendado()
    {    
        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao from livros order by rand () limit 6 ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarLivro($id)
    {
        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, descricao
        from livros where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }


    public function excluir()
    {
        $query = 'delete from livros where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->livro->__get('id'));

        if ($stmt->execute()) {
            unlink('imgLivros\\' . $_SESSION['imagem']);
        }
    }

    public function alterar()
    {
        $query = "update livros set nome=?, autor=?,paginas=?,idioma=?,editora=?,imagem=?,descricao=? where id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->livro->__get('nome'));
        $stmt->bindValue(2, $this->livro->__get('autor'));
        $stmt->bindValue(3, $this->livro->__get('paginas'));
        $stmt->bindValue(4, $this->livro->__get('idioma'));
        $stmt->bindValue(5, $this->livro->__get('editora'));
        $stmt->bindValue(6, $this->livro->__get('imagem'));
        $stmt->bindValue(7, $this->livro->__get('descricao'));
        $stmt->bindValue(8, $this->livro->__get('id'));

        if ($stmt->execute()) 
        {
            if ($_SESSION['imagem'] != $this->livro->__get('imagem'))
            {
            unlink('imgLivros/\\' . $_SESSION['imagem']);
            $diretorio = "imgLivros/";
            move_uploaded_file($_FILES['imagem']['tmp_name'],
            $diretorio . $this->livro->__get('imagem'));
            }
        }
    }
}

?>