<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\Post;
use App\User;
use DB;
use Auth;

class AdminPostsController extends Controller
{
    public function index()
    {
        $data = Post::join('users', 'users.id', 'post.user_id')->select('post.*', 'users.name as user_create')->get();
        return view('backend.posts.index', compact('data'));

    }

    public function create()
    {
        return view('backend.posts.create');
    }

    public function insert(PostsCreateRequest $request)
    {
        $name = ucwords($request->name);
        $avatar = $request->avatar;
        $summary = $request->summary;
        $body = $request->body;
        $user_id = Auth::user()->id;
        Post::create([
            'name' => $name,
            'avatar' => $avatar,
            'summary' => $summary,
            'body' => $body,
            'user_id' => $user_id
        ]);
        session()->flash('success', 'Tạo thành công !');
        return redirect()->route('posts.index');
    }

    public function view($id)
    {
        $data = Post::join('users', 'users.id', 'post.user_id')->select('post.*', 'users.name as user_create')->find($id);
        return view('backend.posts.view', compact('data'));
    }

    public function edit($id)
    {
        $data = Post::join('users', 'users.id', 'post.user_id')->select('post.*', 'users.name as user_create')->find($id);
        return view('backend.posts.edit', compact('data'));
    }

    public function update(PostsCreateRequest $request, $id)
    {
        $user_id = Auth::user()->id;
        $data = Post::find($id);
        $data->name = $request->name;
        $data->avatar = $request->avatar;
        $data->summary = $request->summary;
        $data->body = $request->body;
        $data->user_id = $user_id;
        if ($data->save()) {
            session()->flash('success', 'Sửa thành công !');
            return redirect()->route('posts.index');
        } else {
            session()->flash('error', 'Sửa thất bại !');
            return back();
        }

    }

    public function delete($id)
    {
        $data = Post::find($id);
        $data->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect()->route('posts.index');
    }

}
