<?php
// Obtém os dados do formulário
$name = $_POST['name'];
$email = $_POST['email'];

// Faça o tratamento dos dados e gere a resposta
$response = "Olá, $name! Seu e-mail ($email) foi recebido com sucesso.";

// Retorna a resposta
echo $response;
?>
