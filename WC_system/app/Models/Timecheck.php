<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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
}

class Employee extends Model
{
    public function timechecks($value)
    {
        return Carbon::parse($value)->setTimezone(config('app.timezone'))->toDateTimeString();
    }
}