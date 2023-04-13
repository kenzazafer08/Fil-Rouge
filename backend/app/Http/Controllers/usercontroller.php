<?php

namespace App\Http\Controllers;

use App\Models\Pcategorie;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
            $token = $user->createToken('my-app-token')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
                'role' => $user->role
            ];
        
             return response($response, 201);
    }
    function Users(){
        return response(['users' => User::all()]);
    }
    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    $token = $user->createToken('my-app-token')->plainTextToken;

    $response = [
        'user' => $user,
        'token' => $token
    ];

    return response($response, 201);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response(['message' => 'Logged out'], 200);
    }
    public function author(){
        return response(['users' => User::where('role','2')]);
    }
    public function changerole(String $id,Request $request){
        $user = user::find($id);
        $user->role = $request->role;
        $user->save();
        return response($user,201);
    }
    public function remove(String $id){
        $user = user::find($id);
        $user->delete();
        return response($user,201);
    }
    public function statistics(){
        $users = user::count();
        $categories = Pcategorie::count();
        $products = product::count();
        return response([
           'user' => $users,
           'categories' => $categories,
           'products' => $products
        ]); 
    }
    public function show(String $id){
        $user = user::find($id);
        return response($user);
    }
}
