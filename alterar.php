<?php
require_once 'erros.php';
$PDO = conexao();

$id = $_POST['id'];
$titulo = $_POST['titulo'];

//update
try{
    $stmt = $PDO->prepare("UPDATE estacionamento SET nome=:nome WHERE ID=id");
    $stmt->bindValue(":nome",$titulo);
    $stmt->bindValue(":id",$id);
    $resultado = $stmt->execute();

    if($resultado){
        header('Location: form_alterar.php');
    }
}
catch(PDOException $err){
    echo "Erro de conexao: ".$err->getMenssage();
}