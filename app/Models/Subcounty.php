<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcounty extends Model
{
    protected $fillable = [
        'countyname',
        'countycode',
        'subcountyname',
        'subcountycode',
    ];
}
