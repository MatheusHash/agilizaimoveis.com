<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use App\Models\Empreendimento;
use App\Models\HomepageSlider;
use Illuminate\Http\Request;

use App\Models\Post;



class HomePageController extends Controller
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

        } catch (\Exception $e) {
            return redirect()->to('/admin/posts/')->with('error', 'FALHA ao ao salvar novo POST!');
        }
    }


    public function page()
    {
        $sliderImages = HomepageSlider::orderBy('order')->get();
        $empreendimentos = Empreendimento::orderBy('id', 'desc')->get();
        return view('admin/homepage/index', ['images' => $sliderImages, 'empreendimentos' => $empreendimentos]);
    }

}

