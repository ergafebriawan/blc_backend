<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\JenisKelas;
use App\Models\RolePeserta;
use App\Models\HasilSoal;
use Illuminate\Support\Facades\Hash;

class UserTestController extends Controller
{
    function login_peserta(Request $request): JsonResponse
    {
        $this->validate($request, [
            'nik' => 'required|string',
            'kode' => 'required|string',
        ]);

        $nik = $request->input('nik');
        $kode = $request->input('kode');

        $get_peserta = HasilSoal::join('peserta', 'hasil_test.id_peserta', '=', 'peserta.id')
            ->select(
                'hasil_test.id as id',
                'peserta.id as id_peserta',
                'peserta.no_reg as nik',
                'hasil_test.kode_soal as kode',
                'hasil_test.token as token'
            )
            ->where('peserta.no_reg', $nik)
            ->first();
        if ($get_peserta != null) {
            if ($get_peserta['kode'] != $kode) {
                $res = $this->responses(false, "password yang dimasukan salah");
            }else{
                $token = Hash::make($get_peserta['nik'] . $get_peserta['kode']);
                HasilSoal::where('id', $get_peserta['id'])->update(['token' => $token]);
                $res = $this->responses(true, "login berhasil", ["token" => $token, "id" => $get_peserta['id']]);
            }
        } else {
            $res = $this->responses(false, "NIK tidak terdaftar");
        }
        return response()->json($res);
    }

    public function logout_peserta(Request $request): JsonResponse
    {
        $token = $request->input('token');
        $peserta = HasilSoal::where('token', $token)->first();
        if ($peserta != null) {
            HasilSoal::where('id', $peserta['id'])->update(['token' => null]);
            $res = $this->responses(true, "berhasil logout");
        } else {
            $res = $this->responses(false, "failed logout");
        }
        return response()->json($res);
    }

    public function hasil($id): JsonResponse
    {
        $detail = HasilSoal::join('peserta', 'hasil_test.id_peserta', '=', 'peserta.id')
                            ->select(
                                'hasil_test.*',
                                'peserta.no_reg',
                                'peserta.id as id_peserta',
                                'peserta.nama_peserta as nama_peserta',
                                'peserta.email',
                                'peserta.no_hp',
                                'peserta.gender',
                                'peserta.tgl_lahir',
                                'peserta.instansi',
                                'peserta.alamat',
                            )
                            ->where('hasil_test.id', $id)
                            ->first();
        if ($detail != null) {
            $res = $this->responses(true, "get detail data nilai: " . $id, $detail);
        } else {
            $res = $this->responses(false, "data not found", null);
        }
        return response()->json($res);
    }

    public function profile($token): JsonResponse
    {
        $profile = HasilSoal::join('peserta', 'hasil_test.id_peserta', '=', 'peserta.id')
            ->select(
                'hasil_test.id as id',
                'peserta.id as id_peserta',
                'peserta.no_reg as nik',
                'peserta.nama_peserta as nama_peserta',
                'peserta.no_hp as no_hp',
                'peserta.gender as gender',
                'peserta.tgl_lahir as tgl_lahir',
                'peserta.instansi as instansi',
                'peserta.alamat as alamat',
                'peserta.role_kelas as role_kelas',
                'peserta.jenis_peserta as jenis_peserta',
            )
            ->where('hasil_test.token', $token)
            ->first();
        if ($profile != null) {
            $jenis_peserta = RolePeserta::where('id', $profile['jenis_peserta'])->first();
            $role_kelas = JenisKelas::where('id', $profile['role_kelas'])->first();
            $data_profile = [
                "id_test"       => $profile['id'],
                "nik"           => $profile['nik'],
                "nama_peserta"  => $profile['nama_peserta'],
                "no_hp"         => $profile['no_hp'],
                "jenis_kelamin" => $profile['gender'],
                "tgl_lahir"     => $profile['tgl_lahir'],
                "instansi"      => $profile['instansi'],
                "alamat"        => $profile['alamat'],
                "role_kelas"    => $role_kelas['nama_kelas'],
                "jenis_peserta" => $jenis_peserta['nama_role']
            ];
            $res = $this->responses(true, "get profile user id: " . $profile['id'], $data_profile);
        } else {
            $res = $this->responses(false, "data not found", null);
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
}
