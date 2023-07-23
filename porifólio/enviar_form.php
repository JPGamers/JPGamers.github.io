<?php
// Recupera os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$discord = $_POST['discord'];
$projectType = $_POST['project-type'];
$referencia = $_POST['referencia'];

// Monta a mensagem a ser enviada para o Discord
$mensagem = "Novo projeto submetido:\n";
$mensagem .= "Nome: $nome\n";
$mensagem .= "Email: $email\n";
$mensagem .= "Discord: $discord\n";
$mensagem .= "Tipo do Projeto: $projectType\n";
$mensagem .= "Referência da Construção: $referencia\n";

// URL do Webhook do Discord
$webhookUrl = "https://discord.com/api/webhooks/1132658351206043700/aYqv70aJXmDNXllSeUHQsreqVXmbupVtrceY0yIluCta5GHRPKoOnC1RAxenjvGIvAbd";

// Configuração do cabeçalho para o Webhook
$headers = array(
  'Content-Type: application/json'
);

// Monta o payload JSON para o Webhook
$payload = array(
  'content' => $mensagem
);

// Envia a mensagem para o Discord
$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_exec($ch);
curl_close($ch);

// Redireciona o usuário de volta para a página do formulário
header('Location: index.html');
exit();
?>
