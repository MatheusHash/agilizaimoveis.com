<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empreendimento extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem_capa_path',
    ];
}
