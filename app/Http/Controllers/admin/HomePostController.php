<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomePostController extends Controller
{
    public function index()
    {
        return view('admin/posts/index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'content' => 'required',
        ]);

        try {
            $path = 'imgs/post/';
            $nameImage = 'AGILIZAIMOVEIS_POST.jpg';

            if ($request->has('image') && $request->image->isValid()) {
                $image = $request->image;
                $image->move($path, $nameImage);
            }
            Post::updateOrCreate(['id' => 1], ['title' => $request->titulo, 'content' => $request->content, 'image' => $path . $nameImage, 'linkPost' => $request->linkPost]);
            return redirect()->to('/admin/posts/')->with('success', 'sucesso ao salvar novo POST!');
            // dd($e);
        } catch (\Exception $e) {
            return redirect()->to('/admin/posts/')->with('error', 'FALHA ao ao salvar novo POST!');
        }
    }
}
