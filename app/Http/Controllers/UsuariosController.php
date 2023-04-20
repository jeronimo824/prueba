<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
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
        $inputs = $request->input();
        $e = Usuario::create($inputs);
        return response()->json([
            'data'=>$e,
            'mensaje'=>"Operacion lograda con exito",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e = Usuario::find($id);
        if(isset($e)){
            return response()->json([
                'data'=>$e,
                'mensaje'=>"Operacion lograda con exito",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario",
            ]);
        }
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
        $e = Usuario::find($id);
        if(isset($e)){
            $e->nombre = $request->nombre;
            $e->apellido = $request->apellido;
            $e->foto = $request->foto;
            if($e->save()){
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Operacion lograda con exito",
                ]);
            };
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario",
            ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Usuario::find($id);
        if(isset($e)){
            $res=Usuario::destroy($id);
            if($res){
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"Eliminacion con exito",
                ]);
            }else{
                return response()->json([
                    'data'=>$e,
                    'mensaje'=>"No existe el usuario",
                ]); 
            }
           
        }
        else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario",
            ]);
        }
    }
}
