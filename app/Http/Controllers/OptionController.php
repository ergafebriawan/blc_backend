<?php

namespace App\Http\Controllers;

use App\Models\JenisKelas;
use App\Models\RolePeserta;
use Illuminate\Http\JsonResponse;

class OptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function jenis_kelas(): JsonResponse{
        $jenis = JenisKelas::all();
        return response()->json($jenis);
    }

    public function role_peserta():JsonResponse{
        $role = RolePeserta::all();
        return response()->json($role);
    }

    
}
