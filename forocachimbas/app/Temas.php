<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temas extends Model
{
    protected $fillable = [
        'id', 'tema','texto','usuario_id','like','numero_comentarios'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}