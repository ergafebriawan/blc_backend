<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(
            'auth:api'
        );
    }

    public function index(): JsonResponse{
        $admin = Admin::all();
        return response()->json($admin);
    }

    public function detail($id): JsonResponse{
        $detail = Admin::where('_id', $id)->get();
        return response()->json($this->responses(true, 'menampilkan detail data admin id:'.$id, $detail[0]));
    }

    public function store(Request $request): JsonResponse{
        $this->validate($request, [
            'username' => ['required','string','max:255'],
            'password' => ['required','string','min:6'],
        ]);

        try {
            Admin::create([
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);
            return response()->json($this->responses(true, 'berhasil menambahkan admin'));
        } catch (\Throwable $th) {
            return response()->json($this->responses(false, 'gagal menambahkan admin'));
        }
    }

    public function update_password(Request $request, $id): JsonResponse{
        $this->validate($request, [
            'new_password' => ['required','string','min:6'],
        ]);
        $admin = Admin::where('id', $id)->first();
        if($admin){
            $new_password = Hash::make($request->new_password);
            if($admin->password == $new_password){
                return response()->json($this->responses(false, 'password yang diinputkan sama dengan yang ada'));
            }
            $update = Admin::where('id', $id)->update(['password' => $new_password]);
            if($update){
                return response()->json($this->responses(true, 'berhasil update password admin id:'.$id));
            } else {
                return response()->json($this->responses(false, 'gagal update password admin id:'.$id));
            }
        } else {
            return response()->json($this->responses(false, 'data admin id:'.$id.' tidak ditemukan'));
        }
    }

    public function delete($id):JsonResponse {
        $delete_admin = Admin::where("id", $id)->delete();
        if($delete_admin){
            return response()->json($this->responses(true, 'berhasil hapus admin id:'.$id), Response::HTTP_OK);
        } else {
            return response()->json($this->responses(false, 'gagal hapus admin id:'.$id), Response::HTTP_BAD_REQUEST);
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
