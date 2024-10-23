<?php 
include_once('DatabaseConnection.php');
include_once('Carros.php');
include_once('CarrosDAO.php');

$db = new DatabaseConnection();
$db->connect();
$conexao = $db->getConnection();
$carrosDAO = new CarrosDAO($conexao);

// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] == 'adicionar') {
        // Criar novo carro
        $carro = new Carros($_POST['codigo'], $_POST['marca'], $_POST['modelo'], $_POST['anoFabricacao'], $_POST['anoModelo'], $_POST['valor'], $_POST['placa']);
        $carrosDAO->criarCarros($carro);
    } elseif (isset($_POST['acao']) && $_POST['acao'] == 'atualizar') {
        // Atualizar carro existente
        $carro = new Carros($_POST['codigo'], $_POST['marca'], $_POST['modelo'], $_POST['anoFabricacao'], $_POST['anoModelo'], $_POST['valor'], $_POST['placa']);
        $carrosDAO->atualizarCarro($carro);
    } elseif (isset($_POST['acao']) && $_POST['acao'] == 'deletar') {
        // Deletar carro
        $carrosDAO->deletarCarro($_POST['codigo']);
    }
}

// Listar todos os carros
$carros = $carrosDAO->buscarCarros();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Carros</title>
</head>
<body>
    <h1>Gerenciamento de Carros</h1>

    <form method="POST" action="index.php">
        <input type="hidden" name="acao" value="adicionar">
        <label>Código:</label>
        <input type="text" name="codigo"><br>

        <label>Marca:</label>
        <input type="text" name="marca"><br>

        <label>Modelo:</label>
        <input type="text" name="modelo"><br>

        <label>Ano de Fabricação:</label>
        <input type="text" name="anoFabricacao"><br>

        <label>Ano de Modelo:</label>
        <input type="text" name="anoModelo"><br>

        <label>Valor:</label>
        <input type="text" name="valor"><br>

        <label>Placa:</label>
        <input type="text" name="placa"><br>

        <input type="submit" value="Adicionar Carro">
    </form>

    <h2>Lista de Carros</h2>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano de Fabricação</th>
                <th>Ano de Modelo</th>
                <th>Valor</th>
                <th>Placa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carros as $carro): ?>
            <tr>
                <td><?php echo $carro['codigo']; ?></td>
                <td><?php echo $carro['marca']; ?></td>
                <td><?php echo $carro['modelo']; ?></td>
                <td><?php echo $carro['anoFabricacao']; ?></td>
                <td><?php echo $carro['anoModelo']; ?></td>
                <td><?php echo $carro['valor']; ?></td>
                <td><?php echo $carro['placa']; ?></td>
                <td>
                    <form method="POST" action="index.php" style="display:inline-block;">
                        <input type="hidden" name="codigo" value="<?php echo $carro['codigo']; ?>">
                        <input type="hidden" name="acao" value="deletar">
                        <input type="submit" value="Deletar">
                    </form>
                    <form method="POST" action="index.php" style="display:inline-block;">
                        <input type="hidden" name="codigo" value="<?php echo $carro['codigo']; ?>">
                        <input type="hidden" name="acao" value="atualizar">
                        <input type="submit" value="Atualizar">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
