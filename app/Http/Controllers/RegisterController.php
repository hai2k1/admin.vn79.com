<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {

        $data = $request->all();
        $user =  User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->key =  $data['key'];
        $user->mobile =  $data['mobile'];
        $user->email = $data['email'];
        $user->password_withdraw = $data['password_withdraw'];
        $user->save();
        return $user;
    }
    public function registerdaili(Request $request){
        $data = $request->all();
        $user =  User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->key =  $data['key'];
        $user->mobile =  $data['mobile'];
        $user->email = $data['email'];

        if($data['daili']){
            $user->status = 0;
        }
        $user->save();
        RoleUser::create(['user_id'=>$user->id, 'role_id'=>3]);
        return $user;
    }
    public function addcard(Request $request){
        try {
            $data = $request->all();
            $user = User::find(auth('api')->user()->id);
            $user->bank = $data['bank'];
            $user->bank_id = $data['bank_id'];
            $user->bank_name = $data['bank_name'];
            $user->save();
            return $user;
        }
        catch (Exception $e){
            return response()->json('error',400);
        }
    }
}
