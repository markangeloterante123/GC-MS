<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReprimandDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_of_offense',
        'details',
        'no_of_offense',
        'author_by',
    ];
}
