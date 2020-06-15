<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    protected $fillable = [
        'id','texto','like','usuario_id','tema_id'
    ];
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function tema()
    {
        return $this->belongsTo(Temas::class);
    }
}