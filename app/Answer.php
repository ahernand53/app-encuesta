<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    public function __construct(array $attributes = ['title'])
    {
        parent::__construct($attributes);
    }

    protected $table = 'answers';
    protected $fillable = [
        'title',
        'question_id'
    ];

    public function question() {
        return $this->belongsTo('App\Question');
    }

    public static function create(array $array) {
        $answers = [];


        return $answers;
    }

    public function users()
    {
        return $this->hasMany(
            'App\User'
        );
    }

}
