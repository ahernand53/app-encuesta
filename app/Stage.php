<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Stage extends Model
{

    protected $fillable = [
        'id',
        'title',
        'description'
    ];

    public function questions(){
        return $this->hasMany('App\Question');
    }

}
