<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthAdminController extends Controller
{
    public function __construct()
    {
        
    }

    public function login(Request $request): JsonResponse
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        

        $d = Admin::where('username', $request->input('username'));
        // $d = [
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        //     'admin' => auth()->user(),
        //     'expires_in' => auth()->factory()->getTTL() * 60 * 24
        // ];

        return response()->json(
            $this->responses(true, 'login berhasil', $d),
            Response::HTTP_OK
        );
    }

    public function refresh(): JsonResponse
    {
        return response()->json(
            $this->responses(true, 'refresh token', auth()->refresh()),
            Response::HTTP_OK
        );
    }

    public function me(): JsonResponse
    {
        return response()->json(
            $this->responses(true, 'profile authentication admin', auth()->user()),
            Response::HTTP_OK
        );
    }

    public function logout_admin(): JsonResponse
    {
        auth()->logout();
        return response()->json(
            $this->responses(true, 'berhasil logout'),
            Response::HTTP_OK
        );
    }

    protected function responses($success, $message, $data = null)
    {
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }
}
