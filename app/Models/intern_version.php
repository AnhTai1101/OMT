<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class intern_version extends Authenticatable
{
    protected $primaryKey = 'guid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'intern_version';
    protected $fillable = ['guid','name','password','created_ar'];
    public $timestamps = false;
}
