<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;
use App\Models\Equipo;

class JugadoresController extends Controller
{
    public function index(){
        
        $jugadores = Jugador::all();
        $equipos = Equipo::all();
        return view ('jugadores.index',compact('jugadores','equipos'));
    }

    public function store(Request $request){
        //dd($request->nombre);
        $jugador=new Jugador();
        
        $jugador ->apellido = $request->apellido;
        $jugador ->nombre = $request->nombre;
        $jugador ->posicion = $request->posicion;
        $jugador ->numero = $request->numero;
        $jugador ->id_equipos = $request->equipo;
        $jugador ->save();
        return redirect()->route('jugadores.index');
    }
}
