<?php



namespace App\Http\Controllers\admin;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Galeria;

use Illuminate\Support\Facades\Storage;





class GaleriaController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index($id)

    {

        $galeria = Galeria::all()->where('imovel_id', $id);

        return view('admin/galeria/galeria', ['imagens' => $galeria, 'imovel' => $id]);
    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        if ($request->imagens) {

            $dataForm = $request->all();

            $path = 'uploads/' . $dataForm['imovel'];

            foreach ($dataForm['imagens'] as $key => $file) {

                $image = $file;

                $nameImage = uniqid(date('Ymdhis' . $key)) . '.' . $image->getClientOriginalExtension();



                //=> path = 'public/uploads/{id}/IMAGE'

                $image->move($path, $nameImage);

                // $image->storeAs($path, $nameImage);



                $galeria = new Galeria();

                $galeria->imovel();

                $galeria->path = $path . "/" . $nameImage;

                $galeria->imovel_id = $dataForm['imovel'];

                $galeria->principal = 0;

                $galeria->save();

                unset($galeria); // esvaziar a var

            }

            // dd($request->all());

        }

        return back();
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function novaImagemCapa(Request $request, $idImovel)

    {

        $dataForm = $request->all();

        // dd($dataForm);



        $atual = Galeria::where([['imovel_id', $dataForm['idImovel']], ['principal', 1]]);

        $atual->update(['principal' => 0]);



        $novaCapa = Galeria::where('id', $dataForm['idImagem']);

        $novaCapa->update(['principal' => 1]);

        return back();
    }



    public function destroy($id)
     {
         $imagem = Galeria::findOrFail($id);

         // Caminho absoluto correto em produção
         $filePath = base_path('public_html/' . $imagem->path);
         // para ambiente dev
         if (app()->environment('dev')) {
             $filePath = public_path($imagem->path);
         }
         // dd($filePath );
         if (file_exists($filePath)) {
             unlink($filePath);
         }

         $imagem->delete();

         return back();
     }
}
