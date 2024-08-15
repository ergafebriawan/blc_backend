<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\MediaUpload;
use App\Models\HasilSoal;
use App\Models\Test;
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

    public function index(): JsonResponse
    {
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
        if (empty($peserta) == false) {
            return response()->json(
                $this->responses(true, 'get semua data peserta', $peserta),
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                $this->responses(false, 'data empty'),
                Response::HTTP_NO_CONTENT
            );
        }
    }

    public function detail($id): JsonResponse
    {
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
        if (count($detail_peserta) > 0) {
            return response()->json(
                $this->responses(true, 'get detail data peserta id = ' . $id, $detail_peserta[0]),
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                $this->responses(false, 'data peserta id(' . $id . ') not found'),
                Response::HTTP_NO_CONTENT
            );
        }
    }

    public function create(Request $request): JsonResponse
    {
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
        if (count($data_valid) == 0) {
            Peserta::create($data);
            return response()->json(
                $this->responses(true, 'berhasil menambahkan peserta', $data),
                Response::HTTP_CREATED
            );
        } else {
            return response()->json(
                $this->responses(false, 'peserta sebelumnya sudah terdaftar'),
                Response::HTTP_CONFLICT
            );
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
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
        if ($peserta_update) {
            return response()->json(
                $this->responses(true, 'berhasil update data id:' . $id, $data),
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                $this->responses(false, 'gagal update data'),
                Response::HTTP_NOT_MODIFIED
            );
        }
    }

    public function delete($id): JsonResponse
    {
        $delete_peserta = Peserta::where("id", $id)->delete();
        if ($delete_peserta) {
            return response()->json(
                $this->responses(true, 'berhasil hapus peserta id:' . $id),
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                $this->responses(false, 'gagal hapus data peserta id:' . $id),
                Response::HTTP_OK
            );
        }
    }

    public function filter($params): JsonResponse
    {

        return response()->json();
    }

    public function active_test(Request $request, $id_peserta): JsonResponse
    {
        $data_peserta = Peserta::where("id", $id_peserta)->get();
        if (count($data_peserta) == 0) {
            $res = $this->responses(false, 'peserta tidak ditemukan');
        }

        $test = $request->input("id_test");
        $kode_soal = $this->get_code($test);

        $data = [
            "id_peserta" => $id_peserta,
            "id_test" => $test,
            "kode_soal" => $kode_soal,
            "tgl_daftar" => date('Y-m-d')
        ];
        $create = HasilSoal::create($data);
        if ($create) {
            return response()->json(
                $this->responses(true, 'berhasil menambahkan activasi test', $data),
                Response::HTTP_CREATED
            );
        } else {
            return response()->json(
                $this->responses(false, 'gagal menambahkan activasi test'),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function show_by_test($id_test): JsonResponse
    {
        $data_bytest = HasilSoal::join('peserta', 'hasil_test.id_peserta', '=', 'peserta.id')
            ->join('test', 'hasil_test.id_test', '=', 'test.id')
            ->select(
                'peserta.id as id_peserta',
                'peserta.no_reg',
                'peserta.nama_peserta',
                'peserta.email',
                'peserta.no_hp',
                'peserta.gender',
                'peserta.tgl_lahir',
                'peserta.instansi',
                'peserta.alamat',
                'test.jenis_test',
                'hasil_test.id as id_test',
                'hasil_test.kode_soal',
                'hasil_test.tgl_daftar',
                'hasil_test.tgl_test',
                'hasil_test.status_test',
                'hasil_test.listening',
                'hasil_test.k_listening',
                'hasil_test.structure',
                'hasil_test.k_structure',
                'hasil_test.reading',
                'hasil_test.k_reading',
                'hasil_test.total'
            )
            ->where('test.id', $id_test)
            ->get();
        if (count($data_bytest) > 0) {
            $res = $this->responses(true, 'menampilkan data berdasarkan num test:' . $id_test, $data_bytest);
        } else {
            $res = $this->responses(false, 'empty data');
        }
        return response()->json($res);
    }

    public function show_by_hasil($id_test): JsonResponse
    {
        $data_bytest = HasilSoal::join('peserta', 'hasil_test.id_peserta', '=', 'peserta.id')
            ->join('test', 'hasil_test.id_test', '=', 'test.id')
            ->select(
                'peserta.id as id_peserta',
                'peserta.no_reg',
                'peserta.nama_peserta',
                'test.jenis_test',
                'hasil_test.id as id_test',
                'hasil_test.tgl_test',
                'hasil_test.status_test',
                'hasil_test.listening',
                'hasil_test.structure',
                'hasil_test.reading',
                'hasil_test.total'
            )
            ->where('test.id', $id_test)
            ->where('hasil_test.status_test', 1)
            ->get();
        if (count($data_bytest) > 0) {
            $res = $this->responses(true, 'menampilkan data berdasarkan num test:' . $id_test, $data_bytest);
        } else {
            $res = $this->responses(false, 'empty data');
        }
        return response()->json($res);
    }

    protected function responses($success, $message, $data = null)
    {
        return [
            "success" => $success,
            "message" => $message,
            "data" => $data
        ];
    }

    protected function generate_code()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    protected function get_code($test)
    {
        $get_test = Test::select('id', 'kode')->where('id', $test)->first();
        $get_date = date('dmY');
        $kode_soal = $get_test->kode . '-' . $get_date;
        return $kode_soal;
    }
}
