<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('image')){
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'image uploaded.'); // success
        }
        return redirect()->back()->with('error', 'image not uploaded.'); // error
    }
    public function index()
    {
//        User::where('id',2)->delete();

//        $user = new User();
//        $user->name = 'hossein';
//        $user->email = 'kkk@hhh.ir';
//        $user->password = bcrypt('123');
//        $user->save();

//        User::where('id', 3)->update(['name' => 'uu']);

        $data = [
            'name' => 'mmm',
            'email' => 'mmm@mmm.ir',
            'password' => 'mmm',
        ];
//        User::create($data);

        $user = User::all();
        return $user;

//        $user = new User();
//        dd($user);
//        DB::insert('insert into users (name, email, password) values ( ?,?,?)', [
//            'hossein', 'hossein@test.com', '123'
//        ]);

//        $users = DB::select('select * from users');
//        return $users;

//        DB::update('update users set name = ? where id =1', ['mahsen']);
//        $users = DB::select('select * from users');
//        return $users;

//        DB::delete('delete from users where id = 1 ');
//        $users = DB::select('select * from users');
//        return $users;

        return view('home');
    }


}
