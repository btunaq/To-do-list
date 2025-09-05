<?php 

require_once("templates/header.php");
require_once("DAO/UserDAO.php");

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(true);


?>


<div>
    <h1>edicao</h1>
</div>