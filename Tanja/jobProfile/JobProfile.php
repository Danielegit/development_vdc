<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProfile extends Model
{
    protected $fillable = ['name','importance'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
