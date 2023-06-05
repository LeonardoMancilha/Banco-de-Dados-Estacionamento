<?php
require_once 'erros.php';
$PDO = conexao();
$vagaliberada = $PDO->prepare("SELECT DISTINCT vaga_carro FROM carro WHERE data_saida!=''");
$vagaliberada->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
    <form action="cadastrar.php" method="POST">
    <input type="datetime-local" name="data_entrada" id="data_entrada">
    <input type="text" name="placa_veiculo" id="placa_veiculo" placeholder="Placa">
    <label for="cars">Escolha a vaga:</label>
    <select name="vaga_carro" id="vaga_carro">
    <?php
    while($resultado = $vagaliberada->fetch(PDO::FETCH_ASSOC)){
        echo "<option value='".$resultado['vaga_carro']."'>".$resultado['vaga_carro']."</option>";
    }
    ?>
    </select>
    <br><br>
    <input type="submit" value="submit">
    </form>
</body>
</html>