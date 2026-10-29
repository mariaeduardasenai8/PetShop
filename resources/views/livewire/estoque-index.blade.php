<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Formulário para Registar Nova Movimentação -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Registar Entrada ou Saída de Estoque</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('estoque.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Selecionar Produto -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Produto</label>
                        <select name="produto_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2">
                            <option value="">Selecione o produto...</option>
                            @isset($produtos)
                                @foreach($produtos as $produto)
                                    <option value="{{ $produto->id }}">{{ $produto->nome }} (Estoque atual: {{ $produto->quantidade_estoque }})</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <!-- Tipo de Operação -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tipo de Operação</label>
                        <select name="tipo_operacao" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2">
                            <option value="ENTRADA">Entrada (Compra/Reposição)</option>
                            <option value="SAIDA">Saída (Venda/Baixa)</option>
                        </select>
                    </div>

                    <!-- Quantidade -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Quantidade</label>
                        <input type="number" name="quantidade" min="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2">
                    </div>

                    <!-- Observação -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Observação (Opcional)</label>
                        <input type="text" name="observacao" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border p-2" placeholder="Ex: Venda balcão / Lote novo">
                    </div>
                </div>

                <div class="mt-4 flex justify-end">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Registar Movimentação</button>
                </div>
            </form>
        </div>

        <!-- Tabela com o Histórico de Movimentações -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-xl font-bold text-gray-800 mb-4">Histórico de Movimentações</h3>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data / Hora</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Operação</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantidade</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observação</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @isset($movimentacoes)
                            @forelse($movimentacoes as $mov)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mov->produto->nome ?? 'Produto Removido' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold {{ $mov->tipo_operacao === 'ENTRADA' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $mov->tipo_operacao }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $mov->quantidade }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $mov->observacao ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Nenhuma movimentação registada até o momento.</td>
                                </tr>
                            @endforelse
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>