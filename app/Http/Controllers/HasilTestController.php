<?php

namespace App\Http\Controllers;

use App\Models\HasilSoal;
use Illuminate\Http\JsonResponse;

class HasilTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',[
            'except' => [
                'detail'
            ]
        ]);
    }

    public function index($id_test): JsonResponse{
        $data = HasilSoal::where('id_test', $id_test)->get();
        if(count($data) > 0){
            $res = $this->responses(true, "get all data test", $data);
        }else{
            $res = $this->responses(false, "empty data", null);
        }

        return response()->json($res);
    }

    public function detail($id):JsonResponse{
        $detail = HasilSoal::where('id', $id)->first();
        if(count($detail) > 0){
            $res = $this->responses(true, "get detail data: ".$id, $detail);
        }else{
            $res = $this->responses(false, "data not found", null);
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
