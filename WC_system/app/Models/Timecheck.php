<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\setTimezone;

class Timecheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'location',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->setTimezone(config('app.timezone'))->toDateTimeString();
    }
}

class Employee extends Model
{
    public function timechecks()
    {
        return $this->hasMany(Timecheck::class);
    }
}