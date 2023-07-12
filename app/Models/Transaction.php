<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'title_id',
        'location_name',
        'owner_id',
        'owner_fname',
        'owner_lname',
        'bidder_id',
        'bidder_fname',
        'bidder_lname',
        'admin_id',
        'admin_fname',
        'admin_lname',
        'cost',
        'owner_approve',
        'bidder_approve',
        'admin_approve',
        'bank_statement',
        'transfer',
    ];
}
