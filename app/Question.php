<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $with = ['answers'];

    protected $fillable = [
        'id',
        'title',
        'type',
    ];

    public function stage() {
        return $this->belongsTo('App\Stage');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

}
