<?php

include_once("connection.php");
include_once("DAO/TarefaDAO.php");

$TarefaDao = new TarefaDAO($conn);
$tarefa = $TarefaDao->findAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <form class="form-tarefa" action="tarefaProcess.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="name">nome da tarefa</label>
            <input type="text" name="name" placeholder="Insira uma tarefa">
        </div>
        <div>
            <label for="tipo">tipo</label>
            <input type="text" name="tipo" placeholder="Insira o tipo">
        </div>
        <div>
            <label for="status">status</label>
            <input type="text" name="status" placeholder="Qual status">
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

        <div>
            <ul>
                <?php foreach($tarefa as $tarefas): ?>
                    <li><?= $tarefas->getName() ?> - <?= $tarefas->getTipo() ?> - <?= $tarefas->getStatus() ?> - <?= $tarefas->getConclusion() ?> - <?= $tarefas->getDescription() ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        
    </form>

</body>

</html>