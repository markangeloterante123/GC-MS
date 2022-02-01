<?php

namespace App\Imports;

use App\Models\User;
use App\Models\FileRecord;
use App\Models\SalaryHistory;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements  ToModel, WithBatchInserts, WithChunkReading, WithStartRow
{
    //WithValidation
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $year = Carbon::now()->year;    
        $email = User::withTrashed()->where('email', '=', $row[21])->first();
        $user = User::latest('id')->first();
        $count = $user->id + 1;
        
        if($email == NULL){
            User::create([
                'name' => $row[1].' '.$row[2].' '.$row[3],
                'email' => $row[21],
                'is_admin'=> 0,
                'position'=>$row[5],
                'file'=> 1,
                'employement_status'=> $row[12],
                'password' => Hash::make('GoCrayons'.$year),
            ]);

            FileRecord::create ([
                'user_id'=>$count,
                'employee_id' => $row[0],
                'first_name' => $row[2],
                'last_name' => $row[1],
                'middle_name' => $row[3],
                'designation' => $row[4],
                'type_of_contract' => $row[6],
                'contracts' => $row[7],
                'notes' => $row[8],
                'date_hired' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9]),
                'proby_extension' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
                'regular_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[11]),
                'contract_status' => $row[13],
                'no_of_service' => $row[14],
                'sil_entitlement' => $row[15],
                'birthday' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[16]),
                'age' => $row[17],
                'gender' => $row[18],
                'marital_status' => $row[19],
                'cel_no' => $row[20],
                'work_email' => $row[21],
                'personal_email' => $row[22],
                'account_number' => $row[23],
                'TIN' => $row[24],
                'philhealth' => $row[25],
                'sss' => $row[26],
                'pagibig' => $row[27],
                'hmo' => $row[28],
                'address_1' => $row[29],
                'emergency_name' => $row[30],
                'emergency_relation' => $row[31],
                'emergency_contact' => $row[32],
                'emergency_name2' => $row[33],
                'emergency_relation2' => $row[34],
                'emergency_contact2' => $row[35],
            ]);
        }
     }
    
    public function batchSize(): int
    {
        return 1000;
    }
    
    public function chunkSize(): int
    {
        return 1000;
    }
}
