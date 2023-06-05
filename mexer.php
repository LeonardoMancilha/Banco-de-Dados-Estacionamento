<?php
require_once 'erros.php';
$PDO = conexao();
$carro_id = $_POST['carro_id'];
$data_saida = $_POST['data_saida'];
$data = $_POST['data_saida'];
$hora = $_POST['hora_saida'];
$phora = $_POST['hora_entrada'];


//update
try{
    $stmt = $PDO->prepare("UPDATE carro SET data_saida=:data_saida WHERE carro_id=:carro_id");
    $stmt->bindValue(":data_saida",$data);
    $stmt->bindValue(":carro_id",$carro_id);
    $stmt->bindValue(":data_saida",$data_saida);
    $resultado = $stmt->execute();

    if($resultado){
        $conta = $hora - $phora;
        echo "Você ficou ".$conta;
        header('Location: conexao.php');
    }
}
catch(PDOException $err){
    echo "Erro de conexao: ".$err->getMenssage();
}