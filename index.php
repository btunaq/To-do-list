<?php
require_once("connection.php");
require_once("DAO/TarefaDAO.php");

$tarefaDAO = new TarefaDAO($conn);

// MUDANÇA: Usamos a nova função para pegar SÓ tarefas abertas
$tarefasAbertas = $tarefaDAO->findOpenTasks();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Minhas Tarefas</title>
</head>

<body>
    <h1>Tarefas Abertas</h1>

    <nav>
        <a href="index.php">Tarefas Abertas</a> |
        <a href="concluidas.php">Ver Tarefas Concluídas</a>
    </nav>
    <hr>
    <form class="form-tarefa" action="tarefaProcess.php?action=create" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">nome da tarefa</label>
            <input type="text" name="name" placeholder="Insira uma tarefa">
        </div>
        <div>
            <label for="tipo">tipo</label>
            <input type="text" name="tipo" placeholder="Insira o tipo">
        </div>
        <div>
            <label for="conclusion">data</label>
            <input type="date" name="conclusion" placeholder="Insira uma data de conclusao">
        </div>
        <div>
            <label for="description">descricao</label>
            <input type="text" name="description" placeholder="Qual descricao da tarefa">
        </div>
        <input type="submit" value="salvar">
    </form>

    <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Status</th>
                <th>Descricao</th>
                <th>Ação</th>
                <th>Action</th>

        </thead>
        <tbody>
            <?php foreach ($tarefasAbertas as $tarefa): ?>
                <tr>
                    <td><?= htmlspecialchars($tarefa->getName()) ?></td>
                    <td><?= htmlspecialchars($tarefa->getStatus()) ?></td>
                    <td><?= htmlspecialchars($tarefa->getDescription()) ?></td>
                    <td>
                        <a href="tarefaProcess.php?action=updateStatusCompleted&id=<?= $tarefa->getId() ?>&status=Concluída">
                            Concluir
                        </a>
                    </td>
                    <td>
                        <a href="tarefaProcess.php?action=delete&id=<?= $tarefa->getId() ?>"
                            onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">
                            Deletar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>