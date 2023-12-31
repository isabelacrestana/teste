<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // $user = User::where('id', $id)->first();
        if (! $user = User::find($id))
            return redirect()->route('users.index');
              
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request -> all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect() -> route('users.index');

        //dd($request -> only([
        //    'name', 'email', 'password'
        //]));
    }
}
