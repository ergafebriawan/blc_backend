<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use App\Models\HasilSoal;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HasilTestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => [
                'detail',
                'hasil'
            ]
        ]);
    }

    public function index($id_test): JsonResponse
    {
        $data = HasilSoal::where('id_test', $id_test)->get();
        if (count($data) > 0) {
            $res = $this->responses(true, "get all data test", $data);
        } else {
            $res = $this->responses(false, "empty data", null);
        }

        return response()->json($res);
    }

    public function detail($id): JsonResponse
    {
        $detail = HasilSoal::where('id', $id)->first();
        if ($detail != null) {
            $res = $this->responses(true, "get detail data: " . $id, $detail);
        } else {
            $res = $this->responses(false, "data not found", null);
        }
        return response()->json($res);
    }

    public function cancel($id): JsonResponse
    {
        $hasil = HasilSoal::where('id', $id)->first();
        if ($hasil != null) {
            $hasil->delete();
            $res = $this->responses(true, "hapus data: " . $id);
        } else {
            $res = $this->responses(false, "data not found");
        }
        return response()->json($res);
    }

    public function hasil(Request $request, $id): JsonResponse{
        $listening = intval($request->input('listening'));
        $structure = intval($request->input('structure'));
        $reading = intval($request->input('reading'));

        $conv_listening = $this->konversi_nilai('listening', $listening);
        $conv_structure = $this->konversi_nilai('structure', $structure);
        $conv_reading = $this->konversi_nilai('reading', $reading);

        $hasil_total = $this->perhitungan_nilai($conv_listening,$conv_structure, $conv_reading);
        $data = [
            'status_test'   => 1,
            'tgl_test'      => date('Y-m-d'),
            'listening'     => $listening,
            'k_listening'   => $conv_listening,
            'structure'     => $structure,
            'k_structure'   => $conv_structure,
            'reading'       => $reading,
            'k_reading'     => $conv_reading,
            'total'         => $hasil_total
        ];
        // return response()->json($data);
        $store_soal = HasilSoal::where('id', $id)->first();
        if ($store_soal) {
            if($store_soal->update($data)){
                $res = $this->responses(true, "hasil test berhasil disimpan");
            }
        } else {
            $res = $this->responses(false, "id test tidak ditemukan");
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

    protected function perhitungan_nilai($listening, $structure, $reading)
    {
        $sum = $listening + $structure + $reading;
        $final_konversi = $sum * 10 / 3;
        return $final_konversi;
    }

    protected function konversi_nilai($type, $value)
    {
        $get = Conversion::where('type', $type)
            ->where('value', $value)
            ->first();
        if ($get!= null) {
            return intval($get->conversion);
        } else {
            return 0;
        }
    }
}
