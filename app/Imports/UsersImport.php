<?php

namespace App\Imports;

use App\Models\User;
use App\Models\FileRecord;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;



class UsersImport implements ToCollection, WithStartRow
{
    //WithValidation
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable;

    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {   
        // $user = User::latest('id')->first();
        // $file = FileRecord::latest('user_id')->first();
        // if($user >= $file){
        //     $count = $user->id;
        // }
        // else{
        //     $count = $file->id;
        // }
        
        foreach ($rows as $row) {
            $email = User::where('email', '=', $row[21])->first();
            $year = \Carbon\Carbon::now()->format('Y');

            if($email == NULL){
                User::create([
                    'name' => $row[1],
                    'email' => $row[21],
                    'position' => $row[5], 
                    'employement_status'=> $row[12],
                    'password'=>Hash::make('GoCrayons'.$year),
                    'is_admin'=>0,
                    'file'=>0
                ]);
            }

            // if($email == NULL){
            //     FileRecord::create([
            //         'user_id'=>$count+1,
            //         'employee_id' => $row[0],
            //         'first_name' => $row[2],
            //         'last_name' => $row[1],
            //         'middle_name' => $row[3],
            //         'designation' => $row[4],
            //         'type_of_contract' => $row[6],
            //         'contracts' => $row[7],
            //         'notes' => $row[8],
            //         'date_hired' => $row[9],
            //         'proby_extension' => $row[10],
            //         'regular_date' => $row[11],
            //         'contract_status' => $row[13],
            //         'no_of_service' => $row[14],
            //         'sil_entitlement' => $row[15],
            //         'birthday' => $row[16],
            //         'age' => $row[17],
            //         'gender' => $row[18],
            //         'marital_status' => $row[19],
            //         'cel_no' => $row[20],
            //         'work_email' => $row[21],
            //         'personal_email' => $row[22],
            //         'account_number' => $row[23],
            //         'TIN' => $row[24],
            //         'philhealth' => $row[25],
            //         'sss' => $row[26],
            //         'pagibig' => $row[27],
            //         'hmo' => $row[28],
            //         'address_1' => $row[29],
            //         'emergency_name' => $row[30],
            //         'emergency_relation' => $row[31],
            //         'emergency_contact' => $row[32],
            //         'emergency_name2' => $row[33],
            //         'emergency_relation2' => $row[34],
            //         'emergency_contact2' => $row[35],
            //     ]);
            // }
        }
    }

}
