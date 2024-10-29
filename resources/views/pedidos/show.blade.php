<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detalhes do Pedido</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>Cliente:</strong> {{ $pedido->cliente }}</p>
                <p><strong>Produto:</strong> {{ $pedido->produto }}</p>
                <p><strong>Quantidade:</strong> {{ $pedido->quantidade }}</p>
                <p><strong>Preço:</strong> R$ {{ number_format($pedido->preco, 2, ',', '.') }}</p>

                <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Voltar</a>
                <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts do Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous"></script>
</body>
</html>
