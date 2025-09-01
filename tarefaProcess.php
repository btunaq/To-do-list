<?php

include_once("connection.php");
include_once("DAO/TarefaDAO.php");

$tarefaDAO = new TarefaDAO($conn);

$name = $_POST["name"];
$tipo = $_POST["tipo"];
$status = $_POST["status"];
$conclusion = $_POST["conclusion"];
$description = $_POST["description"];


$newTarefa = new Tarefa();

$newTarefa->setName($name);
$newTarefa->setTipo($tipo);
$newTarefa->setStatus($status);
$newTarefa->setConclusion($conclusion);
$newTarefa->setDescription($description);

$tarefaDAO->create($newTarefa);

header("location: index.php");

?>