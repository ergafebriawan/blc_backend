<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\MediaUpload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(): JsonResponse{
        $peserta = Peserta::join('jenis_kelas', 'peserta.role_kelas', '=', 'jenis_kelas.id')
                        ->join('role_peserta', 'peserta.jenis_peserta', '=', 'role_peserta.id')
                        ->select(
                            'peserta.id as id_peserta',
                            'peserta.no_reg',
                            'jenis_kelas.nama_kelas as kelas',
                            'role_peserta.nama_role as role',
                            'peserta.nama_peserta',
                            'peserta.email',
                            'peserta.no_hp',
                            'peserta.gender',
                            'peserta.tgl_lahir',
                            'peserta.instansi',
                            'peserta.alamat',
                            'peserta.profile_picture',
                            'peserta.active_test'
                        )
                        ->get();
        if(empty($peserta) == false){
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
        $detail_peserta = Peserta::where('peserta.id', $id)
                                ->join('jenis_kelas', 'peserta.role_kelas', '=', 'jenis_kelas.id')
                                ->join('role_peserta', 'peserta.jenis_peserta', '=', 'role_peserta.id')
                                ->select(
                                    'peserta.id as id_peserta',
                                    'peserta.no_reg',
                                    'jenis_kelas.nama_kelas as kelas',
                                    'role_peserta.nama_role as role',
                                    'peserta.nama_peserta',
                                    'peserta.email',
                                    'peserta.no_hp',
                                    'peserta.gender',
                                    'peserta.tgl_lahir',
                                    'peserta.instansi',
                                    'peserta.alamat',
                                    'peserta.profile_picture',
                                    'peserta.active_test'
                                )
                                ->get();
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
            "nama_peserta" => $request->input("nama_peserta"),
            "email" => $request->input("email"),
            "no_hp" => $request->input("no_hp"),
            "gender" => $request->input("gender"),
            "tgl_lahir" => $request->input("tgl_lahir"),
            "instansi" => $request->input("instansi"),
            "alamat" => $request->input("alamat")
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
            "nama_peserta" => $request->input("nama_peserta"),
            "email" => $request->input("email"),
            "no_hp" => $request->input("no_hp"),
            "gender" => $request->input("gender"),
            "tgl_lahir" => $request->input("tgl_lahir"),
            "instansi" => $request->input("instansi"),
            "alamat" => $request->input("alamat")
        ];

        $peserta_update = Peserta::where("id", $id)->update($data);
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
        $delete_peserta = Peserta::where("id", $id)->delete();
        if($delete_peserta){
            return response()->json(
                $this->responses(true, 'berhasil hapus peserta id:'.$id),
                Response::HTTP_OK
            );
        }else{
            return response()->json(
                $this->responses(false, 'gagal hapus data peserta id:'.$id),
                Response::HTTP_OK
            );
        }
    }

    public function filter($params): JsonResponse{
        
        return response()->json();
    }

    public function active_test(Request $request, $id_peserta): JsonResponse{
        $data_peserta = Peserta::where("id", $id_peserta)->get();
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

    public function generate_kode($id_peserta, $id_test): JsonResponse{
        
        return response()->json();
    }

    public function upload_photo(Request $request, $id_peserta):JsonResponse{
        $data_peserta = Peserta::where('id', $id_peserta)->get();
        if(count($data_peserta) > 0){
            $this->validate($request,[
                'image' => 'required|mimes:jpg,jpeg,gif,png|max:4096'
            ]);
            $file = $request->file('image');
            
            $filename = uniqid().'-'.$data_peserta[0]->no_reg.'.'.$file->getClientOriginalExtension();
            $path = 'profile_picture';
            $up_data = [
                "name_file" => $filename,
                "path" => $path.'/'.$filename,
                "jenis_file" => 'images'
            ];
            $file->move(storage_path($path), $filename);
            try {
                MediaUpload::create($up_data);
                $get_id_file = MediaUpload::select('id', 'name_file')->where('name_file', $filename)->first();
                Peserta::where('id', $data_peserta[0]->id)
                ->update([
                    'profile_picture' => $get_id_file->id
                ]);
                
                $res = $this->responses(true, 'upload successfully', $up_data);
            } catch (\Throwable $th) {
                $res = $this->responses(false, 'error'.$th);
            }
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
