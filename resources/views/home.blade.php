<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Página Inicial</title>
    <style>
        body {
            background: linear-gradient(to right, #007bff, #6610f2);
            color: white;
        }

        .hero {
            padding: 60px 30px;
            border-radius: 8px;
            margin-bottom: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            background-color: #333;
            color: white;
        }

        .card img {
            border-radius: 8px 8px 0 0;
        }

        .btn-light {
            background-color: #f8f9fa;
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
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Pedidos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('pedidos.index') }}">Listar Pedidos</a></li>
                            <li><a class="dropdown-item" href="{{ route('pedidos.create') }}">Criar Pedido</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProducts" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Produtos
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
                            <li><a class="dropdown-item" href="{{ route('produtos.index') }}">Listar Produtos</a></li>
                            <li><a class="dropdown-item" href="{{ route('produtos.create') }}">Adicionar Produto</a></li>
                        </ul>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                    </form>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Cadastro</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <div class="hero text-center mb-5">
            <h1 class="display-4">Bem-vindo à Nossa Aplicação</h1>
            <p class="lead">Sua experiência começa aqui! Navegue e aproveite os nossos serviços.</p>
            <a href="{{ route('login') }}" class="btn btn-light btn-lg">Começar Agora</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
