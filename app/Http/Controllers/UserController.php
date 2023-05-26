<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    public function index()
    {
        $view_data = [];
        $users = User::all();
        // $users = User::where('id', '!=', auth()->id())->get();
        $view_data['users'] = $users;
        return view('users/index', $view_data);
    }

    public function search_list(Request $request)
    {
        $search = $request["search"] ?? "";
        $view_data = [];
        $users = "";
        if ($search != "") {
            $users = User::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        } else {
            $users = User::all();
        }
        $view_data['users'] = $users;
        return view('users/index', $view_data);
    }

    public function filter_list(Request $request)
    {
        $sort_order = $request["sort_order"] ?? "";
        $order_by = $request["order_by"] ?? "";
        $view_data = [];
        $users = User::orderBy($order_by, $sort_order)->get();
        $view_data['users'] = $users;
        return view('users/index', $view_data);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('users/create', compact('roles'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {

        if (strcmp($request['password'],  $user->password) === 0) {
            Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
            ]);

            $user->update($request->only("name", "email"));
            $user->roles()->detach($user->roles->first()->id);
            $role_name_by_id = Role::findOrFail($request['role_id'])->name;
            $getRole = Role::where('name', $role_name_by_id)->first();
            $user->roles()->attach($getRole);
            return redirect()->route('users.index')->with('success', 'User updated all successfully.');
        }
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);
        $request['password'] = bcrypt($request['password']);
        $user->update($request->all());
        $user->roles()->detach($user->roles->first()->id);
        $role_name_by_id = Role::findOrFail($request['role_id'])->name;
        $getRole = Role::where('name', $role_name_by_id)->first();
        $user->roles()->attach($getRole);
        return redirect()->route('users.index')->with('success', 'User updated all successfully.');
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        $role_name = Role::findOrFail($request['role_id'])->name;
        $getRole = Role::where('name', $role_name)->first();
        $user->roles()->attach($getRole);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
