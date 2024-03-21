<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Peserta extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'peserta';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'no_reg', 
        'role_kelas',
        'jenis_peserta',
        'nama',
        'email',
        'no_hp',
        'gender',
        'tgl_lahir',
        'instansi',
        'alamat'
    ];
}