<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'id',
        'title',
        'stage_id',
        'type_id',
    ];

    public function stage() {
        return $this->belongsTo('App\Stage');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function answers(){
        return $this->hasMany('App\Answer');
    }

}
