<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'nationalID',
        'passwordrecovery',
        'active',
        'activationcode',
    ];
    public function messages()
{
    return $this->hasMany(Message::class);
}

}
