<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se foram enviados os campos nome e email
    if (isset($_POST['nome']) && isset($_POST['email'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Gera a mensagem de resposta
        $resposta = "Olá $nome, seu email é $email";

        // Redireciona de volta para o formulário, adicionando a mensagem de resposta como parâmetro na URL
        header("Location: form.php?response=" . urlencode($resposta));
        exit;
    }
}
?>