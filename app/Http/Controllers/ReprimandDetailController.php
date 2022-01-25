<?php

namespace App\Http\Controllers;

use App\Models\ReprimandDetail;
use Illuminate\Http\Request;

class ReprimandDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = ReprimandDetail::orderBy('id', 'desc')->get();
        return view('pages.reprimand.reprimand', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $author)
    {
        //
        ReprimandDetail::create([
            'type_of_offense'=>$request->type_of_offense,
            'details'=>$request->details,
            'no_of_offense'=>$request->no_of_offense,
            'author_by'=>$author,
        ]);
        return redirect()->back()->with('status','File Created Successfully');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReprimandDetail  $reprimandDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ReprimandDetail $reprimandDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReprimandDetail  $reprimandDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ReprimandDetail::find($id);
        return view('pages.reprimand.reprimand_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReprimandDetail  $reprimandDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = ReprimandDetail::find($id);
        $data->update($request->all());
        return redirect()->back()->with('update','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReprimandDetail  $reprimandDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ReprimandDetail::find($id);
        $data->delete();
        return redirect()->back();
    }
}
