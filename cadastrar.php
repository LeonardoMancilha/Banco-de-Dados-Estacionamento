<?php
require_once 'inicia.php';
$PDO = conexao();

$vaga_carro = $_POST['vaga_carro'];
$data_entrada = $_POST['data_entrada'];
$placa_veiculo = $_POST['placa_veiculo'];
$vaga_liberada = $_POST['vaga_liberada'];


try{
    $stmt = $PDO->prepare("INSERT INTO carro(vaga_carro, data_entrada, placa_veiculo, vaga_liberada) VALUES(:vaga_carro, :data_entrada, :placa_veiculo, :vaga_liberada)");
    $stmt ->bindValue(":vaga_carro", $vaga_carro);
    $stmt ->bindValue(":data_entrada", $data_entrada);
    $stmt ->bindValue(":placa_veiculo", $placa_veiculo);
    $stmt ->bindValue(":vaga_liberada", $vaga_liberada);
    $final = $stmt->execute();
    if ($final){
        header('Location: conexao.php');
    }
}
catch(PDOException $err){
    echo "Erro de conexão: ".$err->getMessage();
}
 function checktime($aux) {
$aux=explode(':',$aux);
if ($aux[0]!=00){ //horas 1º campo
echo $nome."\nPermaneceu ".$aux[0]." horas e ".$aux[1]." minutos e ".$aux[2]." segundos";
}
else if ($aux[1]!=00){ //minutos 2º campo
echo $nome."\nPermaneceu ".$aux[1]." minutos e ".$aux[2]." segundos";
}
else if ($aux[2]!=00){ //segundos 3º campo
echo $nome."\nPermaneceu ".$aux[2]." segundos";
}
}
$diffHoras = date('H:i:s',(strtotime($horaSaida) - strtotime($horaEntrada))-3600);
echo "<br>Tempo Presente " . $diffHoras . "<br>HoraEntrada " . $horaEntrada . "<br>HoraSaida " . $horaSaida . "<br><br>";
checktime($diffHoras);