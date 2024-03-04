<?php

//arquivo responsável por trabalhar com o banco

    session_start();

    include_once("conection.php");
    include_once("url.php");

    $data =$_POST;

    // MODIFICAÇÕES NO BANCO
    if(!empty($data)){

        //Criar contato
        if($data["type"] === "create"){

            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];

            $query="INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try{

               $stmt->execute();
               $_SESSION["msg"]= "Contato criado com sucesso!";
        
            } catch(PDOException $e){
                //erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
            }

        }
        else if($data["type"] === "edit"){

            $name= $data["name"];
            $phone= $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            $query = "UPDATE contacts SET name =:name , phone= :phone, observations =:observations WHERE id= :id ";

            $stmt= $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try{

                $stmt->execute();
                $_SESSION["msg"]= "Contato atualizado com sucesso!";
         
             } catch(PDOException $e){
                 //erro na conexão
                 $error = $e->getMessage();
                 echo "Erro: $error";
             }

        }
        else if($data["type"] === "delete"){

            $id= $data["id"];

            $query = "DELETE FROM contacts WHERE id= :id";

            $stmt= $conn->prepare($query);

            $stmt->bindParam(":id", $id);

            try{

                $stmt->execute();
                $_SESSION["msg"]= "Contato removido com sucesso!";
         
             } catch(PDOException $e){
                 //erro na conexão
                 $error = $e->getMessage();
                 echo "Erro: $error";
             }

        }

        // redirect home depois que enviar o form
        header("Location: " . $BASE_URL . "../index.php");
        
    }//SELEÇÃO DE DADOS
    else{
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

    }

//FECHAR CONEXÃO

$conn =null; //pra fechar conexão no PDO só setar ele como null, ele n tem um método close como o mysqli
    