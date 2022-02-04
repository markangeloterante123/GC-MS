<?php

namespace App\Imports;

use Illuminate\Http\Request;
use App\Models\Absences;
use App\Models\FileRecord;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Carbon\Carbon;

class AbsencesImport implements ToModel, WithBatchInserts, WithChunkReading, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row){
        $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]); 
        $year = \Carbon\Carbon::parse($date)->format('Y');
        $month = \Carbon\Carbon::parse($date)->format('F');
        $date = \Carbon\Carbon::parse($date)->format('d');

        $id  =  (int)$row[2];
        $file = FileRecord::where('employee_id', "=", $id)->get();
        foreach ($file as $file) { 
            $user_id = $file->user_id ; 
        }

        $ent = Absences::latest('id')->first();

        if($ent == NULL){
            $entry = 1;
        }
        else {
            $entry = $ent->id + 1 ;
        }

        if($entry <= 9){
            $entry_id = 'TDID-00000'.$entry;
        }
        elseif($entry <= 99){
            $entry_id = 'TDID-0000'.$entry;
        }
        elseif($entry <= 999){
            $entry_id = 'TDID-000'.$entry;
        }
        elseif($entry <= 9999){
            $entry_id = 'TDID-00'.$entry;
        }
        elseif($entry <= 99999){
            $entry_id = 'TDID-0'.$entry;
        }
        else{
            $entry_id = 'TDID-'.$entry;
        }
       

        Absences::create([
            'entryId' => $entry_id,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'employee_id' => $id,
            'user_id' => $user_id,
            'reason'=> $row[5],
            'day'=> $row[1]
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
