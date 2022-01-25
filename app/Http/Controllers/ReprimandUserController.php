<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Options;
use App\Models\ReprimandDetail;
use App\Models\ReprimandUser;
use Illuminate\Http\Request;


class ReprimandUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $userId = $id;
        $opt = Options::all();
        $rept = ReprimandDetail::all();
        $reptRecord = ReprimandUser::where('user_id', $id)
            ->orderBy('id','desc')
            ->get();
        $userData = User::leftjoin('file_records', 'file_records.user_id', '=', 'users.id')
                    ->where('users.id', "=", $id)
              		->get();
        return view('pages.reprimand.reprimand_user', compact('userData', 'userId', 'opt', 'rept', 'reptRecord'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $userId)
    {
        ReprimandUser::create([
            'user_id'=>$userId,
            'issue_by'=>$request->issue_by,
            'type_of_offense'=>$request->type_of_offense,
            'date_given'=>$request->date_given,
            'no_of_offense'=>$request->no_of_offense,
            'detail_reports'=>$request->detail_reports,
            'status'=>'Delayed',
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
     * @param  \App\Models\ReprimandUser  $reprimandUser
     * @return \Illuminate\Http\Response
     */
    public function show(ReprimandUser $reprimandUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReprimandUser  $reprimandUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ReprimandUser $reprimandUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReprimandUser  $reprimandUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReprimandUser $reprimandUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReprimandUser  $reprimandUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReprimandUser $reprimandUser)
    {
        //
    }
}
