<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerEmployee extends Model
{
	public function userEmployee()
    {
        return $this->belongsTo('App\User', 'FK_user');
    }
    protected $fillable = ['date_birth','description','FK_user','FK_company'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}
