<?php 
    class Biblioteca
    {
        private $id;
        private $autor;
        private $paginas;
        private $idioma;
        private $editora;
        private $imagem;
        private $lidas;
        private $estado;
        private $notas;
        private $id_livr;
        private $id_user;

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