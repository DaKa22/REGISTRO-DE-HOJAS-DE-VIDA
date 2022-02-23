<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('users.index', ['users' => $users]);
    }
    public function imprimir()
    {
        $users=user::all();
        $pdf= \PDF::loadView('users.imprimir',compact('users'));
        $pdf->setPaper('A3', 'landscape');
        return $pdf->download('users.pdf');
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
                if ($user_restore=user::where('cedula',$request->cedula)->withTrashed()->first()) {
                    $user_restore->withTrashed()->restore();
                    if ($user_restore->save()) {
                        return redirect()->back()->with([
                            'created' => 1,
                            'mensaje' => 'El Usuario se  Restauro Correctamente'
                        ]);
                    }else{
                        return redirect()->back()->with([
                            'created' => 0,
                            'mensaje' => 'El Usuario NO se  Restauro Correctamente'
                        ]);
                    }
                }

         $fecha_nacimiento=Carbon::parse($request['fecha_nacimiento'])->age;
         if ($fecha_nacimiento < 18) {
            return redirect()->back()->with([
                'created' => 0,
                'mensaje' => 'El Usuario ES MENOR de edad'
            ]);
         }
        if($request->id){
            try {
                $user=user::where('id',$request->id)->first();

                if(!$user) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe El Usuario.'
                    ]);
                }
                $fecha_nacimiento=Carbon::parse($request['fecha_nacimiento'])->age;
                if ($fecha_nacimiento < 18) {
                   return redirect()->back()->with([
                       'created' => 0,
                       'mensaje' => 'El Usuario ES MENOR de edad'
                   ]);
                }
                $user->update([
                    'cedula' => $request['cedula'],
                    'nombre1' => $request['nombre1'],
                    'nombre2' => $request['nombre2'],
                    'apellido1' => $request['apellido1'],
                    'apellido2' => $request['apellido2'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'email' => $request['email'],
                    'genero' => $request['genero'],
                    'nacionalidad' => $request['nacionalidad'],
                    'estado_civil' => $request['estado_civil'],
                    'fecha_nacimiento' => $request['fecha_nacimiento'],
                    'rh' => $request['rh'],
                ]);
                if($user->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El Usuario se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El Usuario NO se  Actualizo Correctamente'
                    ]);
                }

            } catch (QueryException $e) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => $e->getMessage()
                ]);
            }
        }else{
            try {

                $user = user::create([
                    'cedula' => $request['cedula'],
                    'nombre1' => $request['nombre1'],
                    'nombre2' => $request['nombre2'],
                    'apellido1' => $request['apellido1'],
                    'apellido2' => $request['apellido2'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'email' => $request['email'],
                    'genero' => $request['genero'],
                    'nacionalidad' => $request['nacionalidad'],
                    'estado_civil' => $request['estado_civil'],
                    'fecha_nacimiento' => $request['fecha_nacimiento'],
                    'rh' => $request['rh'],
                    'password' => Hash::make($request['password']),
                ]);
                if($user){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'El Usuario se creo correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'El Usuario NO se creo correctamente'
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::where('id',$id)->first();
        if(!$user){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'user NO fue encontrada'
            ]);
        }
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            $user=User::where('id',$id)->first();

            if(!$user) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe El Usuario.'
                ]);
            }


            if($user->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'El Usuario se Elimino Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'El Usuario NO se Elimino Correctamente'
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

