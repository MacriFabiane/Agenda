<?php
    include_once("template/header.php");
?>
    
    <div class="container" id="view-contact-container">
        <h1 id="main-title"><?= $contact['name'] ?></h1>
        <p class="blod">Telefone:</p>
        <p><?= $contact['phone'] ?></p>
        <p class="blod">Observações:</p>
        <p><?= $contact['observations'] ?></p>
    </div>

<?php
    include_once("template/footer.php");
?>