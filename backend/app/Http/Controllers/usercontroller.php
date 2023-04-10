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
                'token' => $token
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
    public function addauthor(String $id){
        $user = user::find($id);
        $user->role = '2';
        $user->save();
        return response($user,201);
    }
    public function removeauthor(String $id){
        $user = user::find($id);
        $user->role = '1';
        $user->save();
        return response($user,201);
    }
    public function statistics(){
        $users = user::where('role','0')->count();
        $authors = user::where('role','2')->count();
        $categories = Pcategorie::count();
        $products = product::count();
        return response([
           'user' => $users,
           'author' => $authors,
           'categories' => $categories,
           'products' => $products
        ]); 
    }
}
