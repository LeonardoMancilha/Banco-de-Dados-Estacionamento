<?php
require_once 'erros.php';
$PDO = conexao();
$carro_id = $_GET['id'];

//executar o comando SQL
$sql = "DELETE FROM carro WHERE carro_id = $carro_id";
$stmt = $PDO->prepare($sql);
$stmt->execute();

//redirecionar o usuario
header('Location: conexao.php');