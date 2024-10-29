<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir um Produto</title>
    <!-- Link do Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-...your-integrity-hash..." crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Excluir Produto</h2>
        
        <div class="alert alert-warning" role="alert">
            <strong>Atenção!</strong> Tem certeza que deseja excluir este produto?
        </div>

        <form action="{{ route('produtos.destroy', ['produto' => $produto->id]) }}" method="POST">
            @csrf <!-- Token CSRF -->
            @method('DELETE') <!-- Especifica o método DELETE -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" id="nome" name="nome" value="{{ $produto->nome }}" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-danger">Sim, excluir</button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Scripts do Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha384-hzvD4zBO8zP66nmLXUbtgP5AONR5MTxS9AqV8DNk7q5N8xUevgiXsnXTX8vOPaN4" crossorigin="anonymous"></script>
</body>
</html>
