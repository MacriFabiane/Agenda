<?php

//arquivo responsável por trabalhar com o banco

    session_start();

    include_once("connectino.php");
    include_once("url.php");

    $query = "SELECT * FROM contacts";

    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchAll();