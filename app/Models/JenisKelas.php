<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JenisKelas extends Model
{
    protected $table = 'jenis_kelas';

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
        'nama_kelas'
    ];
}