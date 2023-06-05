<?php
require_once 'erros.php';
function periodo($data_entrada, $data_saida){
  $data1 = new DateTime($data_entrada);
  $data2 = new DateTime($data_saida);
$intervalo = $data1->diff($data2);

return "{$intervalo->d} dias, {$intervalo->h} horas"; 
}

$PDO = conexao();
//SELECT * FROM livros
$stmt = $PDO->prepare("SELECT * FROM carro");
$stmt->execute();
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="shortcut icon" href="grupo.jpg" type="image/x-icon">
    <title>Última atividade</title>
  </head>
  <body>
    <h1>Estacionamento</h1>
    <a href="form_cadastrar.php" class="btn btn-info" role="button">Cadastrar</a>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Vaga</th>
                <th>Data de entrada</th>
                <th>Placa do Veículo</th>
                <th>Data de saída</th>
                <th>Período</th>
                <th colspan=2>Opções</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while($resultado = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>".$resultado['carro_id']."</td>";
                echo "<td>".$resultado['vaga_carro']."</td>";
                echo "<td>".$resultado['data_entrada']."</td>";
                echo "<td>".$resultado['placa_veiculo']."</td>";
                echo "<td>".$resultado['data_saida']."</td>";
                echo "<td>".periodo($resultado['data_entrada'], $resultado['data_saida'])."</td>";
                echo "<td><a href='form_alterar.php?id=".$resultado['carro_id']."'>Alterar</a></td>";
                echo "<td><a href='deletar.php?id=".$resultado['carro_id']."'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

