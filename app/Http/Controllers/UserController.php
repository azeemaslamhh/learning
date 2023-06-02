<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{


    public function index()
    {
        $view_data = [];
        $users = User::all();
        $view_data['users'] = $users;
        return view('users/index', $view_data);
    }


    function getUsers(Request $request)
    {

        $aColumns = ['users.id', 'users.name', 'users.email', 'roles.name', 'users.created_at'];

        // $result = DB::table("users")->select($aColumns)->where('id', '!=', 1);
        $result = DB::table('users')->join("roles", 'users.role_id', 'roles.id')->select(['users.id', 'users.name', 'users.email', 'roles.name as role_name', 'users.created_at']);

        $iStart = $request->get('iDisplayStart');
        $iPageSize = $request->get('iDisplayLength');

        if ($request->status != "")
            $result->where('u.status', $request->status);

        if ($request->get('iSortCol_0') != null) { //iSortingCols
            $sOrder = "ORDER BY  ";

            for ($i = 0; $i < intval($request->get('iSortingCols')); $i++) {
                if ($request->get('bSortable_' . intval($request->get('iSortCol_' . $i))) == "true") {
                    $sOrder .= $aColumns[intval($request->get('iSortCol_' . $i))] . " " . $request->get('sSortDir_' . $i) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = " id ASC";
            }
            $sOrder;
        }

        $OrderArray = explode(' ', $sOrder);
        $sKeywords = $request->get('sSearch');
        if ($sKeywords != "") {

            $result->Where(function ($query) use ($sKeywords) {
                $query->where('users.name', 'LIKE', "%{$sKeywords}%")->orWhere('users.email', 'LIKE', "%{$sKeywords}%")->orWhere('roles.name', 'LIKE', "%{$sKeywords}%");
            });
        }

        for ($i = 0; $i < count($aColumns); $i++) {
            $request->get('sSearch_' . $i);
            if ($request->get('bSearchable_' . $i) == "true" && $request->get('sSearch_' . $i) != '') {
                $result->orWhere($aColumns[$i], 'LIKE', "%" . $request->orWhere('sSearch_' . $i) . "%");
            }
        }

        $iFilteredTotal = $result->count();
        $iTotal = $iFilteredTotal;
        if ($iStart != null && $iPageSize != '-1') {
            $result->skip($iStart)->take($iPageSize);
        }

        $order = (isset($OrderArray[3])) ? trim($OrderArray[3]) : "DESC";
        $sort = (isset($OrderArray[4])) ? trim($OrderArray[4]) : "id";
        $result->orderBy($order, trim($sort));
        $userData = $result->get();

        $output = array(
            "sEcho" => intval($request->get('sEcho')),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        foreach ($userData as $aRow) {
            $id = $aRow->id;
            $created_at = date("M j, Y, g:i a", strtotime($aRow->created_at));

            $sOptions = '<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actions
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="' . route('users.show', $id) . '">Show</a>
                <a class="dropdown-item" href="' . route('users.edit', $id) . '">Edit</a>';
            if ($aRow->role_name != "admin") {
                $sOptions .= '<form action="' . route('users.destroy', $id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" onclick="return confirm(\'Are you sure?\')" class="dropdown-item">Delete</button>
                            </form>';
            }
            $sOptions .= '<a class="dropdown-item" href="' . route('users.change_password', $id) . '">Change Password?</a>
            </div>
        </div>';

            $output['aaData'][] = array(
                $id,
                @utf8_encode($aRow->name),
                @utf8_encode($aRow->email),
                @utf8_encode($aRow->role_name),
                @utf8_encode($created_at),
                $sOptions
            );
        }

        echo json_encode($output);
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

    public function change_password(User $user)
    {
        $roles = Role::all();
        return view('users.change_password', compact('user', 'roles'));
    }

    public function update_change_password(Request $request)
    {

        // echo "<pre>";
        // print_r( $request->all());
        // exit;
        // print_r($user->password);
        // print_r(bcrypt($request->password));

        // exit;

        $validator = Validator::make($request->all(), [
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.index')->with('error', 'User password updated failled.');
        }

        $user = User::find($request->id);
        $request['password'] = bcrypt($request['password']);
        $user->update($request->all());


        return redirect()->route('users.index')->with('success', 'User password updated successfully.');
    }





    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required'
        ]);
        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated all successfully.');
    }

    // public function update(Request $request, User $user)
    // {
    //     if (strcmp($request['password'],  $user->password) === 0) {
    //         Validator::make($request->all(), [
    //             'name' => 'required',
    //             'email' => 'required',
    //         ]);

    //         $user->update($request->only("name", "email", "role_id"));
    //         return redirect()->route('users.index')->with('success', 'User updated all successfully.');
    //     }
    //     Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'password-confirm' => 'required|same:password',
    //         'role_id' => 'required'
    //     ]);
    //     $request['password'] = bcrypt($request['password']);
    //     $user->update($request->all());

    //     return redirect()->route('users.index')->with('success', 'User updated all successfully.');
    // }

    // $user->roles()->detach($user->roles->first()->id);
    // $role_name_by_id = Role::findOrFail($request['role_id'])->name;
    // $getRole = Role::where('name', $role_name_by_id)->first();
    // $user->roles()->attach($getRole);


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password-confirm' => 'required|same:password',
        ]);
        $request['password'] = bcrypt($request['password']);
        // $role_name = Role::findOrFail($request['role_id'])->name;
        // $getRole = Role::where('name', $role_name)->first();
        // $user->roles()->attach($getRole);
        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
