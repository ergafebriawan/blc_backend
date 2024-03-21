<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_peserta(Request $request): JsonResponse{
        return response()->json();
    }

    public function login_admin(Request $request): JsonResponse{
        $this->validate($request,[
            "username" => 'required|string',
            "password" => 'required|string' 
        ]);
        $username = $request->input("username");
        $password = $request->input("password");

        $valid = Admin::where("username", $username)->get();

        if(count($valid) > 0){
            if($valid[0]->password === $password){
                $token = md5($valid[0]->username);
                $d = [
                    "token" => $token,
                    "username" => $valid[0]->username
                ];
                Admin::where('_id', $valid[0]->_id)->update([
                    "token" => $token
                ]);
                $res = $this->responses(true, 'login successfull', $d);
            }else{
                $res = $this->responses(false, 'password salah');
            }
        }else{
            $res = $this->responses(false, 'username tidak ditemukan');
        }

        return response()->json($res, 200);
    }

    public function logout_admin(Request $request, $id_admin): JsonResponse{
        $logout_admin = Admin::where('_id', $id_admin)->update([
            "token" => null
        ]);
        
        if($logout_admin){
            $res = $this->responses(true, 'berhasil logout');
        }else{
            $res = $this->responses(false, 'gagal logout');
        }
        return response()->json($res);
    }

    protected function responses($success, $message, $data = null){
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }
}