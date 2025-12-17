<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Frase;
use App\Models\User;
use App\Models\Historial;
use Illuminate\Http\Request;

class FortuneController extends Controller
{
    public function index()
    {
        $frases = Frase::all();
        return response()->json($frases);
    }

    public function random()
    {
        $frase = Frase::inRandomOrder()->first();

        if (!$frase) {
            return response()->json(['error' => 'No hay frases disponibles'], 404);
        }

        if (auth()->check()) {
            Historial::create([
                'user_id' => auth()->id(),
                'frase_id' => $frase->id
            ]);
        }

        return response()->json([
            'id' => $frase->id,
            'mensaje' => $frase->mensaje,
            'created_at' => $frase->created_at
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string|max:500'
        ]);

        $frase = Frase::create([
            'mensaje' => $request->mensaje
        ]);

        return response()->json($frase, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mensaje' => 'required|string|max:500'
        ]);

        $frase = Frase::findOrFail($id);
        $frase->update([
            'mensaje' => $request->mensaje
        ]);

        return response()->json($frase);
    }

    public function destroy($id)
    {
        $frase = Frase::findOrFail($id);
        $frase->delete();

        return response()->json(['message' => 'Frase eliminada'], 200);
    }

    public function stats()
    {
        $totalMensajes = Historial::count();
        $totalUsuarios = User::where('role', 'usuario')->count();

        $top5Mensajes = Historial::select('frase_id')
            ->selectRaw('count(*) as total')
            ->groupBy('frase_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->with('frase')
            ->get()
            ->map(function($item) {
                return [
                    'id' => $item->frase->id,
                    'mensaje' => $item->frase->mensaje,
                    'vistas' => $item->total
                ];
            });

        return response()->json([
            'total_mensajes_mostrados' => $totalMensajes,
            'total_usuarios' => $totalUsuarios,
            'top_5_mensajes' => $top5Mensajes
        ]);
    }
}
