<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\MediaUpload;
use App\Models\HasilSoal;
use App\Models\Test;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\JenisKelas;
use App\Models\RolePeserta;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class PesertaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['download_template']]);
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
        $data_peserta = [];
        foreach ($peserta as $p) {
            $data_peserta[] = [
                'id_peserta'        => $p->id_peserta,
                'no_reg'            => $p->no_reg,
                'kelas'             => $p->kelas,
                'role'              => $p->role,
                'nama_peserta'      => $p->nama_peserta,
                'email'             => $p->email,
                'no_hp'             => $p->no_hp,
                'gender'            => $p->gender,
                'tgl_lahir'         => $p->tgl_lahir,
                'instansi'          => $p->instansi,
                'alamat'            => $p->alamat,
                'profile_picture'   => $p->profile_picture,
                'active_test'       => json_decode($p->active_test)
            ];
        }
        if (empty($peserta) == false) {
            return response()->json(
                $this->responses(true, 'menampilkan semua data peserta', $data_peserta),
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
            )->first();
            
        if ($detail_peserta) {
            $data_peserta = [
                'id_peserta'    => $detail_peserta->id_peserta,
                'no_reg'        => $detail_peserta->no_reg,
                'kelas'         => $detail_peserta->kelas,
                'role'          => $detail_peserta->role,
                'nama_peserta'  => $detail_peserta->nama_peserta,
                'email'         => $detail_peserta->email,
                'no_hp'         => $detail_peserta->no_hp,
                'gender'        => $detail_peserta->gender,
                'tgl_lahir'     => $detail_peserta->tgl_lahir,
                'instansi'      => $detail_peserta->instansi,
                'alamat'        => $detail_peserta->alamat,
                'active_test'   => json_decode($detail_peserta->active_test)
            ];
            return response()->json(
                $this->responses(true, 'ambil detail data peserta id = ' . $id, $data_peserta),
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
        $test = Test::select('jenis_test')->get();
        $data_test = [];
        foreach ($test as $t) {
            $data_test[$t->jenis_test] = false;
        }
        $data = [
            "no_reg"        => $request->input("no_reg"),
            "role_kelas"    => $request->input("role_kelas"),
            "jenis_peserta" => $request->input("jenis_peserta"),
            "nama_peserta"  => $request->input("nama_peserta"),
            "email"         => $request->input("email"),
            "no_hp"         => $request->input("no_hp"),
            "gender"        => $request->input("gender"),
            "tgl_lahir"     => $request->input("tgl_lahir"),
            "instansi"      => $request->input("instansi"),
            "alamat"        => $request->input("alamat"),
            "active_test"   => json_encode($data_test)
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
            "no_reg"        => $request->input("no_reg"),
            "role_kelas"    => $request->input("role_kelas"),
            "jenis_peserta" => $request->input("jenis_peserta"),
            "nama_peserta"  => $request->input("nama_peserta"),
            "email"         => $request->input("email"),
            "no_hp"         => $request->input("no_hp"),
            "gender"        => $request->input("gender"),
            "tgl_lahir"     => $request->input("tgl_lahir"),
            "instansi"      => $request->input("instansi"),
            "alamat"        => $request->input("alamat")
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

    public function import_peserta(Request $request): JsonResponse
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:xls,xlsx'
        ]);
        $file = $request->file('file_excel');
        $filename = $file->getClientOriginalName();
        $file->move(storage_path('excel'), $filename);


        $reader = new Xlsx();
        $spreadsheet = $reader->load(storage_path('excel/' . $filename));
        $worksheet = $spreadsheet->getActiveSheet();

        $data_peserta = [];
        foreach ($worksheet->getRowIterator() as $row) {
            $rowArray = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowArray[] = $cell->getValue();
            }
            if ($row->getRowIndex() > 1 && $rowArray[1] != null) {
                $kelas = '';
                $peserta = '';
                if ($rowArray[2] == 'reguler') {
                    $role_kelas = JenisKelas::select('id')->where('nama_kelas', 'reguler')->first();
                    $kelas = $role_kelas->id;
                } else if ($rowArray[2] == 'private') {
                    $role_kelas = JenisKelas::select('id')->where('nama_kelas', 'private')->first();
                    $kelas = $role_kelas->id;
                }

                if ($rowArray[2] == 'reguler') {
                    $jenis_peserta = RolePeserta::select('id')->where('nama_role', 'koordinator')->first();
                    $peserta = $jenis_peserta->id;
                } else if ($rowArray[2] == 'private') {
                    $jenis_peserta = RolePeserta::select('id')->where('nama_role', 'anggota')->first();
                    $peserta = $jenis_peserta->id;
                }

                $add_data = [
                    'no_reg' => $rowArray[1],
                    'role_kelas' => $kelas,
                    'jenis_peserta' => $peserta,
                    'nama_peserta' => $rowArray[4],
                    'email' => $rowArray[5],
                    'no_hp' => $rowArray[6],
                    'gender' => $rowArray[7],
                    'tgl_lahir' => $rowArray[8],
                    'instansi' => $rowArray[9],
                    'alamat' => $rowArray[10]
                ];
                $data_peserta[] = $add_data;
            }
        }

        for ($i = 0; $i < count($data_peserta); $i++) {
            $add = Peserta::create($data_peserta[$i]);
            if (!$add) {
                return response()->json(
                    $this->responses(false, 'gagal menambahkan data peserta ke-' . ($i + 1)),
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }

        $del_file = unlink(storage_path('excel/' . $filename));
        if ($del_file) {
            return response()->json(
                $this->responses(true, 'berhasil import data peserta'),
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                $this->responses(false, 'Gagal Import data'),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function download_template(Request $request)
    {
        $file = storage_path('template_file/template_import_peserta_TOELF.xlsx');
        $header = array('Content-Type' => 'application/xlsx');
        return response()->download($file, 'template_import_peserta.xlsx', $header);
    }

    public function more_active(Request $request): JsonResponse
    {
        $id_test = $request->input('id_test');
        $peserta = request()->input('peserta');
        $kode = $this->get_code($id_test);

        try {
            for ($i = 0; $i < count($peserta); $i++) {
                $data = [
                    "id_peserta" => $peserta[$i],
                    "id_test" => $id_test,
                    "kode_soal" => $kode,
                    "tgl_daftar" => date('Y-m-d')
                ];
                HasilSoal::create($data);
            }
            return response()->json(
                $this->responses(true, "berhasil menambahkan aktivasi test"),
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
            return response()->json(
                $this->responses(false, 'gagal menambahkan aktivasi test'),
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function filter(Request $request): JsonResponse
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

        $nama_test = Test::select('jenis_test')->where('id', $test)->first();

        $data = [
            "id_peserta" => $id_peserta,
            "id_test" => $test,
            "kode_soal" => $kode_soal,
            "tgl_daftar" => date('Y-m-d')
        ];

        // return response()->json(
        //     $this->responses(true, 'berhasil menambahkan activasi test', $data),
        //     Response::HTTP_CREATED
        // );

        try {
            HasilSoal::create($data);
            Peserta::where("id", $id_peserta)->update([
                "active_test" => [$nama_test => true]
            ]);

            return response()->json(
                $this->responses(true, 'berhasil menambahkan activasi test', $data),
                Response::HTTP_CREATED
            );
        } catch (\Throwable $th) {
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

    protected function convert_kelas($role_kelas)
    {
        $kelas = '';
        switch ($role_kelas) {
            case 'reguler':
                $kelas = 'reguler';
                break;
            case 'koordinator':
                $kelas = 'reguler';
                break;
        }
        $res = JenisKelas::select('id')->where('nama_kelas', $kelas)->get();
        return $res[0]["id"];
    }
}
