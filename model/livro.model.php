<?php
class Livro{
	private $id;
	private $nome;
	private $autor;
	private $paginas;
	private $idioma;
	private $editora;
	private $tag;
	private $imagem;
	private $descricao;

	public function __set($atributo, $valor)
	{
		$this->$atributo = $valor;
	}

	public function __get($atributo)
	{
		return $this->$atributo;
	}
}
?>