<?php
require_once("connection.php");
require_once("DAO/TarefaDAO.php");
require_once("models/Tarefa.php");
require_once("models/Message.php");
require_once("url.php");
require_once("DAO/UserDAO.php");


$tarefaDAO = new TarefaDAO($conn);
$userDao = new UserDAO($conn, $BASE_URL);


$userData = $userDao->verifyToken(false);

$tarefasAbertas = [];
$tarefasConcluidas = [];

if ($userData) {

    $tarefasAbertas = $tarefaDAO->findOpenTasksByUserId($userData->id);
    $tarefasConcluidas = $tarefaDAO->findCompletedTasksByUserId($userData->id);
}

$message = new Message($BASE_URL);
$flassmessage = $message->getMessage();

if (!empty($flassmessage["msg"])) {
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
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <?php if (!empty($flassmessage["msg"])): ?>
        <div class="w-full my-4 rounded-lg p-4 text-center text-md font-semibold <?php echo ($flassmessage['type'] === 'success') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
            <p><?= $flassmessage["msg"] ?></p>
        </div>
    <?php endif; ?>
</div>