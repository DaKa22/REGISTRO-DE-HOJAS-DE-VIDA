<?php

namespace App\Http\Controllers;

use App\Models\historial_laboral;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Historial_LaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historial_laborales=historial_laboral::with('users')->get();
        $users=User::all();
        return view('historial_laborales.index', compact('historial_laborales','users'));
    }
    public function imprimir()
    {
        $historial_laborales=historial_laboral::all();
        $pdf= \PDF::loadView('historial_laborales.imprimir',compact('historial_laborales'));
        $pdf->setPaper('letter', 'landscape');
        return $pdf->download('historial_laborales.pdf');
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
        $user=User::where('id',$request['users_id'])->first();
        $fecha_M_edad=Carbon::parse($user->fecha_nacimiento)->addYear(18);
        if ($fecha_M_edad->toDateString() > $request['fecha_inicio'] ) {
           return redirect()->back()->with([
               'created' => 0,
               'mensaje' => 'El Usuario No pudo iniciar siendo menor de edad '
           ]);
        }
        if ($request['fecha_inicio']>=$request['fecha_terminacion'] ) {
            return redirect()->back()->with([
                'created' => 0,
                'mensaje' => 'La fecha de inicio no puede superar la final'
            ]);
         }
         if ($request['fecha_terminacion']>Carbon::now()->toDateString() ) {
            return redirect()->back()->with([
                'created' => 0,
                'mensaje' => 'La fecha de Terminacion no puede superar la actual'
            ]);
         }

        // if ($request['fecha_terminacion']>Carbon::now()->toDateString()) {
        //     return redirect()->back()->with([
        //         'created' => 0,
        //         'mensaje' => 'El Usuario NO puede terminar sus estudio superando la fecha actual'
        //     ]);
        // }
        // $fecha_terminacion=Carbon::parse($request['fecha_terminacion'])->age;
        // if ($fecha_terminacion < 18) {
        //    return redirect()->back()->with([
        //        'created' => 0,
        //        'mensaje' => 'El Usuario ES MENOR de edad'
        //    ]);
        // }
        if($request->id){
            try {
                $historial_laboral=historial_laboral::where('id',$request->id)->first();
                if(!$historial_laboral) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe La historial_laboral.'
                    ]);
                }

                $historial_laboral->update([
                    'empresa' => $request['empresa'],
                    'cargo' => $request['cargo'],
                    'fecha_inicio' => $request['fecha_inicio'],
                    'fecha_terminacion' => $request['fecha_terminacion'],
                    'users_id' => $request['users_id'],
                ]);
                if($historial_laboral->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'La historial_laboral se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'La historial_laboral NO se  Actualizo Correctamente'
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

            $historial_laboral = historial_laboral::create([
                    'empresa' => $request['empresa'],
                    'cargo' => $request['cargo'],
                    'fecha_inicio' => $request['fecha_inicio'],
                    'fecha_terminacion' => $request['fecha_terminacion'],
                    'users_id' => $request['users_id'],

            ]);
            if($historial_laboral){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La historial_laboral se creo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La historial_laboral NO se creo correctamente'
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
     * @param  \App\Models\historial_laboral  $historial_laboral
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historial_laboral=historial_laboral::where('id',$id)->first();
        if(!$historial_laboral){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'historial_laboral NO fue encontrada'
            ]);
        }
        return response()->json($historial_laboral);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial_laboral  $historial_laboral
     * @return \Illuminate\Http\Response
     */
    public function edit(historial_laboral $historial_laboral)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historial_laboral  $historial_laboral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historial_laboral $historial_laboral)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial_laboral  $historial_laboral
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $historial_laboral=historial_laboral::where('id',$id)->first();
            if(!$historial_laboral) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la historial_laboral.'
                ]);
            }


            if($historial_laboral->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La historial_laboral se Elimino Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La historial_laboral NO se Elimino Correctamente'
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
