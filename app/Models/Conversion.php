<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Conversion extends Model
{
    protected $table = 'conversion';

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
        'type',
        'value',
        'conversion'
    ];
}