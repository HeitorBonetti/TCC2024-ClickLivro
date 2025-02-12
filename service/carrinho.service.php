<?php
class CarrinhoService
{
    private $carrinho;
    private $conexao;

    public function __construct(Carrinho $carrinho, Conexao $conexao)
    {
        $this->conexao = $conexao->conectar();
        $this->carrinho = $carrinho;
    }

    public function inserir()
    {
        $query = "insert into itens_produto (nome,autor,paginas,idioma,editora,imagem,lidas,estado,notas,id_prod,id_user) 
            values (?,?,?,?, ?, ?, ?, ?,?,?,?);";
        $stmt = $this->conexao->prepare($query);


        $stmt->bindValue(1, $this->carrinho->__get('nome'));
        $stmt->bindValue(2, $this->carrinho->__get('autor'));
        $stmt->bindValue(3, $this->carrinho->__get('paginas'));
        $stmt->bindValue(4, $this->carrinho->__get('idioma'));
        $stmt->bindValue(5, $this->carrinho->__get('editora'));
        $stmt->bindValue(6, $this->carrinho->__get('imagem'));
        $stmt->bindValue(7, $this->carrinho->__get('lidas'));
        $stmt->bindValue(8, $this->carrinho->__get('estado'));
        $stmt->bindValue(9, $this->carrinho->__get('notas'));
        $stmt->bindValue(10, $this->carrinho->__get('id_prod'));
        $stmt->bindValue(11, $this->carrinho->__get('id_user'));

        $stmt->execute();
    }

}
