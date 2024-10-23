<?php 
    class Carros{
        private $codigo;
        private $marca;
        private $modelo;
        private $anoFabricacao;
        private $anoModelo;
        private $valor;
        private $placa;

        public function __construct($codigo, $marca, $modelo, $anoFabricacao, $anoModelo, $valor, $placa){
            $this->codigo = $codigo;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->anoFabricacao = $anoFabricacao;
            $this->anoModelo = $anoModelo;
            $this->valor = $valor;
            $this->placa = $placa;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function getAnoFabricacao(){
            return $this->anoFabricacao;
        }

        public function setAnoFabricacao($anoFabricacao){
            $this->anoFabricacao = $anoFabricacao;
        }

        public function getAnoModelo() {
            return $this->anoModelo;
        }

        public function setAnoModelo($anoModelo){
            $this->anoModelo = $anoModelo;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

        public function getPlaca(){
            return $this->placa;
        }

        public function setPlaca($placa){
            $this->placa = $placa;
        }
    }
?>