<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\JsonResponse;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse{
        $test = Test::all();
        if(count($test) > 0){
            $res = $this->responses(true, "get all data test", $test);
        }else{
            $res = $this->responses(false, "empty data", null);
        }

        return response()->json($res);
    }

    public function detail($id):JsonResponse{
        $test_detail = Test::where("id", $id)->get();
        if(count($test_detail) > 0){
            $res = $this->responses(true, "get detail data test", $test_detail[0]);
        }else{
            $res = $this->responses(false, "not found data");
        }

        return response()->json($res);
    }

    public function update($id): JsonResponse{
        $state = false;
        $data = Test::where("id", $id)->get();
        if($data[0]->status == $state){
            $state = true;
        }
        $test_update = Test::where("id", $id)->update(['status' => $state]);
        if($test_update){
            $res = $this->responses(true, "success update data");
        }else{
            $res = $this->responses(false, "failed update data");
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
