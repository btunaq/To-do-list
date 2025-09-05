<?php

require_once("connection.php");
require_once("url.php");
require_once("models/Tarefa.php");
require_once("models/User.php");
require_once("DAO/TarefaDAO.php");
require_once("DAO/UserDAO.php");

$tarefaDAO = new TarefaDAO($conn);

$userDao = new UserDAO($conn, $BASE_URL);
$userData = $userDao->verifyToken(true);

$action = $_POST['action'] ?? $_GET['action'] ?? null;

if ($action && $userData) {
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

            $tarefaDAO->create($newTarefa, $userData->id);
            break;


        case 'delete':
            $id = $_GET['id'] ?? null;
            if ($id && is_numeric($id)) {
                $tarefaDAO->delete($id);
            }
            break;

        case 'updateStatusCompleted':
            $id = $_GET['id'] ?? null;
            if ($id && is_numeric($id)) {
                $tarefaDAO->updateStatusCompleted($id);
            }
            break;

        case 'updateStatusOpen':
            $id = $_GET['id'] ?? null;
            if ($id && is_numeric($id)) {
                $tarefaDAO->updateStatusOpen($id);
            }
            break;
    }
}

header("Location: index.php");
exit();
