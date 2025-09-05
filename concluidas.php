<?php
include_once("templates/header.php");


?>

            <!-- Conteúdo Principal -->
            <main class="flex-1 p-6 overflow-y-auto">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="bg-green-100 rounded-lg p-3 mb-6">
                        <h3 class="text-xl font-bold text-green-800">Histórico de Tarefas Concluídas</h3>
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
                            <?php foreach ($tarefasConcluidas as $tarefa): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4 text-gray-500 line-through"><?= htmlspecialchars($tarefa->getName()) ?></td>
                                    <td class="p-4 text-gray-500 line-through"><?= htmlspecialchars($tarefa->getDescription()) ?></td>
                                    <td class="p-4 text-gray-500 line-through"><?= htmlspecialchars($tarefa->getTipo()) ?></td>
                                    <td class="p-4 text-gray-500 line-through"><?= htmlspecialchars($tarefa->getConclusion()) ?></td>
                                    <td class="p-4">
                                        <span class="bg-green-200 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                                            <?= htmlspecialchars($tarefa->getStatus()) ?>
                                        </span>
                                    </td>
                                    <td class="p-4 text-center space-x-4">
                                        <a href="tarefaProcess.php?action=updateStatusOpen&id=<?= $tarefa->getId() ?>&status=Aberta" class="text-blue-600 hover:text-blue-800 font-medium">Reabrir</a>
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