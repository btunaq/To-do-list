<?php
include_once("templates/header.php");
include_once("templates/aside.php");

?>

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