<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-..." crossorigin="anonymous">
    <style>
        .pedido-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .pedido-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-3px);
        }
        .pedido-info {
            font-size: 0.9em;
            color: #6c757d;
        }
        .pedido-actions a, .pedido-actions button {
            margin-right: 5px;
        }
    </style>
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
        <h1 class="mb-4">Lista de Pedidos</h1>
        <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-3">Novo Pedido</a>

        @if (session('success'))
        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="row">
            @foreach ($pedidos as $pedido)
            <div class="col-md-4">
                <div class="pedido-card">
                    <h5 class="card-title">{{ $pedido->cliente }}</h5>
                    <p class="pedido-info">Produto: {{ $pedido->produto }}</p>
                    <p class="pedido-info">Quantidade: {{ $pedido->quantidade }}</p>
                    <p class="pedido-info">Preço: R$ {{ number_format($pedido->preco, 2, ',', '.') }}</p>
                    <div class="pedido-actions mt-3">
                        <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                var bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>

</html>
