<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    public function login_peserta(Request $request): JsonResponse{
        return response()->json();
    }

    public function login(Request $request){
        $this->validate($request,[
            "username" => 'required|string',
            "password" => 'required|string' 
        ]);
        $credentials = $request->only(['username', 'password']);
        // return response()->json($credentials);

        if(! $token = Auth::attempt($credentials)){
            return response()->json(
                $this->responses(false, 'Unauthorized'), 
                Response::HTTP_UNAUTHORIZED
            );
        }
        $res = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'admin' => auth()->user()
        ];
        return response()->json(
            $this->responses(true, 'login berhasil', $res),
            Response::HTTP_OK
        );

        // $username = $request->input("username");
        // $password = $request->input("password");

        // $valid = Admin::where("username", $username)->get();

        // if(count($valid) > 0){
        //     if($valid[0]->password === $password){
        //         $token = md5($valid[0]->username);
        //         $d = [
        //             "token" => $token,
        //             "username" => $valid[0]->username
        //         ];
        //         Admin::where('_id', $valid[0]->_id)->update([
        //             "token" => $token
        //         ]);

        //         return response()->json(
        //             $this->responses(true, 'login berhasil', $d), 
        //             Response::HTTP_OK
        //         );
        //     }else{
        //         return response()->json(
        //             $this->responses(false, 'password salah'), 
        //             Response::HTTP_UNAUTHORIZED
        //         );
        //     }
        // }else{
        //     return response()->json(
        //         $this->responses(false, 'username tidak ditemukan'), 
        //         Response::HTTP_NOT_FOUND
        //     );
        // }

    }

    // public function refresh(){
    //     $res = [
    //         'access_token' => auth()->refresh(),
    //         'token_type' => 'bearer',
    //         'admin' => auth()->user()
    //     ];
    //     return response()->json(
    //         $this->responses(true, 'login berhasil', $res),
    //         Response::HTTP_OK
    //     );
    // }

    public function logout_admin(Request $request, $id_admin): JsonResponse{
        $logout_admin = Admin::where('_id', $id_admin)->update([
            "token" => null
        ]);
        
        if($logout_admin){
            return response()->json(
                $this->responses(true, 'berhasil logout'), 
                Response::HTTP_OK
            );
        }else{
            return response()->json(
                $this->responses(false, 'gagal logout'), 
                Response::HTTP_UNAUTHORIZED
            );
        }
    }

    protected function responses($success, $message, $data = null){
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }
}