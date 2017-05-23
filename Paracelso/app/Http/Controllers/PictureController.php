<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
//use Intervention\Image\ImageManagerStatic as Image;
use Image;
use App\Models\prueba_imagen;
use DB;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $imagenes = prueba_imagen::all();
        return view('imagenes.LstImagenes',compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('imagenes.FrmCrearImagen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $datofoto=fopen($request->file("pic"), "r");
        // // //dd($datofoto);

        // $data= fread($datofoto,filesize($request->file("pic")));//$fotopersona;
        // // dd($data);

        // $data1 = pg_escape_bytea($data);
        //dd($data1);
//--------------------------
        $file = Input::file('pic');
        $img = file_get_contents($file);
        //$img1 = base64_encode($img);
        //dd($img);
        
        $data1 = pg_escape_bytea($img);
        //$st = Image::make($img)->stream('jpg',80);
        //dd($data1);

        $imagen = new prueba_imagen;
        $imagen->nombre = $request->get('nombre');
        $imagen->pic = $data1;
        $imagen->save();

        return redirect()->route('imagen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $imagen = prueba_imagen::FindOrFail($id);

        // $conexion=pg_connect("host=localhost port=5432 dbname=nuevo user=postgres password=samjos1977");
        // $resultado=pg_query($conexion,"SELECT * FROM paracelso.personas_imagenes WHERE id_persona=$id_persona");
        // $foto = pg_fetch_result($resultado, 'imagen');

        //$imagen= DB::table('prueba_imagen')->selectRaw('CAST(pic as bytea) as pic')->where('id',$id)->get();
        //dd($imagen->pic);

        //return response()->make($imagen->pic, 200, array('Content-Type' => (new finfo(FILEINFO_MIME))->buffer($imagen->pic)));
        //dd(pg_fetch_result($imagen->pic));


        //$imagen = prueba_imagen::FindOrFail($id);       
        //$img = base64_decode($imagen->pic1);
        
        //$foto=$imagen->pic;
        //$foto = stream_get_contents($imagen->pic);
        
        $imag = Image::make($imagen->pic)->stream('jpg',100);
        //dd($imag);

        $respuesta = Response::make($imag,200)->header('Content-Type','image/jpeg');

        ob_end_clean();
        return $respuesta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
