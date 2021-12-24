<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function addPostView()
    {
        if (Auth::user()) {
            return view('post.addPost');
        } else {
            return redirect('lk');
        }
    }

    public function addPostPost(Request $request)
    {
        $request->validate(
            [
                'header' => 'required',
                'body' => 'required',
                'image' => 'required|file|mimes:jpg,png,bmp,jpeg|max:10240',
            ]
        );
        $user = User::find($request->user);
        $image_name = explode('/', $request->file('image')->store('public'))[1];
        $data = [
            'image' => $image_name,
            'user_id' => $user->id,
        ];
        $data += $request->only('header', 'body');
        Posts::create($data);
        return response(['response'], 201);
    }


    public function deletePost($id)
    {
        if (Auth::user()) {
            $posts = Posts::find($id);
            if ($posts && ($posts->user_id == Auth::user()->id || Auth::user()->isAdmin == 1)) {
                $posts->delete();
                return redirect('/');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function editPostView($id)
    {
        if (Auth::user()) {
            $post = Posts::find($id);
            return view('post.editPost', compact('post'));
        } else {
            return redirect('lk');
        }
    }

    public function editPostPost(Request $request, $id)
    {
        $post = Posts::find($id);
        $request->validate(
            [
                'header' => 'required',
                'body' => 'required',
                'status' => 'required',
                'image' => 'file|mimes:jpg,png,bmp,jpeg|max:10240',
            ]
        );
        if ($request->file('image')) {
            $image_name = explode('/', $request->file('image')->store('public'))[1];
            $data = [
                'image' => $image_name,
                'user_id' => Auth::user()->id,
            ];
            $data += $request->only('header', 'body', 'status');
            $post->update($data);
            return redirect('/');
        } else {
            $image_name = $post->image;
            $data = [
                'image' => $image_name,
                'user_id' => Auth::user()->id,
            ];
            $data += $request->only('header', 'body', 'status');
            $post->update($data);
            return redirect('/');
        }

    }

    public function getPosts(Request $request)
    {
        return Posts::all()->where('user_id', Auth::user()->id);
    }
}
