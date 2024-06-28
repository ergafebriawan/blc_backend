<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Peserta;
use App\Models\HasilSoal;

class UserTestController extends Controller
{
    function login_peserta(Request $request):JsonResponse{
        $this->validate($request, [
            'nik' => 'required|string',
            'kode' => 'required|string',
        ]);
        
        $nik = $request->input('nik');
        $kode = $request->input('kode');

        $get_peserta = HasilSoal::join('peserta', 'hasil_test.id_peserta', '=', 'peserta.id')
                            ->select(
                                'peserta.id as id_peserta',
                                'peserta.no_reg as nik',
                                'hasil_test.kode_soal as kode'
                            )
                            ->where('peserta.no_reg', $nik)
                            ->get();
        return response()->json($get_peserta);
    }
}