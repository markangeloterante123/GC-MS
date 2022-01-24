<?php

namespace App\Http\Controllers;
use App\Exports\ExportInformation;
use App\Imports\UsersImport;
use App\Models\User;
use App\Models\FileRecord;
use App\Models\Options;
use App\Models\SalaryHistory;
use App\Models\ClientInformation;
use Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.user-data', [
            'user' => User::class
        ]);
    }

    public function user_file(){
        $id = Auth::user()->id;
        $userId = $id;
        $opt = Options::all();
        $history = SalaryHistory::where('user_id', "=", $id)
            ->orderBy('id', 'desc')
            ->get();
        $data = User::leftjoin('file_records', 'file_records.user_id', '=', 'users.id')
                    ->where('users.id', "=", $id)
              		->get();
        return view('pages.user.user-profile-information', compact('data','userId','opt','history'));
    }

    public function userInformations($id){
        $userId = $id;
        $opt = Options::all();
        $history = SalaryHistory::where('user_id', "=", $id)
            ->orderBy('id', 'desc')
            ->get();
        $data = User::leftjoin('file_records', 'file_records.user_id', '=', 'users.id')
                    ->where('users.id', "=", $id)
              		->get();
        return view('pages.user.user-profile-information', compact('data','userId','opt','history'));
    }

    public function user_update(Request $request, $id){
        $user = User::find($id);
        $file = FileRecord::where('user_id',$id) -> first();
        if (is_null($file)) {
            //create new records
            FileRecord::create([
                'user_id' => $id,
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'middle_name'=>$request->middle_name,
                'birthday'=>$request->birthday,
                'gender'=>$request->gender,
                'personal_email'=>$request->email,
                'phone_no'=>$request->phone_no,
                'cel_no'=>$request->cel_no,
                'address_1'=>$request->address_1,
                'address_2'=>$request->address_2,
                'emergency_name'=>$request->emergency_name,
                'emergency_relation'=>$request->emergency_relation,
                'emergency_contact'=>$request->emergency_contact,
                'pay_slip_link'=>$request->pay_slip_link,
                'date_hired'=>$request->date_hired,
                'work_email'=>$request->work_email,
                'update_request'=>0,
                'date_end'=>$request->date_end,
                'contract_status'=>'Interns',
            ]);
            //update the records file
            $user->file = 1;
            $user->update($request->all());
            return redirect()->back()->with('status','File Created Successfully');
        }
        //update file information 
        $file->update($request->all());
        //update user file status
        $user->file = 1;
        $user->update($request->all());
        return redirect()->back()->with('status','Updated Successfully');
    }  

    public function export()
    {
        $date = date ('Y - m - d');
        return Excel::download(new ExportInformation, 'Employee_Records_'.$date.'.xls');
    }

    /**
     * Import User View
     *
     * @return void
     */
    /**
     * Import User data through sheet
     *
     * @return void
     */
    public function import(Request $request)
    {   
        config(['excel.import.startRow' => 2]);
        Excel::import(new UsersImport, $request->file('file'));
        return back()->with('success', 'Users imported successfully');
    }
}
