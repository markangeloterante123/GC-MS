<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'middle_name',
        'birthday',
        'gender',
        'marital_status',
        'spouce_name',
        'spouce_work',
        'no_children',
        'personal_email',
        'phone_no',
        'cel_no',
        'address_1',
        'address_2',
        'emergency_name',
        'emergency_relation',
        'emergency_contact',
        'pay_slip_link',
        'date_hired',
        'update_request',
        'date_end',
        'contract_status',
        'work_email',
    ];

}
