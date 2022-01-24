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
                'employee_id'=> $request->employee_id,
                'first_name' => $request->first_name,
                'last_name'=> $request->last_name,
                'middle_name'=>$request->middle_name,
                'designation'=>$request->designation,
                'type_of_contract'=>$request->type_of_contract,
                'contracts'=>$request->contracts,
                'notes'=>$request->notes,
                'date_hired'=>$request->date_hired,
                'proby_extension'=> $request->proby_extension,
                'regular_date'=>$request->regular_date,
                'contract_status'=> $request->contract_status,
                'no_of_service'=> $request->no_of_service,
                'sil_entitlement'=> $request->sil_entitlement,
                'birthday'=>$request->birthday,
                'age'=>$request->age,
                'gender'=>$request->gender,
                'marital_status'=>$request->marital_status,
                'cel_no'=>$request->cel_no,
                'work_email'=>$request->work_email,
                'personal_email'=>$request->email,
                'account_number'=>$request->account_number,
                'TIN'=>$request->TIN,
                'philhealth'=>$request->philhealth,
                'sss'=>$request->sss,
                'pagibig'=>$request->pagibig,
                'hmo'=>$request->hmo,
                'address_1'=>$request->address_1,
                'emergency_name'=>$request->emergency_name,
                'emergency_relation'=>$request->emergency_relation,
                'emergency_contact'=>$request->emergency_contact,
                'emergency_name2'=>$request->emergency_name,
                'emergency_relation2'=>$request->emergency_relation,
                'emergency_contact2'=>$request->emergency_contact,
                'pay_slip_link'=>$request->pay_slip_link,
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
