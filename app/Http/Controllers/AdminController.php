<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminView(){
        if (!empty(Auth::user()->isAdmin))
        {
            $posts = Posts::all();
            return view('admin.admin', compact('posts'));
        }elseif(!Auth::user() || Auth::user()->isAdmin != 1){
            return redirect('lk');
        }
    }

    public function adminPost(Request $request){

    }
}
