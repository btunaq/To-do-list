<?php
require_once("connection.php");
require_once("DAO/TarefaDAO.php");
require_once("models/Tarefa.php"); 
require_once("models/Message.php"); 
require_once("url.php"); 
require_once("DAO/UserDAO.php");

// Instancia os DAOs
$tarefaDAO = new TarefaDAO($conn);
$userDao = new UserDAO($conn, $BASE_URL);

// Pega os dados do usuário, se ele estiver logado
$userData = $userDao->verifyToken(false);

// Prepara as variáveis de tarefas
$tarefasAbertas = [];
$tarefasConcluidas = [];

// ALTERAÇÃO PRINCIPAL: Verifica se o usuário existe antes de buscar as tarefas
if ($userData) {
    // Se o usuário está logado, busca apenas as tarefas dele
    $tarefasAbertas = $tarefaDAO->findOpenTasksByUserId($userData->id);
    $tarefasConcluidas = $tarefaDAO->findCompletedTasksByUserId($userData->id);
}

// Lógica de mensagens (continua igual)
$message = new Message($BASE_URL);
$flassmessage = $message->getMessage();

if(!empty($flassmessage["msg"])){
    $message->clearMessage();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPTarefas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<div class="w-full max-w-5xl">
        
        <!-- Mensagem de Alerta -->
        <?php if(!empty($flassmessage["msg"])): ?>
            <div class="w-full mb-6 rounded-lg bg-red-100 p-4 text-center text-lg font-semibold text-red-800">
                <p class="msg <?= $flassmessage["type"]?>"><?= $flassmessage["msg"]?></p>
            </div>
        <?php endif; ?>
<div></div>

    
        
