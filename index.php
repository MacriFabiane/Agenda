<?php
    include_once("template/header.php");
?>
    <div class="container">
        <?php if(isset($printMsg) && $printMsg != ''): ?>
            <p id="msg"> <?php $printMsg ?> </p> <!-- vai imprimir a mensagem de sessao -->
        <?php endif; ?>
        <h1 id="main-title">Minha Agenda</h1>
        <?php if(count($contacts) > 0): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                        <th scope="col"></th> <!--deixa em branco pq serão as ações da tabela -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td scope="row"><?= $contact["id"] ?></td>
                            <td scope="row"><?= $contact["name"] ?></td>
                            <td scope="row"><?= $contact["phone"] ?></td>
                            <td class="actions">
                                <a href="#"><i class="fas fa-eye check-icon"></i></a>
                                <a href="#"><i class="far fa-edit edit-icon"></i></a>
                                <button type="submit"><i class="fas fa-times delet-icon"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?PHP else: ?>
            <p id="empty-list-text"> Ainda não há contatos na sua agenda, <a href="<?php $BASE_URL ?>create.php"> clique aqui para adicionar</a>.</p>
        <?php endif; ?>
    </div>

<?php
    include_once("template/footer.php");
?>