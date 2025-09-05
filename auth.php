<?php

    require_once("templates/header.php")


?>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

        
        
        <!-- Container Principal com Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Card de Login -->
            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="bg-red-100 rounded-lg p-3 mb-6">
                    <h3 class="text-xl font-bold text-red-800 text-center">Entrar</h3>
                </div>
                <form action="<?= $BASE_URL ?>authProcess.php" method="POST">
                    <input type="hidden" name="type" value="login">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">E-mail:</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" id="email" name="email" placeholder="Digite seu e-mail">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Senha:</label>
                        <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" id="password" name="password" placeholder="Digite sua senha" >
                    </div>
                    <input type="submit" class="w-full bg-red-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-800 transition-colors cursor-pointer" value="Entrar">
                </form>
            </div>

            <!-- Card de Cadastro -->
            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="bg-red-100 rounded-lg p-3 mb-6">
                    <h3 class="text-xl font-bold text-red-800 text-center">Cadastrar</h3>
                </div>
                <form action="<?= $BASE_URL ?>authProcess.php" method="POST">
                    <input type="hidden" name="type" value="register">
                     <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nome:</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" id="name" name="name" placeholder="Digite seu nome">
                    </div>
                    <div class="mb-4">
                        <label for="email_register" class="block text-gray-700 font-medium mb-2">E-mail:</label>
                        <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" id="email_register" name="email" placeholder="Digite seu e-mail">
                    </div>
                    <div class="mb-4">
                        <label for="password_register" class="block text-gray-700 font-medium mb-2">Senha:</label>
                        <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" id="password_register" name="password" placeholder="Digite sua senha">
                    </div>
                    <div class="mb-6">
                        <label for="confirmpassword" class="block text-gray-700 font-medium mb-2">Confirmar senha:</label>
                        <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500" id="confirmpassword" name="confirmpassword" placeholder="Confirme sua senha" >
                    </div>
                    <input type="submit" class="w-full bg-red-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-800 transition-colors cursor-pointer" value="Registrar">
                </form>
            </div>

        </div>
    </div>

</body>
</html>

