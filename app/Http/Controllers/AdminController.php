<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(): JsonResponse{
        $admin = Admin::all();
        return response()->json($admin);
    }

    public function detail($id): JsonResponse{
        $detail = Admin::where('_id', $id)->get();
        return response()->json($this->responses(true, 'menampilkan detail data admin id:'.$id, $detail[0]));
    }

    protected function responses($success, $message, $data = null){
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }
}
