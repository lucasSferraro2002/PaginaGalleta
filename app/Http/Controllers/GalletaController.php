<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frase;
use App\Models\Historial;

class GalletaController extends Controller
{
    public function mostrar()
    {
        return view('galleta/galleta');
    }

    public function obtenerMensaje()
    {
        $fraseAleatoria = Frase::inRandomOrder()->first();

        if (!$fraseAleatoria) {
            return response()->json(['mensaje' => 'No hay frases disponibles'], 404);
        }

        if (auth()->check()) {
            Historial::create([
                'user_id' => auth()->id(),
                'frase_id' => $fraseAleatoria->id
            ]);
        }

        return response()->json([
            'mensaje' => $fraseAleatoria->mensaje
        ]);
    }
}
