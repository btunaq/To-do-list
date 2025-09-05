<?php

include_once("templates/header.php");
include_once("templates/aside.php");

?>

<main class="flex-1 p-20 bg-gray-50">
  <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
      
      <!-- Cabeçalho do Formulário -->
      <div class="flex items-center border-b border-gray-200 pb-4 mb-8">
          <!-- Ícone -->
          <div class="bg-red-100 rounded-lg p-3 mr-4">
              <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
          </div>
          <h3 class="text-2xl font-bold text-gray-800">Adicionar uma nova tarefa</h3>
      </div>

      <form action="tarefaProcess.php" method="post">
          <!-- Campo Oculto para a Ação -->
          <input type="hidden" name="action" value="create">

          <!-- Grid para os campos do formulário -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

              <!-- Nome da Tarefa -->
              <div class="md:col-span-2">
                  <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nome da Tarefa</label>
                  <input type="text" name="name" id="name" placeholder="Ex: Criar a nova página de perfil" 
                         class="block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
              </div>

              <!-- Tipo de Tarefa -->
              <div>
                  <label for="tipo" class="block text-sm font-medium text-gray-700 mb-1">Prioridade:</label>
                  <select id="tipo" name="tipo" 
                          class="block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                      <option value="Urgente">Urgente</option>
                      <option value="Pode esperar">Pode esperar</option>
                      <option value="Um dia eu faço">Um dia eu faço</option>
                  </select>
              </div>
              
              <!-- Data de Conclusão -->
              <div>
                  <label for="conclusion" class="block text-sm font-medium text-gray-700 mb-1">Data de Conclusão</label>
                  <input type="date" name="conclusion" id="conclusion" 
                         class="block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
              </div>

              <!-- Descrição -->
              <div class="md:col-span-2">
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                  <textarea name="description" id="description" placeholder="Adicione mais detalhes sobre o que precisa ser feito..." rows="4" 
                            class="block w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition"></textarea>
              </div>

          </div>

          <!-- Botões de Ação -->
          <div class="mt-8 flex justify-end space-x-4">
              <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 transition-all duration-300">
                  Cancelar
              </button>
              <button type="submit" class="px-6 py-2 bg-red-700 text-white rounded-lg hover:bg-red-800 font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-sm transition-all duration-300">
                  Salvar Tarefa
              </button>
          </div>
      </form>
  </div>
</main>



</body>

</html>