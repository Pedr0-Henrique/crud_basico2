<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous">
    <title>Criar Novo Pedido</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pedidos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('pedidos.index') }}">Listar Pedidos</a></li>
                            <li><a class="dropdown-item" href="{{ route('pedidos.create') }}">Criar Pedido</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
                            <li><a class="dropdown-item" href="{{ route('produtos.index') }}">Listar Produtos</a></li>
                            <li><a class="dropdown-item" href="{{ route('produtos.create') }}">Adicionar Produto</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Criar Novo Pedido</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Verifique os campos abaixo:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <form action="{{ route('pedidos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="cliente" class="form-label">Cliente:</label>
        <input type="text" class="form-control" id="cliente" name="cliente" value="{{ old('cliente') }}" required>
    </div>
    <div class="mb-3">
        <label for="produto" class="form-label">Produto:</label>
        <select class="form-select" id="produto" name="produto" required>
            <option value="">Selecione um produto</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->nome }}">{{ $produto->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="quantidade" class="form-label">Quantidade:</label>
        <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required>
    </div>
    <div class="mb-3">
        <label for="preco" class="form-label">Preço:</label>
        <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="{{ old('preco') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Criar Pedido</button>
    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Voltar</a>
</form>       
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous"></script>
</body>
</html>
