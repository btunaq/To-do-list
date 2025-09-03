<?php
require_once("connection.php");
require_once("DAO/TarefaDAO.php");
require_once("models/Tarefa.php"); // Garanta que a classe Tarefa está incluída

$tarefaDAO = new TarefaDAO($conn);

// Busca apenas as tarefas com status 'Aberta'
$tarefasAbertas = $tarefaDAO->findOpenTasks();
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
