<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Stage extends Model
{

    protected $with = [
        'questions'
    ];

    protected $fillable = [
        'id',
        'title',
        'description'
    ];

    public function questions(){
        return $this->hasMany('App\Question');
    }

}
