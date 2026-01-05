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
        $file = $request->image;
        $path = 'imgs/homepage/slider/';
        if ($request->has('image') && $file->isValid()) {
            $nameImage = uniqid() . '.' . $file->getClientOriginalExtension();
            $image = $file;
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

        if (Storage::disk('public')->exists($sliderItem->path)) {
            Storage::disk('public')->delete($sliderItem->path);
        }
        $sliderItem->delete();
        HomepageSlider::reorder();

        return response()->json([
            'success' => 'Imagem removida com sucesso!'
        ]);
    }
}
