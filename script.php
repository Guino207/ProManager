<?php

require 'conectar.php';

if(isset($_POST['Criar'])){
    $nome = $_POST['nome'];
    $descrition = $_POST['descrition'];
    $selecionar = $_POST['selecionar'];
    $periodo = $_POST['periodo'];

    if(empty($nome) or empty($descrition) or empty($selecionar) or empty($periodo)){
        $error = "Precisas preencher tudo";
    }else{
        $sql = "INSERT INTO projecto(nome,descrition,selecionar,periodo) VALUES(?,?,?,?)";
        $sql = "INSERT INTO projecto(nome,descrition,selecionar,periodo) VALUES('Guilherme','Boa pessoa aqui','Designer','12/06/2025')";
        $stmt = $manager->prepare($sql);
        $stmt->bind_param("sss",$nome,$descrition,$selecionar,$periodo);
        $stmt->execute();
        $resultado = $stmt->get_resultado();

        echo "Funcionou!!";
    }
}
