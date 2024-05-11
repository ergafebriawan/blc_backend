<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Soal extends Model
{
    protected $table = 'soal';

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
        'index',
        'type_test',
        'type_soal', 
        'test',
        'page_title',
        'page_subtitle',
        'title',
        'subtitle',
        'content',
        'paragraph_title',
        'paragraph',
        'no',
        'a',
        'b',
        'c',
        'd',
        'key',
        'timer',
    ];
}