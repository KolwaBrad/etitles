<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = [
        'title_id',
        'titledeed',
        'photograph',
        'countycode',
        'subcountyid',
        'location_name',
        'approximate_area',
        'market',
        'owner_id',
        'price',
    ];
}
