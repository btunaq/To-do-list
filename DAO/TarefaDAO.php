<?php

include_once("models/Tarefa.php");

class TarefaDAO
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByUserId($userId)
    {
        $tarefas = [];


        $stmt = $this->conn->prepare("SELECT * FROM tarefa WHERE user_id = :user_id ORDER BY id DESC");

        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        $data = $stmt->fetchAll();

        foreach ($data as $item) {
            $tarefa = new Tarefa();

            $tarefa->setId($item["id"]);
            $tarefa->setName($item["name"]);
            $tarefa->setTipo($item["tipo"]);
            $tarefa->setStatus($item["status"]);
            $tarefa->setConclusion($item["conclusion"]);
            $tarefa->setDescription($item["description"]);

            $tarefas[] = $tarefa;
        }
        return $tarefas;
    }

    public function create(Tarefa $tarefas, $userId)
    {
        $stmt = $this->conn->prepare("INSERT INTO tarefa (`name`, `tipo`, `status`, `conclusion`, `description`, `user_id`) VALUES (:name, :tipo, :status, :conclusion, :description, :user_id)");

        $stmt->bindParam(":name", $tarefas->getName());
        $stmt->bindParam(":tipo", $tarefas->getTipo());
        $stmt->bindParam(":status", $tarefas->getStatus());
        $stmt->bindParam(":conclusion", $tarefas->getConclusion());
        $stmt->bindParam(":description", $tarefas->getDescription());

        $stmt->bindParam(":user_id", $userId);

        $stmt->execute();
    }


    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM tarefa WHERE `tarefa`.`id` = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function updateStatusCompleted($id)
    {
        $stmt = $this->conn->prepare("UPDATE `tarefa` SET `status` = 'Concluida' WHERE `tarefa`.`id` = :id;");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function updateStatusOpen($id)
    {
        $stmt = $this->conn->prepare("UPDATE `tarefa` SET `status` = 'Aberta' WHERE `tarefa`.`id` = :id;");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }


    public function findOpenTasksByUserId($userId)
    {
        $tarefas = [];

        $stmt = $this->conn->prepare("SELECT * FROM tarefa WHERE status = 'Aberta' AND user_id = :user_id ORDER BY id DESC");

        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        $data = $stmt->fetchAll();

        foreach ($data as $item) {
            $tarefa = new Tarefa();

            $tarefa->setId($item["id"]);
            $tarefa->setName($item["name"]);
            $tarefa->setTipo($item["tipo"]);
            $tarefa->setStatus($item["status"]);
            $tarefa->setConclusion($item["conclusion"]);
            $tarefa->setDescription($item["description"]);
            $tarefas[] = $tarefa;
        }
        return $tarefas;
    }

    public function findCompletedTasksByUserId($userId)
    {
        $tarefas = [];

        $stmt = $this->conn->prepare("SELECT * FROM tarefa WHERE status = 'Concluída' AND user_id = :user_id ORDER BY id DESC");

        $stmt->bindParam(":user_id", $userId);
        $stmt->execute();

        $data = $stmt->fetchAll();

        foreach ($data as $item) {
            $tarefa = new Tarefa();

            $tarefa->setId($item["id"]);
            $tarefa->setName($item["name"]);
            $tarefa->setTipo($item["tipo"]);
            $tarefa->setStatus($item["status"]);
            $tarefa->setConclusion($item["conclusion"]);
            $tarefa->setDescription($item["description"]);
            $tarefas[] = $tarefa;
        }
        return $tarefas;
    }
}
