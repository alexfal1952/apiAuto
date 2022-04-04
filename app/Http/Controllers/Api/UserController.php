<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Exceptions\loginException ;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{
    public function usuarioNoPermitido(){
        throw new loginException('NO ESTAS REGISTRADO');
    }
    public function prueba(){
    	 return response()->json(['saludo' => 'hola']);
    }
    public function register(){

        $validator = Validator::make(request()->input(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        request()->merge(['password' => bcrypt(request('password'))]);
        $user = User::create(request()->input());
        $success['token'] = $user
            ->createToken('tasks api')
            ->accessToken;
        return response()->json($success);
    }

    public function logout(){
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json('Logged out successfully', 200);
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
}
