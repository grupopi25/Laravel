<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function login(Request $request){

$request->only(['email','password']);
$user = User::where('email',$request->email)->fisrt();

if(!$user || Hash::check($request->password, $user->password)){ // CHECA SE O USUÁRIO EXISTE
    return response()->json(
        [
            'status' => 'error',
            'message' => 'Usuário não cadastrado!'
        ],Response::HTTP_UNAUTHORIZED
    );
}
$token = $user->createToken($request->email)->plainTextToken;  // CRIA UM TOKEN PARA SALVAR UM USUARIO 
 
return response()->json([

    'status' => 'sucesso',
    'user' => $user,
    'token' => $token    
],Response::HTTP_OK);


}
public function logout(Request $request){ // FAZ O USUÁRIO DESLOGAR DA CONTA 

  
    $user = $request -> user();
    $user ->tokens() ->delete();

    return response()->json(

         [
            'status' => 'sucesso',
            'message' => 'Usuário saiu com Sucesso'
        ],Response::HTTP_OK  
    );
}

public function registro(Request $request){  // FAZ A VALIDAÇÃO DOS CAMPOS

   
$request->validate([
    'name' => 'required',
    'email' => 'required|email',
    'password' => 'required|min:4',
    
    $user = User::create(                // CRIA O USUAROP
        [
               'name' => $request->name, 
               'email' => $request->email, 
               'password' => Hash::make($request->password), 
        ]
          
        )
]);
return response()->json([
    'tste'
]);
}



}
