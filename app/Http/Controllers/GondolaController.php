<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionGondola;
use Illuminate\Http\Request;
use App\Models\Gondola;
use App\Models\Flete;
use Illuminate\Support\Facades\Storage;

class GondolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gondola = Gondola::orderBy('id')->get();
        return view('gondola.index', compact('gondola'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //
        return view('gondola.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionGondola $request)
    {
        //
        if ($foto = Gondola::setGondoladocs($request->foto_up))
            $request->request->add(['foto' => $foto]);
        if ($licencia = Gondola::setGondoladocs($request->foto_up_licencia))
            $request->request->add(['licencia' => $licencia]);
        if ($seguro = Gondola::setGondoladocs($request->foto_up_seguro))
            $request->request->add(['seguro' => $seguro]);
        Gondola::create($request->all());
        return redirect()->route('gondola')->with('mensaje', 'La gondola se creo correctamente');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ver(Request $request, Gondola $gondola)
    {
        //
        if ($request->ajax()) {
            return view('gondola.ver', compact('gondola'));
        } else {
            abort(404);
        }
    }

    // public function obtenerDatos($placas_truck)
    // {
    //     //
    //     return Gondola::where('placas_truck', $placas_truck) -> get();
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
        $gondola = Gondola::findOrFail($id);
        return view('gondola.editar', compact('gondola'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidacionGondola $request, $id)
    {
        //
        $gondola = Gondola::findOrFail($id);
        if ($foto = Gondola::setGondoladocs($request->foto_up, $gondola->foto))
            $request->request->add(['foto' => $foto]);
        if ($licencia = Gondola::setGondoladocs($request->foto_up_licencia, $gondola->licencia))
            $request->request->add(['licencia' => $licencia]);
        if ($seguro = Gondola::setGondoladocs($request->foto_up_seguro, $gondola->seguro))
            $request->request->add(['seguro' => $seguro]);
        $gondola->update($request->all());
        return redirect()->route('gondola')->with('mensaje', 'La gondola se actualizó correctamente');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Request $request, $id)
    {
        //
         $modelCollection = Flete::where('gondola_id', $id)->get();
        if(!$modelCollection->isEmpty()) {
            return redirect()->route('gondola')->with('mensaje', 'La gondola tiene registrado fletes');
        }else{
        if ($request->ajax()) {
            $gondola = Gondola::findOrFail($id);
            if (Gondola::destroy($id)) {
                Storage::disk('public')->delete("imagenes/gondolas/$gondola->foto");
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
        }
        
    }
}
