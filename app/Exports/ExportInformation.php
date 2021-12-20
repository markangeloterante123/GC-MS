<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportInformation implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return User::all();
    }

    public function headings(): array
    {
        return [
            'Id', 'Name', 'Email', 'Email Verified', 'Created At', 'Updated At'
        ];
    }
}
