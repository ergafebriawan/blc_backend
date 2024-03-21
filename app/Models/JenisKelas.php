<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class JenisKelas extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'jenis_kelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_kelas'
    ];
}