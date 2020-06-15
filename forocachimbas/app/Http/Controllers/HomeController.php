<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Temas;
use App\User;
use App\Comentarios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function foro()
    {
        return view('foro');
    }
    public function show(User $user)
    {
        return view('detalles', compact('user'));
    }
    public function show2(Temas $foro)
    {
        return view('tema', compact('foro'));
    }

    public function create(User $user)
    {
        return view('crearTema', compact('user'));
    }

    public function store(User $user){

        $data = request()->validate([
            'tema'=>'required',
            'texto'=>'required',
            
        ],[
            'tema.required'=>'El campo tema es obligatorio',
            'texto.required'=>'El campo texto es obligatorio',
            
        ]);
        Temas::create([
            'tema' => $data['tema'],
            'texto'=> $data['texto'],
            'usuario_id'=>$user->id,
            'like'=>0,
            'numero_comentarios'=>0
        ]);

        return redirect('/');
    }

    
    public function create2(User $user, Temas $foro)
    {
        return view('crearRespuesta', compact('user','foro'));
    }

    public function store2(User $user, Temas $foro){

        $data = request()->validate([
            'respuesta'=>'required',
            
        ],[
            'respuesta.required'=>'El campo texto es obligatorio',
            
        ]);
        Comentarios::create([
            'texto'=> $data['respuesta'],
            'like'=>0,
            'usuario_id'=>$user->id,
            'tema_id'=>$foro->id,
            
        ]);

        return redirect('/');
    }
}
