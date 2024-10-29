<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');
;

// Rotas de produtos
Route::prefix('produtos')->name('produtos.')->middleware('auth')->group(function () {
    Route::get('/novo', [ProdutoController::class, 'create'])->name('create');
    Route::get('/', [ProdutoController::class, 'index'])->name('index');
    Route::post('/', [ProdutoController::class, 'store'])->name('store');
    Route::get('/ver/{id}', [ProdutoController::class, 'show'])->name('show');
    Route::get('/editar/{id}', [ProdutoController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProdutoController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('destroy');
});

// Rotas de pedidos
Route::prefix('pedidos')->name('pedidos.')->group(function () {
    Route::get('/', [PedidoController::class, 'index'])->name('index');
    Route::get('/create', [PedidoController::class, 'create'])->name('create');
    Route::post('/', [PedidoController::class, 'store'])->name('store');
    Route::get('/{pedido}', [PedidoController::class, 'show'])->name('show');
    Route::get('/{pedido}/edit', [PedidoController::class, 'edit'])->name('edit');
    Route::put('/{pedido}', [PedidoController::class, 'update'])->name('update');
    Route::delete('/{pedido}', [PedidoController::class, 'destroy'])->name('destroy');
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    // Adicione aqui outras rotas que deseja proteger
});




// Rotas de página inicial
Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

// Rotas de produtos
Route::prefix('produtos')->name('produtos.')->middleware('auth')->group(function () {
    Route::get('/novo', [ProdutoController::class, 'create'])->name('create');
    Route::get('/', [ProdutoController::class, 'index'])->name('index');
    Route::post('/', [ProdutoController::class, 'store'])->name('store');
    Route::get('/ver/{id}', [ProdutoController::class, 'show'])->name('show');
    Route::get('/editar/{id}', [ProdutoController::class, 'edit'])->name('edit');
    Route::put('/{id}', [ProdutoController::class, 'update'])->name('update');
    Route::delete('/{id}', [ProdutoController::class, 'destroy'])->name('destroy');
    
});

// Rotas de pedidos
Route::prefix('pedidos')->name('pedidos.')->group(function () {
    Route::get('/', [PedidoController::class, 'index'])->name('index');
    Route::get('/create', [PedidoController::class, 'create'])->name('create');
    Route::post('/', [PedidoController::class, 'store'])->name('store');
    Route::get('/{pedido}', [PedidoController::class, 'show'])->name('show');
    Route::get('/{pedido}/edit', [PedidoController::class, 'edit'])->name('edit');
    Route::put('/{pedido}', [PedidoController::class, 'update'])->name('update');
    Route::delete('/{pedido}', [PedidoController::class, 'destroy'])->name('destroy');
    
});

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas protegidas
Route::middleware('auth')->group(function () {
    Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    // Adicione aqui outras rotas que deseja proteger
});
