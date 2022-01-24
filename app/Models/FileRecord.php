<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id',
        'first_name',
        'last_name',
        'middle_name',
        'designation',
        'type_of_contract',
        'contracts',
        'notes',
        'date_hired',
        'proby_extension',
        'regular_date',
        'contract_status',
        'no_of_service',
        'sil_entitlement',
        'birthday',
        'age',
        'gender',
        'marital_status',
        'cel_no',
        'work_email',
        'personal_email',
        'account_number',
        'TIN',
        'philhealth',
        'sss',
        'pagibig',
        'hmo',
        'address_1',
        'emergency_name',
        'emergency_relation',
        'emergency_contact',
        'emergency_name2',
        'emergency_relation2',
        'emergency_contact2',
        'pay_slip_link',
    ];

}
