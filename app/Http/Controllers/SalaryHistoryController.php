<?php

namespace App\Http\Controllers;

use App\Models\SalaryHistory;
use Illuminate\Http\Request;

class SalaryHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        //
        $trim_salary = $request->salary;
        $slr = str_replace(',', '', $trim_salary);
        SalaryHistory::create([
            'user_id' => $id,
            'salary' => $slr,
            'type' => $request->type,
            'notes' => $request->notes,
            'effective_date' => $request->effective_date,
            'end_date' => $request->end_date,
            'status' => 1,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryHistory  $salaryHistory
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryHistory $salaryHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryHistory  $salaryHistory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary = SalaryHistory::find($id);
        $salary->status = 0;
        $salary->update();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryHistory  $salaryHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryHistory $salaryHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryHistory  $salaryHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryHistory $salaryHistory)
    {
        //
    }
}
