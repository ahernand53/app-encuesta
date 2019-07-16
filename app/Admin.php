<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
    implements Authenticatable, CanResetPassword
{
    use \Illuminate\Auth\Passwords\CanResetPassword;
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;

    const ACCOUNT_VERIFIED = 1;
    const ACCOUNT_NOT_VERIFIED = 0;

    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
        'profile_picture',
        'document_type',
        'document_number',
        'isSuper',
        'token_verification'
    ];

    protected $guarded = [
        'account_verified',
        'remember_token',
        'password',
        'created_at',
        'updated_at'
    ];

    public function type() {
        return $this->isSuper ? 'ROOT' : 'ADMIN';
    }

    public function isVerified() {
        return $this->account_verified;
    }


}
