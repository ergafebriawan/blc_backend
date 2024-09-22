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
        $this->middleware(
            'auth:api',
            [
                'except' => [
                    'login_admin',
                    'refresh',
                    'logout_admin'
                ]
            ]
        );
    }

    public function login_peserta(Request $request)
    {
        return response()->json();
    }

    public function login_admin(Request $request): JsonResponse
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(
                $this->responses(false, 'admin atau password tidak valid'),
                Response::HTTP_UNAUTHORIZED
            );
        }

        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'admin' => auth()->user(),
            'expires_in' => auth()->factory()->getTTL() * 60 * 24
        ];

        return response()->json(
            $this->responses(true, 'login admin berhasil', $data),
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
            $this->responses(true, 'menampilkan profile admin', auth()->user()),
            Response::HTTP_OK
        );
    }

    public function logout_admin(): JsonResponse
    {
        auth()->logout();
        return response()->json(
            $this->responses(true, 'berhasil logout admin'),
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
