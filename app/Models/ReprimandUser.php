<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReprimandUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type_of_offense',
        'detail_reports',
        'no_of_offense',
        'issue_by',
        'date_given',
        'status',
        'written_explanation',
        'explanation_date',
        'actions_taken',
    ];
}
