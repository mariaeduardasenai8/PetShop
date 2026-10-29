<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Cadastrar Novo Produto</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('produtos.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nome -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nome do Produto</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Marca -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Marca</label>
                        <input type="text" name="marca" value="{{ old('marca') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Categoria (Ex: Ração, Brinquedo, Remédio)</label>
                        <input type="text" name="categoria" value="{{ old('categoria') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Preço de Custo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preço de Custo (R$)</label>
                        <input type="number" step="0.01" name="preco_custo" value="{{ old('preco_custo') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Preço de Venda -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preço de Venda (R$)</label>
                        <input type="number" step="0.01" name="preco_venda" value="{{ old('preco_venda') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Quantidade em Estoque -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Quantidade Inicial em Estoque</label>
                        <input type="number" name="quantidade_estoque" value="{{ old('quantidade_estoque', 0) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Estoque Mínimo -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Estoque Mínimo (Alerta)</label>
                        <input type="number" name="estoque_minimo" value="{{ old('estoque_minimo', 5) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>

                    <!-- Data de Validade -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Data de Validade (Opcional)</label>
                        <input type="date" name="data_validade" value="{{ old('data_validade') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">
                    </div>
                </div>

                <!-- Descrição -->
                <div class="mt-6">
                    <label class="block text-sm font-medium text-gray-700">Descrição / Detalhes</label>
                    <textarea name="descricao" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 border p-2">{{ old('descricao') }}</textarea>
                </div>

                <!-- Botões -->
                <div class="mt-6 flex items-center justify-end">
                    <a href="{{ route('dashboard') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md mr-2 hover:bg-gray-400">Cancelar</a>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">Salvar Produto</button>
                </div>
            </form>
        </div>
    </div>
</div>