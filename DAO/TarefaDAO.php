<?php

include_once("models/Tarefa.php");

// Lembre-se de implementar a interface se ela existir
// class TarefaDAO implements TarefaDAOInterface 
class TarefaDAO
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    // ALTERAÇÃO 1: O método `findAll` foi substituído por `findByUserId`
    // Agora ele busca todas as tarefas de um usuário específico.
    public function findByUserId($userId)
    {
        $tarefas = [];

        // Adicionamos a cláusula WHERE para filtrar pelo user_id
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

    // ALTERAÇÃO 2: O método `create` agora exige o ID do usuário.
    public function create(Tarefa $tarefas, $userId)
    {
        // Adicionamos a coluna `user_id` no INSERT
        $stmt = $this->conn->prepare("INSERT INTO tarefa (`name`, `tipo`, `status`, `conclusion`, `description`, `user_id`) VALUES (:name, :tipo, :status, :conclusion, :description, :user_id)");

        $stmt->bindParam(":name", $tarefas->getName());
        $stmt->bindParam(":tipo", $tarefas->getTipo());
        $stmt->bindParam(":status", $tarefas->getStatus());
        $stmt->bindParam(":conclusion", $tarefas->getConclusion());
        $stmt->bindParam(":description", $tarefas->getDescription());
        // Adicionamos o bind do novo parâmetro
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

    // ALTERAÇÃO 3: Busca tarefas ABERTAS apenas do usuário especificado.
    public function findOpenTasksByUserId($userId)
    {
        $tarefas = [];
        // Adicionamos a cláusula WHERE para filtrar pelo user_id
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

    // ALTERAÇÃO 4: Busca tarefas CONCLUÍDAS apenas do usuário especificado.
    public function findCompletedTasksByUserId($userId)
    {
        $tarefas = [];
        // Adicionamos a cláusula WHERE para filtrar pelo user_id
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