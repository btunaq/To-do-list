<?php
include_once("templates/header.php");
include_once("templates/navbar.php");
?>

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