<?php

namespace App\Http\Controllers;

use App\Models\tabla_estudio;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Tabla_EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabla_estudios=tabla_estudio::with('users')->get();
        $users=User::all();
        return view('tabla_estudios.index', compact('tabla_estudios','users'));
    }
    public function imprimir()
    {
        $tabla_estudios=tabla_estudio::with('users')->get();
        $pdf= \PDF::loadView('tabla_estudios.imprimir',compact('tabla_estudios'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('tabla_estudios.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id){
            try {
                $tabla_estudio=tabla_estudio::where('id',$request->id)->first();
                if(!$tabla_estudio) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe La tabla estudio.'
                    ]);
                }

                $tabla_estudio->update([
                    'titulo' => $request['titulo'],
                    'entidad_educativa' => $request['entidad_educativa'],
                    'fecha_terminacion' => $request['fecha_terminacion'],
                    'users_id' => $request['users_id'],
                ]);
                if($tabla_estudio->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'La tabla estudio se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'La tabla estudio NO se  Actualizo Correctamente'
                    ]);
                }

            } catch (QueryException $e) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => $e->getMessage()
                ]);
            }
        }
        try {

            $tabla_estudio = tabla_estudio::create([
                    'titulo' => $request['titulo'],
                    'entidad_educativa' => $request['entidad_educativa'],
                    'fecha_terminacion' => $request['fecha_terminacion'],
                    'users_id' => $request['users_id'],

            ]);
            if($tabla_estudio){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La tabla estudio se creo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La tabla estudio NO se creo correctamente'
                ]);
            }


        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tabla_estudio  $tabla_estudio
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $tabla_estudio=tabla_estudio::where('id',$id)->first();
        if(!$tabla_estudio){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'tabla_estudio NO fue encontrada'
            ]);
        }
        return response()->json($tabla_estudio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tabla_estudio  $tabla_estudio
     * @return \Illuminate\Http\Response
     */
    public function edit(tabla_estudio $tabla_estudio)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tabla_estudio  $tabla_estudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tabla_estudio $tabla_estudio)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tabla_estudio  $tabla_estudio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $tabla_estudio=tabla_estudio::where('id',$id)->first();
            if(!$tabla_estudio) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la tabla_estudio.'
                ]);
            }


            if($tabla_estudio->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La tabla_estudio se Elimino Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La tabla_estudio NO se Elimino Correctamente'
                ]);
            }



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }

    }
}
