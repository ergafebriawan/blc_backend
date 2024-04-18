<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PesertaController extends Controller
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
        $peserta = Peserta::all();
        if(count($peserta) > 0){
            return response()->json(
                $this->responses(true, 'get semua data peserta', $peserta), 
                Response::HTTP_OK
            );
        }else{
            return response()->json(
                $this->responses(false, 'data empty'), 
                Response::HTTP_NO_CONTENT
            );
        }
    }

    public function detail($id):JsonResponse{
        $detail_peserta = Peserta::where('_id', $id)->get();
        if(count($detail_peserta) > 0){
            return response()->json(
                $this->responses(true, 'get detail data peserta id = '.$id, $detail_peserta[0]), 
                Response::HTTP_OK
            );
        }else{
            return response()->json(
                $this->responses(false, 'data peserta id('.$id.') not found'), 
                Response::HTTP_NO_CONTENT
            );
        }
    }

    public function create(Request $request): JsonResponse{
        $data = [
            "no_reg" => $request->input("no_reg"),
            "role_kelas" => $request->input("role_kelas"),
            "jenis_peserta" => $request->input("jenis_peserta"),
            "nama" => $request->input("nama"),
            "email" => $request->input("email"),
            "no_hp" => $request->input("no_hp"),
            "gender" => $request->input("gender"),
            "tgl_lahir" => $request->input("tgl_lahir"),
            "instansi" => $request->input("instansi"),
            "alamat" => $request->input("alamat"),
            "picture_profile" => null,
            "token" => null,
            "created_at" => date("Y-m-d H:i:s", time()),
            "updated_at" => date("Y-m-d H:i:s", time())
        ];

        $data_valid = Peserta::where('no_reg', $request->input("no_reg"))->get();
        if(count($data_valid) == 0){
            Peserta::create($data);
            return response()->json(
                $this->responses(true, 'berhasil menambahkan peserta', $data), 
                Response::HTTP_CREATED
            );
        }else{
            return response()->json(
                $this->responses(false, 'peserta sebelumnya sudah terdaftar'), 
                Response::HTTP_CONFLICT
            );
        }
    }

    public function update(Request $request, $id): JsonResponse{
        $data = [
            "no_reg" => $request->input("no_reg"),
            "role_kelas" => $request->input("role_kelas"),
            "jenis_peserta" => $request->input("jenis_peserta"),
            "nama" => $request->input("nama"),
            "email" => $request->input("email"),
            "no_hp" => $request->input("no_hp"),
            "gender" => $request->input("gender"),
            "tgl_lahir" => $request->input("tgl_lahir"),
            "instansi" => $request->input("instansi"),
            "alamat" => $request->input("alamat"),
            "updated_at" => date("Y-m-d H:i:s", time())
        ];

        $peserta_update = Peserta::where("_id", $id)->update($data);
        if($peserta_update){
            return response()->json(
                $this->responses(true, 'berhasil update data id:'.$id, $data), 
                Response::HTTP_OK
            );
        }else{
            return response()->json(
                $this->responses(false, 'gagal update data'), 
                Response::HTTP_NOT_MODIFIED
            );
        }
    }

    public function delete($id): JsonResponse{
        $delete_peserta = Peserta::where("_id", $id)->delete();
        if($delete_peserta){
            $res = $this->responses(true, 'berhasil hapus peserta id:'.$id);
        }else{
            $res = $this->responses(false, 'gagal hapus data peserta id:'.$id);
        }
        return response()->json($res);
    }

    public function filter($params): JsonResponse{
        
        return response()->json();
    }

    public function active_test(Request $request, $id_peserta): JsonResponse{
        $data_peserta = Peserta::where("_id", $id_peserta)->get();
        if(count($data_peserta) == 0){
            $res = $this->responses(false, 'peserta tidak ditemukan');
        }

        return response()->json();
    }

    public function show_by_test($id_test): JsonResponse{
        $data_bytest = Peserta::where("test", $id_test)->get();
        if(count($data_bytest) > 0){
            $res = $this->responses(true, 'menampilkan data berdasarkan num test:'.$id_test, $data_bytest);
        }else{
            $res = $this->responses(false, 'empty data');
        }
        return response()->json($res);
    }

    public function upload_photo(Request $request, $id_peserta):JsonResponse{
        $data_peserta = Peserta::where('_id', $id_peserta)->get();
        if(count($data_peserta) > 0){
            $file = 'photo_profile.jpg';
            $path = 'storage/photo_profile/'.$file;
            $up_data = [
                "name_file" => $file,
                "path" => $path
            ];
            Peserta::where("_id", $id_peserta)->update([
                "profile" => $up_data
            ]);
            $res = $this->responses(true, 'upload successfully', $up_data);
        }else{
            $res = $this->responses(false, 'user tidak ditemukan');
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
