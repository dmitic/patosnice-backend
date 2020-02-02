<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
         return view('administratori.dashboard', compact('users'));
    }

    public function create(){
        return view('administratori.add_admin');
    }

    public function edit(User $user){
        return view('administratori.edit_admin', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'username' => 'required',
        //     'password' => 'required|min:8',
        //     'email' => 'required',
        //     'is_active' => 'required|max:1',
        // ]);


        $user->update($request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required',
            'is_active' => 'required|max:1',
        ]));

        // $user->fill($request->only([
        //     'name' => request()->name,
        //     'username' => request()->username,
        //     'password' => request()->password,
        //     'email' => request()->email,
        //     'is_active' => request()->is_active,
        //     'prioritet' => request()->prioritet ?? 2,
        // ]));
        // $user->save();

        // $user->update($request->all());

        $user->update([
            'name' => request()->name,
            'username' => request()->username,
            'password' => request()->password,
            'email' => request()->email,
            'is_active' => request()->is_active,
            'prioritet' => request()->prioritet ?? 2,
        ]);

        return redirect('/home')->withErrors(['poruka' => 'Administrator je uspešno izmenjen!']);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'email' => 'required|max:100|email:rfc|unique:users,email',
            'is_active' => 'required|max:1',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->prioritet = $request->prioritet ?? 2;
        $user->is_active = $request->is_active;
        $user->save();

        return redirect('/home')->withInput()->withErrors(['poruka' => 'Administrator je uspešno dodat!']);
    }

    public function status(User $user){
        $user->update(['is_active' => ! $user->is_active]);
        return back()->withErrors(['poruka' => 'Administrator je aktiviran/deaktiviran!']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/home')
                    ->withErrors(['poruka' => 'Administrator je obrisan!']);
    }
}
