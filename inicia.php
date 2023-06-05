<?php

function conexao(){
    $PDO = new PDO('mysql:host=localhost;dbname=carros','root','');
    return $PDO;
}

?>