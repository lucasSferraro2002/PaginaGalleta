<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial';

    protected $fillable = ['user_id', 'frase_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function frase()
    {
        return $this->belongsTo(Frase::class);
    }
}
