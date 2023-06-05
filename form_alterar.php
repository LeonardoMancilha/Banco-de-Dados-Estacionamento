<?php

//conexão com o bd
include 'inicia.php';
$PDO = conexao();

//obter o id para excluir
$id = $_GET['id'];

$sql = "SELECT * FROM carro WHERE carro_id=$id";
$stmt = $PDO->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h2, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Editar carro</h2>
    <form action="mexer.php" method="POST">
    <label for="carro_id">Id do carro</label>
    
    <input
        value="<?php echo $resultado['carro_id']; ?>"
        type="text"
        readonly
        name="carro_id" />
    <br> <label for="carro_id">Vaga do carro</label>
    <input
        value="<?php echo $resultado['vaga_carro']; ?>"
        type="text"
        readonly
        name="vaga_carro"
        id="vaga_carro"
        placeholder="Titulo" />
    <br><br> <label for="data_entrada">Data de entrada do carro</label>
    <input
        value="<?php echo $resultado['data_entrada']; ?>"
        type="text"
        readonly
        name="data_entrada"
        id="data_entrada"
        placeholder="Titulo" /> <label for="data_saida">Data de saída do carro</label>
        <input
        value="<?php echo $resultado['data_saida']; ?>"
        type="text"
        name="data_saida"
        id="data_saida"
        placeholder="Titulo" />
    <button type="submit" name="editar">Editar</button>
    </form>
</body>
</html>