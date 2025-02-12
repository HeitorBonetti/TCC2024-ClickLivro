<?php
    require_once "pagBiblioteca.php";
class CarrinhoService
{

    private $conexao;
    private $carrinho;

    public function __construct(Carrinho $carrinho, Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
        $this->carrinho = $carrinho;
    }
    public function inserir()
    {
        $query = "insert into livros_biblioteca (nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user)
         values(?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->carrinho->__get('nome'));
        $stmt->bindValue(2, $this->carrinho->__get('autor'));
        $stmt->bindValue(3, $this->carrinho->__get('paginas'));
        $stmt->bindValue(4, $this->carrinho->__get('idioma'));
        $stmt->bindValue(5, $this->carrinho->__get('editora'));
        $stmt->bindValue(6, $this->carrinho->__get('imagem'));
        $stmt->bindValue(7, $this->carrinho->__get('lidas'));
        $stmt->bindValue(8, $this->carrinho->__get('estado'));
        $stmt->bindValue(9, 0);
        $stmt->bindValue(10, $this->carrinho->__get('id_prod'));
        $stmt->bindValue(11, $_SESSION['id']);
        $stmt->execute();


        
        return $stmt->fetchALL(PDO::FETCH_OBJ);

    }
        public function inserirlido()
    {
        $query = "insert into livros_biblioteca (nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user)
         values(?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->carrinho->__get('nome'));
        $stmt->bindValue(2, $this->carrinho->__get('autor'));
        $stmt->bindValue(3, $this->carrinho->__get('paginas'));
        $stmt->bindValue(4, $this->carrinho->__get('idioma'));
        $stmt->bindValue(5, $this->carrinho->__get('editora'));
        $stmt->bindValue(6, $this->carrinho->__get('imagem'));
        $stmt->bindValue(7, $this->carrinho->__get('paginas'));
        $stmt->bindValue(8, 'Lido');
        $stmt->bindValue(9, 0);
        $stmt->bindValue(10, $this->carrinho->__get('id_prod'));
        $stmt->bindValue(11, $_SESSION['id']);
        $stmt->execute();


        
        return $stmt->fetchALL(PDO::FETCH_OBJ);

    }

 /*   public function recuperartodos()
    {
        $start = 0;
        $livrosporbiblioteca = 6;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporbiblioteca;}

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user from livros_biblioteca 
        limit '.$start.','.$livrosporbiblioteca.'';
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }*/

    public function recuperarcarrinho($id)
    {
        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user
        from livros_biblioteca where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarlido()
    {
        $start = 0;
        $livrosporbiblioteca = 6;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporbiblioteca;}

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user from livros_biblioteca where estado = "Lido"
        limit '.$start.','.$livrosporbiblioteca.'';
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarlendo()
    {
        $start = 0;
        $livrosporbiblioteca = 6;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporbiblioteca;}

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user from livros_biblioteca where estado = "Lendo"
        limit '.$start.','.$livrosporbiblioteca.'';
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarqueroler()
    {
        $start = 0;
        $livrosporbiblioteca = 6;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporbiblioteca;}

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user from livros_biblioteca where estado = "Quero Ler"
        limit '.$start.','.$livrosporbiblioteca.'';
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function recuperarabandonado()
    {
        $start = 0;
        $livrosporbiblioteca = 6;

        if(isset($_GET['page-nr'])){
            $page = $_GET['page-nr'] - 1;
            $start = $page * $livrosporbiblioteca;}

        $query = 'select id, nome, autor, paginas, idioma, editora, imagem, lidas, estado, notas, id_prod, id_user from livros_biblioteca where estado = "Abandonado"
        limit '.$start.','.$livrosporbiblioteca.'';
        
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }


    public function excluir()
    {
        $query = 'delete from livros_biblioteca where id = ?';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->carrinho->__get('id'));
        $stmt->execute();

    }

    public function alterar()
    {
        $query = "update livros_biblioteca set lidas=?,estado=?,notas=? where id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->carrinho->__get('lidas'));
        $stmt->bindValue(2, $this->carrinho->__get('estado'));
        $stmt->bindValue(3, $this->carrinho->__get('notas'));
        $stmt->bindValue(4, $this->carrinho->__get('id'));

        $stmt->execute();



    }
}

?>