<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UsuarioResource;
use App\Models\User;

class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UsuarioResource::collection(User::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->all());
    
        return response()->json(["message" => "Usuario Criado com sucesso"], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function Login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        
            $user = Auth::user();
            $token = $user->createToken('JWT');
    
            return response()->json($token, 200);
        }
    
        return response()->json('Usuario não autenticado', 401);
    }
}
