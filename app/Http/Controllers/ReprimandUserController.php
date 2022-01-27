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
            'status'=>'Require Explanation',
        ]);
        return redirect()->back()->with('status','File Created Successfully');
    }


    // Resolving the cased of reprimand
    public function actions(Request $request, $id)
    {
        $data = ReprimandUser::find($id);
        $data->status = 'Resolved';
        $data->update($request->all());
        return redirect()->back()->with('status','Updated Successfully');
    }

    // Get all the records of reprimand
    public function all_records()
    {
        $active = User::rightjoin('reprimand_users', 'reprimand_users.user_id', '=', 'users.id')
                    ->where('reprimand_users.written_explanation', "=", NULL)
                    ->orderBy('reprimand_users.id','desc')
              		->get();
        $answer = User::rightjoin('reprimand_users', 'reprimand_users.user_id', '=', 'users.id')
                    ->where('reprimand_users.written_explanation', "!=", NULL)
                    ->where('reprimand_users.actions_taken', "=", NULL)
                    ->orderBy('reprimand_users.id','desc')
              		->get();
        return view('pages.reprimand.reprimands_records', compact('active', 'answer'));
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

    public function explination(Request $request, $id){
            $data = ReprimandUser::find($id);
            $data->written_explanation = $request->written_explanation;
            $data->explanation_date = \Carbon\Carbon::now();
            $data->status = 'Answered';
            $data->update($request->all());
            return redirect()->back()->with('status','Updated Successfully');
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
