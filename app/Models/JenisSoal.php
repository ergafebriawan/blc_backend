<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JenisSoal extends Model
{
    protected $table = 'jenis_soal';

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
        'type_soal'
    ];
}