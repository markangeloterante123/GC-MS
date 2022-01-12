<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'salary',
        'type',
        'notes',
        'effective_date',
        'end_date',
        'status',
    ];
}
