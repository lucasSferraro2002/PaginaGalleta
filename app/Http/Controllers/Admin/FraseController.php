<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frase;
use App\Models\User;
use App\Models\Historial;
use Illuminate\Http\Request;

class FraseController extends Controller
{
    public function index()
    {
        $frases = Frase::orderBy('id', 'asc')->get();
        return view('admin.frases.index', compact('frases'));
    }

    public function estadisticas()
    {
        $totalFrases = Frase::count();
        $totalUsuarios = User::where('role', 'usuario')->count();
        $totalVistas = Historial::count();

        $top5Frases = Historial::select('frase_id')
            ->selectRaw('count(*) as total')
            ->groupBy('frase_id')
            ->orderBy('total', 'desc')
            ->limit(5)
            ->with('frase')
            ->get();

        $usuarioMasActivo = Historial::select('user_id')
            ->selectRaw('count(*) as total')
            ->groupBy('user_id')
            ->orderBy('total', 'desc')
            ->with('user')
            ->first();

        return view('admin.estadisticas', compact('totalFrases', 'totalUsuarios', 'totalVistas', 'top5Frases', 'usuarioMasActivo'));
    }

    public function historialGlobal()
    {
        $historial = Historial::with(['user', 'frase'])
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('admin.historial-global', compact('historial'));
    }

    public function create()
    {
        return view('admin.frases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => 'required|string|max:500'
        ]);

        Frase::create([
            'mensaje' => $request->mensaje
        ]);

        return redirect()->route('admin.frases.index')->with('success', 'Frase creada');
    }

    public function edit($id)
    {
        $frase = Frase::findOrFail($id);
        return view('admin.frases.edit', compact('frase'));
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

        return redirect()->route('admin.frases.index')->with('success', 'Frase actualizada');
    }

    public function destroy($id)
    {
        $frase = Frase::findOrFail($id);
        $frase->delete();

        return redirect()->route('admin.frases.index')->with('success', 'Frase eliminada');
    }
}
