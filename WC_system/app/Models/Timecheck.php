<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timecheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'location',
        'check_image'
    ];
}