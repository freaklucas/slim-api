<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Produto extends Model {
    //autorizando esses dados serem preenchidos/armazenados no banco p listagem
    protected $fillable = [
        'titulo', 'descricao', 'preco',
        'fabricante', 'updated_at', 'created_at'
    ];
}



?>