<?php

//arquivo responsável por trabalhar com o banco

    session_start();

    include_once("conection.php");
    include_once("url.php");

    $contacts = []; //inicicar contacts como um array vazio

    $query = "SELECT * FROM contacts";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchAll();