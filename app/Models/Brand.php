<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    // If your table name is not "brands" (default), specify it
    protected $table = 'master_brand';

    // Fillable columns
    protected $fillable = [
        'code',
        'name',
        'status',
    ];
}
