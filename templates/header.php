<?php
require_once("connection.php");
require_once("DAO/TarefaDAO.php");
require_once("models/Tarefa.php"); // Garanta que a classe Tarefa está incluída

$tarefaDAO = new TarefaDAO($conn);

// Busca apenas as tarefas com status 'Aberta'
$tarefasAbertas = $tarefaDAO->findOpenTasks();
$tarefasConcluidas = $tarefaDAO->findCompletedTasks();

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

<body class="bg-gray-100">

    <div class="flex flex-col h-screen">
        <!-- Header / Navbar -->
        <header class="bg-white shadow-md w-full p-4 flex items-center justify-between z-10">
            <div class="flex items-center">
               <svg class="h-8 w-8 text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm.53 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v5.69a.75.75 0 0 0 1.5 0v-5.69l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                </svg>

                <span class="text-xl font-bold ml-2 text-gray-800">UPTarefas</span>
            </div>
            <div class="flex items-center justify-center bg-red-700 text-white rounded-lg px-6 py-2 shadow-lg">
                <h1 class="text-xl font-semibold mx-6 whitespace-nowrap">Tarefas diárias</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="text-gray-600 hover:text-red-700 font-medium transition-colors">Login</a>
                <a href="#" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 font-medium transition-colors">Cadastro</a>
            </div>
        </header>
        <!-- Container Principal -->
        <div class="flex flex-1 overflow-hidden">
            <!-- Barra Lateral -->
            <aside class="w-64 bg-gray-800 text-white p-4 flex flex-col">
                <h2 class="text-lg font-bold mb-6">Menu</h2>
                <nav class="space-y-3">
                    <a href="adicionar.php" class="w-full text-left bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Adicionar Tarefa
                    </a>
                    <a href="index.php" class="w-full text-left block hover:bg-gray-700 py-2 px-4 rounded-lg transition-colors flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                        </svg>
                        Tarefas Abertas
                    </a>
                    <a href="concluidas.php" class="w-full text-left block hover:bg-gray-700 py-2 px-4 rounded-lg transition-colors flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Concluídas
                    </a>
                </nav>
            </aside>