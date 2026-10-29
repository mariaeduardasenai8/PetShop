<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Controlo de Estoque - Pet Shop</h2>
                <a href="{{ route('produtos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">+ Novo Produto</a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Tabela de Produtos -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço Venda</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estoque Atual</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estoque Mínimo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @isset($produtos)
                            @forelse($produtos as $produto)
                                <tr class="{{ $produto->quantidade_estoque <= $produto->estoque_minimo ? 'bg-red-50' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $produto->nome }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $produto->categoria }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $produto->marca }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">R$ {{ number_format($produto->preco_venda, 2, ',', '.') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold {{ $produto->quantidade_estoque <= $produto->estoque_minimo ? 'text-red-600' : 'text-gray-900' }}">
                                        {{ $produto->quantidade_estoque }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $produto->estoque_minimo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('produtos.edit', $produto->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Nenhum produto cadastrado no momento.</td>
                                </tr>
                            @endforelse
                        @endisset
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>