<?php

namespace App\Http\Controllers;

use App\Models\TirednessRec;
use App\Models\User;
use App\Models\FileRecord;
use Illuminate\Http\Request;
use App\Imports\Tirediness;
use Maatwebsite\Excel\Facades\Excel;


class TirednessRecController extends Controller
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
        $history = FileRecord::join('tiredness_recs', 'tiredness_recs.user_id', '=', 'file_records.user_id')
            ->orderby('tiredness_recs.year','desc')
            ->orderby('file_records.last_name','asc')
            ->paginate(100);
            
        $records = FileRecord::join('tiredness_recs', 'tiredness_recs.user_id', '=', 'file_records.user_id')
            ->orderby('tiredness_recs.year','desc')
            ->orderby('tiredness_recs.id','asc')
            ->get(); 
        return view('pages.tirediness.tirediness', compact('data', 'records', 'history'));
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
        $ent = TirednessRec::latest('id')->first();
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
    
        TirednessRec::create([
            'entryId' => $entry_id,
            'year' => $year,
            'month' => $month,
            'date' => $date,
            'employee_id' => $file->employee_id,
            'user_id' => $id,
            'reason'=> $request->reason,
            'minutes'=>$request->minutes
        ]);
        return redirect()->back()->with('status','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TirednessRec  $tirednessRec
     * @return \Illuminate\Http\Response
     */
    public function show(TirednessRec $tirednessRec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TirednessRec  $tirednessRec
     * @return \Illuminate\Http\Response
     */
    public function edit(TirednessRec $tirednessRec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TirednessRec  $tirednessRec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TirednessRec $tirednessRec)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TirednessRec  $tirednessRec
     * @return \Illuminate\Http\Response
     */
    public function destroy(TirednessRec $tirednessRec)
    {
        //
    }

    public function import(Request $request)
    {
        config(['excel.import.startRow' => 2]);
        Excel::import(new Tirediness, $request->file('file'));
        return back()->with('success', 'Tirediness records imported successfully');
    }
}
