<?php
session_start();
require 'conectar.php';

function Apresentation(){
    if(isset($_POST['Criar'])){
        $nome = $_POST['nome'];
        $descrition = $_POST['descrition'];
        $select = $_POST['select'];
        $data = $_POST['data'];


        if(empty($nome) or empty($descrition) or empty($select) or empty($data)){
            $error = "Precisas preencher tudo";
        }else{
            $sql = "INSERT INTO projeto(nome,descrition,select,data) VALUES(?,?,?,?)";
            $stmt = $manager->prepare($sql);
            $stmt->bind_param("ssss", $nome, $descrition, $select, $data);
            $stmt->execute();
            $resultado = $stmt->get_resultado();

            $_SESSION['nomeProjeto'] = $projeto['nome'];
            $_SESSION['descritionProjeto'] = $projeto['descrition'];
            $_SESSION['selectProjeto'] = $projeto['select'];
            $_SESSION['dataProjeto'] = $projeto['data'];
        }
    }
}