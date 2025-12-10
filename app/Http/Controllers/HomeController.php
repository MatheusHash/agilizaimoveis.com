<?php



namespace App\Http\Controllers;



use App\Models\Empreendimento;
use App\Models\HomepageSlider;
use Illuminate\Http\Request;

use App\Http\Requests\FiltroBuscaRequest;



use App\Models\Cidade;

use App\Models\Municipio;

use App\Models\Bairro;



use App\Models\Categoria;

use App\Models\Galeria;

use App\Models\Imovel;

use App\Models\Post;



class HomeController extends Controller
{

    public function temporario()
    {

        return view('temporario');

    }



    public function index()
    {

        $cidades = Municipio::orderBy('nome', 'asc')->get();

        $bairros = Bairro::orderBy('nome', 'asc')->get();

        $categorias = Categoria::all();

        $publicacao = Post::find(1);

        $empreendimentos = Empreendimento::orderBy('id', 'desc')->get();

        $sliderImages = HomepageSlider::orderBy('order')->get();
        $paths = [];
        foreach ($sliderImages as $key => $sliderImage) {
            $paths[$key] = $sliderImage['path'];
        }

        return view('welcome', ['sliderImagesPathName' => $paths, 'empreendimentos' => $empreendimentos, 'cidades' => $cidades, 'bairros' => $bairros, 'categorias' => $categorias, 'publicacao' => $publicacao]);

    }



    public function alugar()
    {

        $imoveis = Imovel::where('motivo', 1)

            ->where('visibility', 1)

            ->orWhere(function ($query) {

                $query->where('motivo', 3);

            })

            ->with('galeria')

            ->with('fotoPrincipal')

            ->with('bairro')

            ->paginate(15);

        $municipios = Municipio::orderBy('nome', 'asc')->get();

        $categorias = Categoria::all();



        return view('imoveis.index', ['motivo' => 1, 'imoveis' => $imoveis, 'municipios' => $municipios, 'categorias' => $categorias, 'parameters' => []]);

    }



    public function filtrar_imoveis(FiltroBuscaRequest $request)
    {



        if ($request->codigo) {

            return redirect()->route('imovel', $request->codigo);

        }



        $motivo = $request->motivo;

        $categoria = $request->categoria;

        $cidade = $request->cidade;

        $bairro = $request->bairro;

        $preco_min = strstr(str_replace('.', '', $request->preco_min), ',', true);

        $preco_max = strstr(str_replace('.', '', $request->preco_max), ',', true);

        $quarto = $request->quarto;

        $banheiro = $request->banheiro;

        $garagem = $request->garagem;

        $imoveis = Imovel::where('visibility', 1)

            ->where(

                function ($query) use ($motivo) {

                    if ($motivo) {

                        $query->where('motivo', $motivo);

                    }

                }

            )

            ->where(

                function ($query) use ($categoria) {

                    if ($categoria) {

                        if ($categoria == 2) {

                            # Se for buscar por Casa, também buscar por casas de alto padrão 
        
                            $query->where('categoria_id', $categoria)->orWhere('categoria_id', 3);

                        } else {

                            $query->where('categoria_id', $categoria);

                        }

                    }

                }

            )

            ->where(

                function ($query) use ($cidade) {

                    if ($cidade) {

                        $query->where('municipio_id', $cidade);

                    }

                }

            )

            ->where(

                function ($query) use ($bairro) {

                    if ($bairro) {

                        $query->where('bairro_id', $bairro);

                    }

                }

            )

            ->where(function ($query) use ($preco_min) {

                if ($preco_min) {

                    $query->where('valor', '>=', $preco_min);

                }

            })

            ->where(function ($query) use ($preco_max) {

                if ($preco_max) {

                    $query->where('valor', '<=', $preco_max);

                }

            })

            ->where(function ($query) use ($quarto) {

                if ($quarto) {

                    $query->where('quarto', '>=', $quarto);

                }

            })

            ->where(function ($query) use ($banheiro) {

                if ($banheiro) {

                    $query->where('banheiro', '>=', $banheiro);

                }

            })

            ->where(function ($query) use ($garagem) {

                if ($garagem) {

                    $query->where('garagem', '>=', $garagem);

                }

            })

            ->with('galeria')

            ->with('fotoPrincipal')

            ->paginate(15);



        $municipios = Municipio::orderBy('nome', 'asc')->get(['nome', 'id']);

        $categorias = Categoria::all();



        // $queryParams = $request->query();

        // $parameters = null;

        // foreach ($queryParams as $key => $param) {

        //     $param ? $parameters["$key"] = $param : null;

        // }



        return view('imoveis.index')->with(['motivo' => $request->motivo, 'imoveis' => $imoveis, 'municipios' => $municipios, 'categorias' => $categorias, 'parameters' => $request->query()]);

    }



    public function comprar()
    {

        $imoveis = Imovel::where('motivo', 2)

            ->where('visibility', 1)

            ->orWhere(function ($query) {

                $query->where('motivo', 3);

            })

            ->with('galeria')

            ->with('fotoPrincipal')

            ->with('bairro')

            ->paginate(15);

        $municipios = Municipio::orderBy('nome', 'asc')->get();

        $categorias = Categoria::all();



        return view('imoveis.index', ['motivo' => 2, 'imoveis' => $imoveis, 'municipios' => $municipios, 'categorias' => $categorias, 'parameters' => []]);

    }



