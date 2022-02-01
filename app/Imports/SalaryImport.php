<?php

namespace App\Imports;
use Illuminate\Http\Request;
use App\Models\SalaryHistory;
use App\Models\FileRecord;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class SalaryImport  implements  ToModel, WithBatchInserts, WithChunkReading, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $days = 0;
        //get the User ID
        $employee_id = FileRecord::where('employee_id', '=', $row[2] )->get();
        foreach ($employee_id as $info) { 
            $user_id = $info->user_id ; 
        }
        //get the latest Update of Records
        $salaryRec = SalaryHistory::where('user_id', '=', $user_id)
                    ->where('status', '=', 1)
                    ->get();
        //check the defference of date from last update to the new uploading data
        foreach ($salaryRec as $rec){
            $date1 = $rec->effective_date;
            $date2 = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]);
            $dateCon1 = \Carbon\Carbon::parse($date1);
            $dateCon2 = \Carbon\Carbon::parse($date2);
            $days = $dateCon1->diffInDays($dateCon2);
        }
        
        
        if($days >= 7){
            $history = SalaryHistory::where('user_id', '=', $user_id)
            ->update(['status' => 0]);
        }  

        $trim_salary = $row[5];
        $slr = str_replace(',', '', $trim_salary);

        SalaryHistory::Create([
            'user_id' => $user_id,
            'salary' => $slr,
            'type' => $row[3],
            'notes' => $row[4],
            'effective_date' =>\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[6]),
            'status'=> 1,
        ]);
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
