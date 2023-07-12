<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CBlock extends Model
{
    protected $fillable = [
        'indexb',
        'owner_id',
        'title_id',
        'previousHash',
        'hash',
    ];
}
