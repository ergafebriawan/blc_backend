<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class RolePeserta extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'role_peserta';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama_role'
    ];
}