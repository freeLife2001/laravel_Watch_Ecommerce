<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));

    }

    public function create()
    {
        return view('backend.users.create');
    }

    public function insert(UsersCreateRequest $request)
    {
        $name = ucwords($request->name);
        $email = $request->email;
        $pass = $request->pass;
        $phone = $request->phone;
        $address = $request->address;
        $role_id = $request->role_id;
        User::create([
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'phone' => $phone,
            'password' => bcrypt($pass),
            'role_id' => $role_id
        ]);
        session()->flash('success', 'Tạo thành công !');
        return redirect()->route('users.index');
    }

    public function view($id)
    {
        $users = User::find($id);
        return view('backend.users.view', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('backend.users.edit', compact('users'));
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->address = $request->address;
        $users->role_id = $request->role_id;
        if ($users->save()) {
            session()->flash('success', 'Cập nhật thành công !');
            return redirect()->route('users.index');
        } else {
            session()->flash('error', 'Cập nhật thất bại !');
            return back();
        }

    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect()->route('users.index');
    }

}
