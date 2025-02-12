<?php 
    class Carrinho
    {
        private $id;
        private $id_user;
        private $id_prod;
        private $qtn;
        private $preco_prod;

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