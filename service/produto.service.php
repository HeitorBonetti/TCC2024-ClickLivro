<?php

require_once "pagination.php";
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
        $query = "insert into produtos (nome, autor, paginas, idioma, editora, imagem)
         values(?,?,?,?,?,?);";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->produto->__get('nome'));
        $stmt->bindValue(2, $this->produto->__get('autor'));
        $stmt->bindValue(3, $this->produto->__get('paginas'));
        $stmt->bindValue(4, $this->produto->__get('idioma'));
        $stmt->bindValue(5, $this->produto->__get('editora'));
        $stmt->bindValue(6, $this->produto->__get('imagem'));

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
        $livrosporpagina = 12;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporpagina;}

            

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem from produtos limit '.$start.','.$livrosporpagina.'';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarProduto($id)
    {
        $query = 'select id, nome, autor, paginas, idioma, editora, imagem
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
        $query = "update produtos set nome=?, autor=?,paginas=?,idioma=?,editora=?,imagem=? where id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->produto->__get('nome'));
        $stmt->bindValue(2, $this->produto->__get('autor'));
        $stmt->bindValue(3, $this->produto->__get('paginas'));
        $stmt->bindValue(4, $this->produto->__get('idioma'));
        $stmt->bindValue(5, $this->produto->__get('editora'));
        $stmt->bindValue(6, $this->produto->__get('imagem'));
        $stmt->bindValue(7, $this->produto->__get('id'));

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