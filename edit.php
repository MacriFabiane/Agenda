<?php
    include_once("template/header.php");
?>
  <div class="container">
    <?php include_once ("template/backbtn.html"); ?>
    <h1 id="main-title">Editar Contato</h1>
    <form id="create-form" action="<? $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="edit"> <!--meio que vai guiar o envio de dados no back -->
        <input type="hidden" name="id" value="<?= $contact["id"] ?>">
        <div class="form-group">
            <label for="name">Nome do contato:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do contato" value="<?= $contact["name"] ?>" required><!-- a tag name é o que vai nos guiar no backend -->
        </div>
        <div class="form-group">
            <label for="phone">Telefone do contato:</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone do contato" value="<?= $contact["phone"] ?>" required><!-- required obriga a ser preenchido antes de dar submit -->
        </div>
        <div class="form-group">
            <label for="observations">Observações:</label>
            <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Digite observações sobre o contato" rows="3" ><?= $contact["observations"] ?></textarea> <!-- rows = 3 é altura do campo de digitação, 3 linhas -->
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
  </div>

<?php
    include_once("template/footer.php");
?>