<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulting extends Model
{
    protected $fillable = [
        'title',
    	'type',
    	'duration',
    	'consult_date',
    	'country',
    	'city',
    	'zipCode',
    	'street',
    	'FK_trainer',
    	'FK_consultant',
        'consult_limit'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
    public function consultingTrainer()
    {
        return $this->belongsTo('App\User', 'FK_trainer');
    }
    public function consultingConsultant()
    {
        return $this->belongsTo('App\User', 'FK_consultant');
    }
}
