<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageSlider;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HomepageSliderController extends Controller
{
    public function index()
    {
        $images = HomepageSlider::orderBy('order')->get();
        return view('Admin/HomepageSlider/Index', [
            'images' => $images
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
            'order' => 'nullable|integer',
        ]);
        $path = 'imgs/homepage/slider/';
        $nameImage = uniqid() . '.' . $request->image->extension();
        if ($request->has('image') && $request->image->isValid()) {
            $image = $request->image;
            $image->move($path, $nameImage);
        }
        $pathname = $path . $nameImage;
        HomepageSlider::create([
            'path' => $pathname,
            'order' => $request->input('order', 0),
        ]);
        HomepageSlider::reorder();
        $image = HomepageSlider::where('path', $pathname)->first();
        return response()->json(['image' => $image, 'success' => 'Imagem inserida com sucesso!'], 200, ['headers' => 'noneheader']);
    }


    public function destroy($id)
    {
        $sliderItem = HomepageSlider::findOrFail($id);
        $filePath = public_path($sliderItem->path);

        if (file_exists($filePath)) {
            unlink($filePath);
            $sliderItem->delete();
            HomepageSlider::reorder();
            return response()->json(['success' => 'Imagem deletada!'], 200, ['success' => 'Imagem removida com sucesso!']);
        }

        return response()->json(['fail' => 'Falha ao deletar imagem!'], 500);
    }
}
