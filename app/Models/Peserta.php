<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Peserta extends Model
{
    protected $table = 'peserta';

    protected static function boot(){
        parent::boot();
        static::creating(function ($model){
            if(!$model->getKey()){
                $model->{$model->getKeyName()} = (string) Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected $fillable = [
        'no_reg', 
        'role_kelas',
        'jenis_peserta',
        'nama_peserta',
        'email',
        'no_hp',
        'gender',
        'tgl_lahir',
        'instansi',
        'alamat'
    ];
}