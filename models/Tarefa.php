<?php

    Class Tarefa {
        private $id;
        private $name;
        private $tipo;
        private $status;
        private $conclusion;
        private $description;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

         public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }

         public function getTipo(){
            return $this->tipo;
        }
        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

         public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }

         public function getConclusion(){
            return $this->conclusion;
        }
        public function setConclusion($conclusion){
            $this->conclusion = $conclusion;
        }
         public function getDescription(){
            return $this->description;
        }
        public function setDescription($description){
            $this->description = $description;
        }

    }

    interface TarefaDAOInterface {
        public function create(Tarefa $tarefa);
        public function findAll();
        public function updateStatusCompleted($id);
        public function delete($id);
        public function findOpenTasksByUserId();
        public function updateStatusOpenByUserId($id);
    }