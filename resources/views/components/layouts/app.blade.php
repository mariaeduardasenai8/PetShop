<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop - Gestão de Estoque</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-light">

    <!-- Menu de Navegação Superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">🐾 Pet Shop System</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('produtos.index') }}">Produtos</a>
                <a class="nav-link" href="{{ route('produtos.create') }}">Novo Produto</a>
            </div>
        </div>
    </nav>

    <main class="container">
        {{ $slot }}
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
</body>
</html>