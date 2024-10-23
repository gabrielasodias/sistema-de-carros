<?php 
include_once('DatabaseConnection.php');
include_once('Carros.php');
class CarrosDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    // Criação de um carro
    public function criarCarros(Carros $carros) {
        $codigo = $carros->getCodigo();
        $marca = $carros->getMarca();
        $modelo = $carros->getModelo();
        $anoFabricacao = $carros->getAnoFabricacao();
        $anoModelo = $carros->getAnoModelo();
        $valor = $carros->getValor();
        $placa = $carros->getPlaca();

        $query = "INSERT INTO carros (codigo, marca, modelo, anoFabricacao, anoModelo, valor, placa) 
                  VALUES (:codigo, :marca, :modelo, :anoFabricacao, :anoModelo, :valor, :placa)";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':anoFabricacao', $anoFabricacao);
        $stmt->bindParam(':anoModelo', $anoModelo);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();
    }

    // Busca de todos os carros
    public function buscarCarros() {
        $query = "SELECT * FROM carros";
        return $this->conexao->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Atualizar carro
    public function atualizarCarro(Carros $carros) {
        $codigo = $carros->getCodigo();
        $marca = $carros->getMarca();
        $modelo = $carros->getModelo();
        $anoFabricacao = $carros->getAnoFabricacao();
        $anoModelo = $carros->getAnoModelo();
        $valor = $carros->getValor();
        $placa = $carros->getPlaca();

        $query = "UPDATE carros SET marca = :marca, modelo = :modelo, anoFabricacao = :anoFabricacao, anoModelo = :anoModelo, valor = :valor, placa = :placa 
                  WHERE codigo = :codigo";
        
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':anoFabricacao', $anoFabricacao);
        $stmt->bindParam(':anoModelo', $anoModelo);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':placa', $placa);
        $stmt->execute();
    }

    // Deletar carro
    public function deletarCarro($codigo) {
        $query = "DELETE FROM carros WHERE codigo = :codigo";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->execute();
    }
}
?>
