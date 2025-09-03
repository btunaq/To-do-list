<?php

include_once("templates/header.php");

$tarefaDAO = new TarefaDAO($conn);

?>

<body class="bg-gray-100">

    <div class="flex flex-col h-screen">
        <header class="bg-white shadow-md w-full p-4 flex items-center justify-between z-10">
            <div class="flex items-center">
                <svg class="h-8 w-8 text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm.53 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v5.69a.75.75 0 0 0 1.5 0v-5.69l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                </svg>
                <span class="text-xl font-bold ml-2 text-gray-800">UPTarefas</span>
            </div>
            <div class="flex items-center justify-center bg-red-700 text-white rounded-lg px-6 py-2 shadow-lg">
                <h1 class="text-xl font-semibold mx-6 whitespace-nowrap">Adicionar Tarefas</h1>
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
                    <button id="addTaskBtn" class="w-full text-left bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition-colors flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Adicionar Tarefa
                    </button>
                    <a href="concluidas.php" class="w-full text-left block hover:bg-gray-700 py-2 px-4 rounded-lg transition-colors flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Concluídas
                    </a>
                </nav>
            </aside>

            <main class="flex-1 p-6 overflow-y-auto">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="bg-red-100 rounded-lg p-3 mb-6">
                        <h3 class="text-xl font-bold text-red-800 ">Adicionar uma tarefa</h3>
                    </div>

                    <form class="form-tarefa" action="tarefaProcess.php?action=create" method="post" enctype="multipart/form-data">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome da Tarefa</label>
                                <input type="text" name="name" id="name" placeholder="Ex: Estudar PHP" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500">
                            </div>
                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo/Categoria</label>
                                <input type="text" name="tipo" id="tipo" placeholder="Ex: Estudos" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500">
                            </div>
                            <div>
                                <label for="conclusion" class="block text-sm font-medium text-gray-700">Data de Conclusão</label>
                                <input type="date" name="conclusion" id="conclusion" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 text-gray-700">
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <textarea name="description" id="description" placeholder="Detalhes da tarefa..." rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500"></textarea>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end space-x-3">
                            <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Cancelar</button>
                            <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Salvar Tarefa</button>
                        </div>
                    </form>
                </div>
            </main>

</body>

</html>