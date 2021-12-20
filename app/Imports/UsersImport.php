<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToModel, WithHeadingRow
{
    //WithValidation
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function model(array $row)
    {
        $email = User::where('email', '=', $row['email'])->first();
        if($email == NULL){
            return new User([
                'name' => $row['name'],
                'email' => $row['email'],
                'position' => $row['position'], 
                'employement_status'=> $row['status'],
                'password'=>Hash::make('12345678'),
                'is_admin'=>0,
                'file'=>0
            ]);
        }
    }

}
