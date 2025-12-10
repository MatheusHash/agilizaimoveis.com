<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empreendimento;
use Illuminate\Support\Facades\Storage;

class EmpreendimentoController extends Controller
{
    /**
     * Lista todos os empreendimentos
     */
    public function index()
    {
        $empreendimentos = Empreendimento::orderBy('created_at', 'desc')->get();
        return response()->json($empreendimentos);
    }

    /**
     * Cadastra um novo empreendimento
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'imagem' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096'
        ]);

        $path = 'imgs/homepage/empreendimentos/';
        $nameImage = uniqid() . '.' . $request->imagem->extension();
        if ($request->has('imagem') && $request->imagem->isValid()) {
            $imagem = $request->imagem;
            $imagem->move($path, $nameImage);
        }
        $pathname = $path . $nameImage;
        Empreendimento::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'imagem_capa_path' => $pathname,
        ]);
        return redirect()->back()->with('success', 'Empreendimento excluído com sucesso!');

    }

    /**
     * Remove um empreendimento
     */
    public function destroy($id)
    {
        $empreendimento = Empreendimento::findOrFail($id);
        // dd($id, $empreendimento);

        // Caminho da imagem salva
        $filePath = public_path($empreendimento->imagem_capa_path);

        // Se a imagem existir no servidor, apagar
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Exclui o registro do banco
        $empreendimento->delete();

        return redirect()->back()->with('success', 'Empreendimento excluído com sucesso!');
    }

}
