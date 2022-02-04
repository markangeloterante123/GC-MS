<?php

namespace App\Http\Controllers;

use App\Models\Absences;
use App\Models\User;
use App\Models\FileRecord;
use Illuminate\Http\Request;
use App\Imports\AbsencesImport;
use Maatwebsite\Excel\Facades\Excel;

class AbsencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::orderby('name','asc')->get();
        $history = FileRecord::join('absences', 'absences.user_id', '=', 'file_records.user_id')
            ->orderby('absences.year','desc')
            ->orderby('file_records.last_name','asc')
            ->paginate(100);
            
        $records = FileRecord::join('absences', 'absences.user_id', '=', 'file_records.user_id')
            ->orderby('absences.year','desc')
            ->orderby('absences.id','asc')
            ->get(); 
        return view('pages.absences.absence', compact('data','records','history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $id  =  $request->user_id;
        $file = FileRecord::find($id);
        $date = $request->date;
        $year = \Carbon\Carbon::parse($date)->format('Y');
        $month = \Carbon\Carbon::parse($date)->format('F');
        $date = \Carbon\Carbon::parse($date)->format('d');
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
            'employee_id' => $file->employee_id,
            'user_id' => $id,
            'reason'=> $request->reason,
            'day'=>$request->day_form
        ]);
        return redirect()->back()->with('status','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absences  $absences
     * @return \Illuminate\Http\Response
     */
    public function show(Absences $absences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absences  $absences
     * @return \Illuminate\Http\Response
     */
    public function edit(Absences $absences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absences  $absences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absences $absences)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absences  $absences
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absences $absences)
    {
        //
    }

    public function import(Request $request)
    {
        config(['excel.import.startRow' => 2]);
        Excel::import(new AbsencesImport, $request->file('file'));
        return back()->with('success', 'Absence imported successfully');
    }
}
