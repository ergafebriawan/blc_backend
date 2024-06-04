<?php

namespace App\Http\Controllers;

use App\Models\HasilSoal;
use Illuminate\Http\JsonResponse;

class HasilTestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index(): JsonResponse{
        // $test = Test::all();
        // if(count($test) > 0){
        //     $res = $this->responses(true, "get all data test", $test);
        // }else{
        //     $res = $this->responses(false, "empty data", null);
        // }

        return response()->json();
    }


    protected function responses($success, $message, $data = null){
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }
}
