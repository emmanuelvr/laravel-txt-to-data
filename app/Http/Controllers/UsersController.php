<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'type'  => [
                'required',
                Rule::in(['member', 'admin'])
            ],
            'password' => 'required|min:4|confirmed',
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return back()->withInput()->with('errors', $errors);
        }

        $user = new User($request->except('password'));
        $user->password = bcrypt($request->password);
        $user->save();

        Session::flash('success', __('user.saved'));

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        // $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => [
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'type'  => [
                'required',
                Rule::in(['member', 'admin'])
            ],
            'password' => 'nullable|min:4|confirmed',
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return back()->withInput()->with('errors', $errors);
        }

        $user->update($request->except('password'));
        if($request->password){
            $user->password = bcrypt($request->password);
            $user->save();
        }

        Session::flash('success', __('user.updated'));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('success', __('user.deleted'));
        return redirect()->route('users.index');
    }
}
