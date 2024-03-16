<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionFlete;
use App\Models\Gondola;
use App\Models\Flete;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class FleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fletes = Flete::with('usuario:id,nombre', 'gondola')->orderBy('fecha_salida')->get();
        return view('flete.index', compact('fletes'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        //
       // $gondolas = Gondola::whereNotNull('status')->pluck('placas_truck', 'id');
        $gondolas = Gondola::where('status','Disponible')->pluck('placas_truck','id');
        return view('flete.crear', compact('gondolas')  );
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidacionFlete $request)
    {
      
        $gondola = Gondola::findOrFail($request->gondola_id);
        Gondola::where('id',$request->gondola_id)
            ->update(['status'=> 'En Ruta']);
        $gondola->creado()->create([
             'origen' => $request->origen,
             'destino' => $request->destino,
             'mina' => $request->mina,
             'km' => $request->km,
             'fecha_salida' => $request->fecha_salida,
             'hora_salida' => $request->hora_salida,
             'fecha_pago' => $request->fecha_pago,
             'creado_por' => $request->creado_por,
             'usuario_id' => auth()->user()->id,
             'cliente' => $request->cliente,
             'material' => $request->material,
             'notas' => $request->notas
         ]);
        return redirect()->route('flete')->with('mensaje', 'El flete se registró correctamente');
    }

    public function datos_gondola($placas_truck)
    {
        //
        $gondola = Gondola::where('status','Disponible')->findOrFail($request->gondola_id);
        $gondola->creado()->create([
            'creado_por' => $request->creado_por,
            'fecha_salida' => $request->fecha_salida,
            'usuario_id' => auth()->user()->id
        ]);
        return redirect()->route('flete')->with('mensaje', 'El flete se registró correctamente');
    }


    public function finalizar(Request $request, $gondola_id)
    {
        if ($request->ajax()) {
            Flete::where('gondola_id', $gondola_id)
            ->whereNull('fecha_llegada')
            ->update(['fecha_llegada' => date('Y-m-d'),'status'=>'Finalizado','hora_llegada'=>date('H:i:s')]);
            Gondola::where('id',$gondola_id)
            ->update(['status'=> 'Disponible']);
            return response()->json(['fecha_llegada' => date('Y-m-d')]);
        } else {
            abort(404);
        }

    }

    public function mostrar($id,$gondola_id)
    {
        //
        $flete = Flete::findOrFail($id);
        $gondola = Gondola::find($gondola_id);
       // dd($flete,$gondola);
        return view('flete.mostrar', compact('flete','gondola'));
    }


    public function ver(Request $request, Flete $flete)
    {
        //
        if ($request->ajax()) {
            return view('flete.ver', compact('flete'));
        } else {
            abort(404);
        }
    }





    public function editar($id)
    {
        //
        $flete = Flete::findOrFail($id);
        //dd($flete);
        return view('flete.editar', compact('flete'));
    }

    public function actualizar(ValidacionFlete $request, $id)
    {
        //
        $flete = Flete::findOrFail($id);
        $flete->update($request->all());
        return redirect()->route('flete')->with('mensaje', 'El flete se actualizó correctamente');
  
    }

    public function eliminar(Request $request, $id)
    {
        //
        $status = 'En Ruta';
        $modelCollection = Flete::where('id', $id)->where('status', $status)->get();
        if(!$modelCollection->isEmpty()) {
            return redirect()->route('flete')->with('mensaje', 'El flete sigue en ruta, para eliminar por favor Finalizar');
        }else{
        if ($request->ajax()) {
            $flete = Flete::findOrFail($id);
            if (Flete::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    
        
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

}
