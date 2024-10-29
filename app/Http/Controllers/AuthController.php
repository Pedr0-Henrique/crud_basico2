<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Exibe o formulário de registro
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Processa o registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Cria o usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Redireciona para a página de login com uma mensagem de sucesso
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }
    

    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o login
   // app/Http/Controllers/AuthController.php

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        // Redireciona para a lista de produtos em vez da home
        return redirect()->route('produtos.index')->with('success', 'Login realizado com sucesso!');
    }

    return back()->withErrors(['email' => 'Credenciais inválidas.']);
}


    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout realizado com sucesso!');
    }
    // Exibe o formulário de recuperação de senha
public function showLinkRequestForm()
{
    return view('auth.password');
}

// Envia o link de recuperação de senha


}

