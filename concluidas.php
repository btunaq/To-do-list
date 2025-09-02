<?php
require_once("connection.php");
require_once("DAO/TarefaDAO.php");

$tarefaDAO = new TarefaDAO($conn);

// MUDANÇA: Usamos a função para pegar SÓ tarefas concluídas
$tarefasConcluidas = $tarefaDAO->findCompletedTasks();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Tarefas Concluídas</title>
</head>
<body>
    <h1>Tarefas Concluídas</h1>

    <nav>
        <a href="index.php">Ver Tarefas Abertas</a> | 
        <a href="concluidas.php">Tarefas Concluídas</a>
    </nav>
    <hr>

    <table border="1" style="width:50%;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tarefasConcluidas as $tarefa): ?>
                <tr>
                    <td><?= htmlspecialchars($tarefa->getName()) ?></td>
                    <td><?= htmlspecialchars($tarefa->getStatus()) ?></td>
                    <td>
                        <a href="tarefaProcess.php?action=updateStatusOpen&id=<?= $tarefa->getId() ?>&status=Aberta">
                            Reabrir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

