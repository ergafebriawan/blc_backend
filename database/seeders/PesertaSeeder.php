<?php

namespace Database\Seeders;

use App\Models\Peserta;
use App\Models\JenisKelas;
use App\Models\RolePeserta;
use App\Models\Test;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $private = JenisKelas::select('id')->where('nama_kelas', 'private')->first();
        $reguler = JenisKelas::select('id')->where('nama_kelas', 'reguler')->first();

        $koordinator = RolePeserta::select('id')->where('nama_role', 'koordinator')->first();
        $anggota = RolePeserta::select('id')->where('nama_role', 'anggota')->first();

        $test = Test::select('jenis_test')->get();
        $data_test = [];
        foreach ($test as $t) {
            $data_test[$t->jenis_test] = false;
        }


        Peserta::create([
            "no_reg" => "09876543291",
            "role_kelas" => $reguler->id,
            "jenis_peserta" => $koordinator->id,
            "nama_peserta" => "fana merahjambu",
            "email" => "fana@gmail.com",
            "no_hp" => "0857xxxxxxxx",
            "gender" => "perempuan",
            "tgl_lahir" => "1998-03-21",
            "instansi" => "Fakultas Hukum",
            "alamat" => "Malang",
            "active_test" => json_encode($data_test)
        ]);

        Peserta::create([
            "no_reg" => "09809843291",
            "role_kelas" => $reguler->id,
            "jenis_peserta" => $anggota->id,
            "nama_peserta" => "senandung sendu",
            "email" => "sendu@gmail.com",
            "no_hp" => "0857xxxxxxxx",
            "gender" => "perempuan",
            "tgl_lahir" => "1998-05-12",
            "instansi" => "Fakultas Ekonomi",
            "alamat" => "Surabaya",
            "active_test"   => json_encode($data_test)
        ]);

        Peserta::create([
            "no_reg" => "09825943291",
            "role_kelas" => $reguler->id,
            "jenis_peserta" => $anggota->id,
            "nama_peserta" => "gagah prakoso",
            "email" => "prakoso@gmail.com",
            "no_hp" => "0857xxxxxxxx",
            "gender" => "laki-laki",
            "tgl_lahir" => "2000-02-10",
            "instansi" => "Fakultas Teknik",
            "alamat" => "Biltar",
            "active_test"   => json_encode($data_test)
        ]);

        Peserta::create([
            "no_reg" => "098765432342",
            "role_kelas" => $private->id,
            "jenis_peserta" => $koordinator->id,
            "nama_peserta" => "dilema senja",
            "email" => "senja@gmail.com",
            "no_hp" => "0857xxxxxxxx",
            "gender" => "laki-laki",
            "tgl_lahir" => "1999-08-14",
            "instansi" => "PNS",
            "alamat" => "Blitar",
            "active_test"   => json_encode($data_test)
        ]);
    }
}
