<?php

// app/Models/Pedido.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Definindo os campos que podem ser atribuídos em massa
    protected $fillable = [
        'cliente',
        'produto',
        'quantidade',
        'preco',
    ];
}
