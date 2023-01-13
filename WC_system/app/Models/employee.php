<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'phone',
        'position'
    ];

    public function timechecks()
    {
        return $this->hasMany(Timecheck::class);
    }
}

class Timecheck extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}