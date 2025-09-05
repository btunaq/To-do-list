<?php
include_once("templates/header.php");
?>

<div class="flex flex-col h-screen">
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
            <?php if ($userData): ?>
                <a href="<?= $BASE_URL ?>auth.php" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 font-medium transition-colors">Sair</a>
            <?php else: ?>
                <a href="<?= $BASE_URL ?>logout.php" class="bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 font-medium transition-colors">Entar / Cadastro</a>
            <?php endif; ?>
        </div>
    </header>