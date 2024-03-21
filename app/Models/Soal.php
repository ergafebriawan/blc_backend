<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Soal extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'soal';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'jenis_test',
        'type', 
        'test',
        'page',
        'title',
        'content',
        'timer',
        'audio'
    ];
}