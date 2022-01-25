<?php

namespace App\Http\Controllers;

use App\Models\memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = memo::orderBy('id', 'desc')->paginate(10);
        return view('pages.memo.memo', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $author)
    {
        memo::create([
            'memo_title'=>$request->memo_title,
            'content'=>$request->content,
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
     * @param  \App\Models\memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show(memo $memo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = memo::find($id);
        return view('pages.memo.memo_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Memo::find($id);
        $data->update($request->all());
        return redirect()->back()->with('update','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Memo::find($id);
        $data->delete();
        return redirect()->back()->with('status_delete','File Successfully deleted');
    }
}
