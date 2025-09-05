# ⬆️UPTarefas - Gerenciador de Tarefas Pessoal

**UPTarefas** é um sistema de gerenciamento de tarefas (To-Do List) desenvolvido como um projeto prático para aplicar conceitos de desenvolvimento web com PHP e interação com banco de dados MySQL.  
A aplicação permite que usuários se cadastrem, façam login e gerenciem suas próprias tarefas, classificando-as por prioridade e acompanhando seu status.

O projeto é de autoria própria, desenvolvido do zero para fins de aprendizado e demonstração de habilidades.

---

## 🚀 Tecnologias Utilizadas
Este projeto foi construído com as seguintes tecnologias:

- **Backend:** PHP 8.3.21  
- **Frontend:** HTML5 e Tailwind CSS  
- **Banco de Dados:** MySQL (gerenciado via phpMyAdmin)  
- **Servidor Local:** Apache (utilizando o pacote XAMPP v3.3.0)  

---

## ⚙️ Pré-requisitos
Antes de começar, certifique-se de ter instalado em sua máquina:

- [XAMPP versão v3.3.0](https://www.apachefriends.org/): já inclui PHP 8.3.21, Apache e MariaDB (compatível com MySQL).  
- [Git](https://git-scm.com/downloads): para clonar o repositório.  
- Um navegador web de sua preferência (Chrome, Firefox, etc.).
  
---


## 📋 Requisitos do Sistema

### Requisitos Mínimos
- Adicionar tarefa  
- Listar tarefas  
- Marcar tarefa como concluída  
- Deletar uma tarefa  

### Requisitos Adicionais
- Data da tarefa  
- Tipo da tarefa  
- Status da tarefa  

---

## 🗂 Diagrama do Banco de Dados (ER)

**Descrição das tabelas:**

- **user**
  - id
  - name
  - email
  - password
  - token

- **Tarefa**
  - id
  - user_id
  - nome
  - tipo
  - status
  - description
  - conclusion

> Relação: Um usuário pode possuir várias tarefas (1:N).

---

## 📋 Como Rodar a Aplicação
Siga os passos abaixo para configurar e executar o projeto em seu ambiente local.

### 1. Clonar o Repositório
Abra o terminal na pasta `htdocs` do seu XAMPP (geralmente em `C:\xampp\htdocs`) e clone o projeto:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
```

### 2. Iniciar o Servidor
Abra o Painel de Controle do XAMPP e inicie os módulos Apache e MySQL.

### 3. Criar e Configurar o Banco de Dados
Abra seu navegador e acesse o phpMyAdmin em http://localhost/phpmyadmin/.

Crie um novo banco de dados com o nome tarefas.

Selecione o banco de dados tarefas, vá para a aba SQL e execute o script abaixo para criar tabela tarefa:

```bash
CREATE TABLE `tarefa` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `tipo` enum('Urgente','Pode esperar','Um dia eu faço') DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `conclusion` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

Selecione o banco de dados tarefas, vá para a aba SQL e execute o script abaixo para criar tabela user:
```bash
CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```
Pronto! Agora você pode acessar o projeto em seu navegador: http://localhost/nome-da-pasta-do-projeto/

## ⚠️ Instruções Adicionais: Problemas com a Porta do MySQL
O XAMPP utiliza a porta 3306 para o MySQL por padrão. Se ela estiver em uso, siga estes passos:

1. No painel do XAMPP, clique em Config (do MySQL) e abra o arquivo my.ini.

2. Procure por 3306 e substitua por 3307. Salve o arquivo.

3. Inicie o MySQL novamente.

Importante: Avise a aplicação sobre a mudança. No arquivo connection.php, altere a conexão:
```bash
<?php

$host = "localhost";
$dbname = "uptarefas";
$user = "root";
$pass = "";
$port = "3307"; // Adicione esta linha com a nova porta

    // Atualize a string de conexão para incluir a porta
    $conn = new PDO("mysql:dbname=$dbname;port=$port;host=$host", $user, $pass);
```
