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
    <h2>Editar marca</h2>
    <form action="mexer.php" method="POST">
    <input
        value="<?php echo $resultado['data_saida']; ?>"
        type="text"
        readonly
        name="id" />
    <br>
    <input
        value="<?php echo $resultado['hora_saida']; ?>"
        type="text"
        name="titulo"
        id="titulo"
        placeholder="Titulo" />
    <br><br>
    <button type="submit" name="editar">Editar</button>
    </form>
</body>
</html>