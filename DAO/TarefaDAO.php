<?php

    include_once("models/Tarefa.php");

    class TarefaDAO implements TarefaDAOInterface {
        private $conn;

        public function __construct(PDO $conn){
            $this->conn = $conn;
        }

        public function findAll(){
            $tarefa = [];

            $stmt = $this->conn->query("SELECT * FROM tarefa");

            $data = $stmt->fetchAll();

            foreach($data as $item){
                $tarefas = new Tarefa();

                $tarefas->setId($item["id"]);
                $tarefas->setName($item["name"]);
                $tarefas->setTipo($item["tipo"]);
                $tarefas->setStatus($item["status"]);
                $tarefas->setConclusion($item["conclusion"]);
                $tarefas->setDescription($item["description"]);

                $tarefa[] = $tarefas;
            }
            return $tarefa;
        }

        public function create(Tarefa $tarefas){

            $stmt = $this->conn->prepare("INSERT INTO tarefa (`name`, `tipo`, `status`, `conclusion`, `description`) VALUES (:name, :tipo, :status, :conclusion, :description)");
            
            $stmt->bindParam(":name", $tarefas->getName());
            $stmt->bindParam(":tipo", $tarefas->getTipo());
            $stmt->bindParam(":status", $tarefas->getStatus());
            $stmt->bindParam(":conclusion", $tarefas->getConclusion());
            $stmt->bindParam(":description", $tarefas->getDescription());

            $stmt->execute();
        }
    }