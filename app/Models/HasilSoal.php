<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HasilSoal extends Model
{
    protected $table = 'hasil_test';

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

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_peserta',
        'id_test',
        'kode_soal',
        'tgl_daftar',
        'tgl_test',
        'token', 
        'status_test',
        'listening',
        'k_listening',
        'structure',
        'k_structure',
        'reading',
        'k_reading',
        'total'
    ];
}