<?php

include_once("connection.php");
include_once("DAO/TarefaDAO.php");
include_once("models/Tarefa.php");

$tarefaDAO = new TarefaDAO($conn);


$action = $_POST['action'] ?? $_GET['action'] ?? null;

if ($action) {
    switch ($action) {
        
        case 'create':
            $name = $_POST["name"];
            $tipo = $_POST["tipo"];
            $status = "Aberta";
            $conclusion = $_POST["conclusion"];
            $description = $_POST["description"];

            $newTarefa = new Tarefa();
            $newTarefa->setName($name);
            $newTarefa->setTipo($tipo);
            $newTarefa->setStatus($status);
            $newTarefa->setConclusion($conclusion);
            $newTarefa->setDescription($description);

            $tarefaDAO->create($newTarefa);
            break;

      
        case 'delete':
            $id = $_GET['id'] ?? null;
            if ($id && is_numeric($id)) {
                $tarefaDAO->delete($id);
            }
            break;

        case 'updateStatusCompleted':
            $id = $_GET['id'] ?? null;
            if($id && is_numeric($id)){
                $tarefaDAO->updateStatusCompleted($id);
            }
            break;

        case 'updateStatusOpen':
            $id = $_GET['id'] ?? null;
            if($id && is_numeric($id)){
                $tarefaDAO->updateStatusOpen($id);
            }
            break;
    }
}

header("Location: index.php");
exit();