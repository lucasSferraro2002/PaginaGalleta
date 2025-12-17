<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historial;

class HistorialController extends Controller
{
    public function index()
    {
        $historial = Historial::where('user_id', auth()->id())
            ->with('frase')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('historial', compact('historial'));
    }
}
