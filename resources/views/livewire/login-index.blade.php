<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm p-4">
                <div class="text-center mb-4">
                    <h3>🐾 Pet Shop</h3>
                    <p class="text-muted">Gestão de Estoque - Faça login</p>
                </div>

                <form action="{{ route('produtos.index') }}" method="GET">
    <div class="mb-3">
        <label class="form-label">E-mail</label>
        <input type="email" class="form-control" placeholder="admin@petshop.com" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" class="form-control" placeholder="••••••••" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Entrar no Sistema</button>
</form>
            </div>
        </div>
    </div>
</div>