    public function ordenaMaiorPreco($motivo)
    {

        $imoveis = Imovel::where('motivo', $motivo)->where('visibility', 1)

            ->orderBy('valor', 'desc')

            ->get();



        $cidades = Cidade::where('isCidade', 1)->orderBy('nome', 'asc')->get();

        $bairros = Cidade::where('isCidade', null)->orderBy('nome', 'asc')->get();

        $categorias = Categoria::all();



        return view('imoveis.index', ['motivo' => $motivo, 'imoveis' => $imoveis, 'cidades' => $cidades, 'bairros' => $bairros, 'categorias' => $categorias]);

    }



    public function ordenaMenorPreco($motivo)
    {

        $imoveis = Imovel::where('motivo', $motivo)->where('visibility', 1)

            ->orWhere(function ($query) {

                $query->where('motivo', 3);

            })

            ->orderBy('valor')

            ->get();



        $cidades = Cidade::where('isCidade', 1)->orderBy('nome', 'asc')->get();

        $bairros = Cidade::where('isCidade', null)->orderBy('nome', 'asc')->get();

        $categorias = Categoria::all();

        // return redirect()->route('imovel',$request->codigo);



        return view('imoveis.index', ['motivo' => $motivo, 'imoveis' => $imoveis, 'cidades' => $cidades, 'bairros' => $bairros, 'categorias' => $categorias]);

    }



    public function imoveisFiltradosForm2(FiltroBuscaRequest $request)
    {

        if ($request->codigo) {

            return redirect()->route('imovel', $request->codigo);

        }

        // dd($request->all());



        $bairro = $request->bairro;

        $motivo = $request->motivo;

        $preco_min = strstr(str_replace('.', '', $request->preco_min), ',', true);

        $preco_max = strstr(str_replace('.', '', $request->preco_max), ',', true);

        $quarto = $request->quarto;

        $banheiro = $request->banheiro;

        $garagem = $request->garagem;



        if ($request->motivo) {



            $imoveis = Imovel::where('visibility', 1)

                ->where('motivo', $request->motivo)

                ->where(function ($query) use ($preco_min) {

                    if ($preco_min) {

                        $query->where('valor', '>=', $preco_min);

                    }

                })

                ->where(function ($query) use ($preco_max) {

                    if ($preco_max) {

                        $query->where('valor', '<=', $preco_max);

                    }

                })

                ->where(function ($query) use ($quarto) {

                    if ($quarto) {

                        $query->where('quarto', '>=', $quarto);

                    }

                })

                ->where(function ($query) use ($banheiro) {

                    if ($banheiro) {

                        $query->where('banheiro', '>=', $banheiro);

                    }

                })

                ->where(function ($query) use ($garagem) {

                    if ($garagem) {

                        $query->where('garagem', '>=', $garagem);

                    }

                })->get();

        }

        // dd($imoveis);

        $cidades = Cidade::where('isCidade', 1)->orderBy('nome', 'asc')->get();

        $bairros = Cidade::where('isCidade', null)->orderBy('nome', 'asc')->get();

        return view('imoveis.index', ['motivo' => $request->motivo, 'imoveis' => $imoveis, 'cidades' => $cidades, 'bairros' => $bairros,]);

    }



    public function imoveisFiltradosPelaHome(FiltroBuscaRequest $request)
    {



        if ($request->codigo) {

            return redirect()->route('imovel', $request->codigo);

        }



        $categoria = $request->categoria;

        $municipio = $request->cidade;

        $bairro = $request->bairro;



        if ($request->motivo) {

            $imoveis = Imovel::where('visibility', 1)

                ->where('motivo', $request->motivo)

                ->where(function ($query) use ($categoria) {

                    if ($categoria) {

                        $query->where('categoria_id', $categoria);

                    }

                })

                ->where(function ($query) use ($municipio) {

                    if ($municipio) {

                        $query->where('municipio_id', $municipio);

                    }

                })

                ->where(function ($query) use ($bairro) {

                    if ($bairro != 'todosBairros') {

                        $query->where('bairro_id', $bairro);

                    }

                })

                ->get();

        }



        $municipios = Municipio::all(['nome', 'id']);



        $cidades = Cidade::where('isCidade', 1)->orderBy('nome', 'asc')->get();

        $bairros = Cidade::where('isCidade', null)->orderBy('nome', 'asc')->get();

        $categorias = Categoria::all();

        return view('imoveis.index', ['motivo' => $request->motivo, 'imoveis' => $imoveis, 'cidades' => $cidades, 'municipios' => $municipios, 'bairros' => $bairros, 'categorias' => $categorias]);

    }



    public function imovel($id)
    {

        $imovel = Imovel::where('id', $id)->where('visibility', 1)->first();

        if ($imovel) {

            $imagens = Galeria::all()->where('imovel_id', $id);

            $cidade = Cidade::all()->where('id', $imovel->cidade_id);

            return view('imovel.index', ['imovel' => $imovel, 'imagens' => $imagens, 'cidades' => $cidade]);

        } else {

            return back();

        }

        return back();

    }



    public function lancamentos()
    {

        $imoveis = Imovel::where('visibility', 1)

            ->where('lancamento', 1)

            ->with('galeria')

            ->with('fotoPrincipal')

            ->with('bairro')

            ->get();



        // dd($imoveis);

        if ($imoveis) {

            // dd($imoveis);

            return view('lancamentos.index', ['imoveis' => $imoveis]);

        }

        return view('lancamentos.index', ['imoveis' => []]);

    }

}

