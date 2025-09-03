<?php

include_once("templates/header.php");

?>

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
                    <a href="concluidas.php" class="w-full text-left block hover:bg-gray-700 py-2 px-4 rounded-lg transition-colors flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Concluídas
                    </a>
                </nav>
            </aside>

            <!-- Conteúdo Principal -->
            <main class="flex-1 p-6 overflow-y-auto">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="bg-blue-100 rounded-lg p-3 mb-6">
                        <h3 class="text-xl font-bold text-blue-800">Lista de Tarefas Pendentes</h3>
                    </div>
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="p-4 font-semibold">Nome</th>
                                <th class="p-4 font-semibold">Descrição</th>
                                <th class="p-4 font-semibold">Tipo</th>
                                <th class="p-4 font-semibold">Data de Conclusão</th>
                                <th class="p-4 font-semibold">Status</th>
                                <th class="p-4 font-semibold text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tarefasAbertas as $tarefa): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4"><?= htmlspecialchars($tarefa->getName()) ?></td>
                                    <td class="p-4 text-gray-600"><?= htmlspecialchars($tarefa->getDescription()) ?></td>
                                    <td class="p-4 text-gray-600"><?= htmlspecialchars($tarefa->getTipo()) ?></td>
                                    <td class="p-4 text-gray-600"><?= htmlspecialchars($tarefa->getConclusion()) ?></td>
                                    <td class="p-4">
                                        <span class="bg-yellow-200 text-yellow-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                                            <?= htmlspecialchars($tarefa->getStatus()) ?>
                                        </span>
                                    </td>
                                    <td class="p-4 text-center space-x-4">
                                        <a href="tarefaProcess.php?action=updateStatusCompleted&id=<?= $tarefa->getId() ?>&status=Concluida" class="text-green-600 hover:text-green-800 font-medium">Concluir</a>
                                        <a href="tarefaProcess.php?action=delete&id=<?= $tarefa->getId() ?>" onclick="return confirm('Tem certeza?');" class="text-red-600 hover:text-red-800 font-medium">Deletar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


</body>

</html>