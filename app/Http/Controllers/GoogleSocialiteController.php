<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
      
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/login');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'is_admin'=> 0,
                    'position'=>'No Assign Role',
                    'employement_status'=>'Set Employment status',
                    'file'=>0,
                    'social_type'=> 'google',
                    'password' => encrypt('my-google')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/login');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
