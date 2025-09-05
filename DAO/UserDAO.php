<?php
require_once("models/user.php");
require_once("url.php");
include_once("models/Message.php");

class UserDAO implements UserDAOInterface
{

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function buildUser($data)
    {

        $user = new User();

        $user->id = $data["id"];
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->token = $data["token"];

        return $user;
    }
    public function create(User $user, $authUser = false)
    {

        $stmt = $this->conn->prepare("INSERT INTO user(name, email, password, token) VALUES (:name, :email, :password, :token)");

        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":token", $user->token);

        $stmt->execute();

        if ($authUser) {
            $this->setTokenSession($user->token);
        }
    }


    public function update(User $user, $redirect = true)
    {

        $stmt = $this->conn->prepare("UPDATE user SET name = :name, email = :email, password = :password, token= :token WHERE id = :id");

        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":token", $user->token);
        $stmt->bindParam(":id", $user->id);

        $stmt->execute();

        if ($redirect) {
            $this->message->setMessage("Seja bem vindo", "success", "index.php");
        }
    }


    public function setTokenSession($token, $redirect = true)
    {
        $_SESSION["token"] = $token;

        if ($redirect) {
            $this->message->setMessage("Seja bem vindo", "success", "index.php");
        }
    }


    public function authenticateUser($email, $password)
    {

        $user = $this->findByEmail($email);

        if ($user) {
            if (password_verify($password, $user->password)) {

                $token = $user->generateToken();

                $this->setTokenSession($token, false);

                $user->token = $token;

                $this->update($user, false);

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    public function findByEmail($email)
    {

        if ($email !== "") {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = :email");

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }



    public function findByToken($token)
    {
        if ($token !== "") {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE token = :token");

            $stmt->bindParam(":token", $token);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {

                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function destroyToken()
    {

        $_SESSION["token"] = "";

        $this->message->setMessage("Sucesso ao sair", "success", "auth.php");
    }



    public function verifyToken($protected = false)
    {

        if (!empty($_SESSION["token"])) {


            $token = $_SESSION["token"];

            $user = $this->findByToken($token);

            if ($user) {
                return $user;
            } else if ($protected) {
                $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
            }
        } else if ($protected) {
            $this->message->setMessage("Faça a autenticação para acessar esta página!", "error", "index.php");
        }
    }
}
