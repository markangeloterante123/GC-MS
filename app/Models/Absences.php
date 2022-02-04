<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absences extends Model
{
    use HasFactory;
    protected $fillable = [
        'entryId',
        'year',
        'month',
        'date',
        'employee_id',
        'user_id',
        'reason',
        'day',
    ];
}
