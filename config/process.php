<?php

//arquivo responsável por trabalhar com o banco

    session_start();

    include_once("conection.php");
    include_once("url.php");

    $id;

    if(!empty($_GET)){
        $id = $_GET["id"];
    }
    //retorna o dado de um contato
    if(!empty($id)){

        $query = "SELECT * FROM contacts WHERE id= :id";

        $stmt= $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact =$stmt->fetch();
    }
    else{
        //retorna todos os contatos
        $contacts = []; //inicicar contacts como um array vazio

        $query = "SELECT * FROM contacts";

        $stmt = $conn->prepare($query);

        $stmt->execute();

        $contacts = $stmt->fetchAll();
    }