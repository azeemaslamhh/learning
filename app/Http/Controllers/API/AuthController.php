<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response, 400);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User Created Successfully'
        ];
        return response()->json($response, 200);
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['user'] = $user;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Login Successfully'
            ];
            return response()->json($response, 200);
        } else {

            $response = [
                'success' => false,
                'message' => "Unauthorized"
            ];
            return response()->json($response, 400);
        }
    }
    public function logout(Request $request)
    {
        $bearer_token = $request->bearerToken();
        if (PersonalAccessToken::findToken($bearer_token)) {
            $token = PersonalAccessToken::findToken($bearer_token);
            $token->delete();
            $response = [
                'success' => true,
                'message' => "logged out successfully"
            ];
            return response()->json($response, 200);
        } else {

            $response = [
                'success' => false,
                'message' => "You are not Login"
            ];

            return response($response, 400);
        }
    }


    public function updateUser(Request $request)
    {
        if (empty($request->input('name')) === false && empty($request->input('new_password')) === true) {
            $name = $request->name;
            $userid = $request->id;
            $user = User::find($userid);
            $user->update([
                'name' => $name,
            ]);

            $success['user'] = $user;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Updated Successfully',
            ];

            return response()->json($response, 200);
        } else if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {


            $name = $request->name;
            $userid = auth()->user()->id;
            $new_password = bcrypt($request->new_password);
            $user = User::find($userid);
            $user->update([
                'name' => $name,
                'password' => $new_password,
            ]);

            $success['user'] = $user;
            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User Updated Successfully',
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'success' => false,
                'message' => "Unauthorized"
            ];
            return response()->json($response, 400);
        }
    }
}
