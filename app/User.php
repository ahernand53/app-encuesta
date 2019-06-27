<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
    implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'survey_made'
    ];

    protected $guarded = [
        'survey_token',
        'remember_token'
    ];

    public function answers()
    {
        return $this->belongsToMany('App\Answer', 'users_answers');
    }

    protected $casts = [
        'survey_made' => 'boolean'
    ];
}
