<?php

namespace App\Http\Controllers;
use App\Exports\ExportInformation;
use App\Imports\UsersImport;
use App\Models\User;
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
        $data = User::join('file_records', 'file_records.user_id', '=', 'users.id')
                    ->where('file_records.user_id', "=", $id)
              		->get();
        return view('pages.user.user-profile-information', compact('data'));
    }

    public function userInformations($id){
        $data = User::join('file_records', 'file_records.user_id', '=', 'users.id')
                    ->where('file_records.user_id', "=", $id)
              		->get();
        return view('pages.user.user-profile-information', compact('data'));
    }

    public function user_update(Request $request){
        
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
