<?php

include_once("templates/header.php");


?>

            <main class="flex-1 p-6 overflow-y-auto">
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="bg-red-100 rounded-lg p-3 mb-6">
                        <h3 class="text-xl font-bold text-red-800 ">Adicionar uma tarefa</h3>
                    </div>

                    <form class="form-tarefa" action="tarefaProcess.php?action=create" method="post" enctype="multipart/form-data">
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nome da Tarefa</label>
                                <input type="text" name="name" id="name" placeholder="Ex: Estudar PHP" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500">
                            </div>
                            <div>
                                <label for="tipo" class="block text-sm font-medium text-gray-700">Tipo/Categoria</label>
                                <input type="text" name="tipo" id="tipo" placeholder="Ex: Estudos" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500">
                            </div>
                            <div>
                                <label for="conclusion" class="block text-sm font-medium text-gray-700">Data de Conclusão</label>
                                <input type="date" name="conclusion" id="conclusion" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-red-500 focus:border-red-500 text-gray-700">
                            </div>
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <textarea name="description" id="description" placeholder="Detalhes da tarefa..." rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-red-500 focus:border-red-500"></textarea>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end space-x-3">
                            <button type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">Cancelar</button>
                            <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Salvar Tarefa</button>
                        </div>
                    </form>
                </div>
            </main>

</body>

</html>