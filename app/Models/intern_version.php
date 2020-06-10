<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class intern_version extends Model
{
    protected $primaryKey = 'guid';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'intern_version';
    protected $fillable = ['guid','name','created_ar'];
    public $timestamps = false;
}
