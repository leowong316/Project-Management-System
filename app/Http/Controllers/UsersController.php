<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        User::create([
            'name' => request('name'),
            'position' => request('position'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'salary' => request('salary'),
            'type' => request('type')
        ]);

        return redirect('/users');
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(User $user)
    {
        $user->name = request('name');
        $user->position = request('position');
        $user->email = request('email');
        $user->salary = request('salary');
        $user->type = request('type');
        $user->save();

        return redirect('users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function show(Project $project)
    {
        return view('users.show',compact('project'));
    }
}
