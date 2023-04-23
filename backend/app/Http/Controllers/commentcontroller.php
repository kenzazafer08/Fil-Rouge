<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment;

class commentcontroller extends Controller
{
    public function store(Request $request,$id){
        $id_product = $id;
        $id_user = Auth::id();
        $comment = comment::create([
            'post_id' => $id_product,
            'user_id' => $id_user,
            'comment' => $request->comment
        ]);
        return response($comment);
    }
    public function remove($id){
        $id = comment::find($id);
        $id->delete();
        return response('done');
    }
}
