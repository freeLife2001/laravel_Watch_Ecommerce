<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Bill;
use App\User;
use DB;
use Auth;

class AdminBillController extends Controller
{
    public function index()
    {

        if (Auth::user()->role_id == 1) {
            $bill = Bill::join('users', 'users.id', 'bill.user_info')
                ->select('bill.*', 'users.name as buyer', 'users.email', 'users.phone')
                ->get();
        } else {
            $user_id = Auth::user()->id;
            $bill = Bill::join('users', 'users.id', 'bill.user_info')
                ->where('user_info', $user_id)
                ->select('bill.*', 'users.name as buyer', 'users.email', 'users.phone')
                ->get();
        }
        return view('backend.bills.index', compact('bill'));

    }

    public function create()
    {
        return view('backend.bills.create');
    }

    public function getBill($id)
    {
        $bill = Bill::join('users', 'users.id', 'bill.user_info')
            ->select('bill.*', 'users.name as buyer', 'users.email', 'users.phone', 'users.address')
            ->find($id);
        return $bill;
    }

    public function getProductBill($product_list)
    {
        $products = json_decode($product_list);
        $i = 0;
        $product_list = [];
        foreach ($products as $item) {
            $i++;
            $product_info = Product::find($item);
            $product_list[$i]['id'] = $product_info['id'];
            $product_list[$i]['name'] = $product_info['name'];
            $product_list[$i]['avatar'] = $product_info['avatar'];
            $product_list[$i]['price'] = $product_info['price'];
            $product_list[$i]['price_discount'] = $product_info['price_discount'];
        }
        return $product_list;
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
        $bill = $this->getBill($id);
        $product_list = $this->getProductBill($bill->product_list);
        return view('backend.bills.view', compact('bill', 'product_list'));
    }

    public function edit($id)
    {
        $bill = $this->getBill($id);
        $product_list = $this->getProductBill($bill->product_list);
        return view('backend.bills.edit', compact('bill', 'product_list'));
    }

    public function update(UsersUpdateRequest $request, $id)
    {
        dd($request->all());
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();
        session()->flash('edit', 'thành công !');
        return back();
    }

    public function delete($id)
    {
        $users = User::find($id);
        $users->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect()->route('users.index');
    }

}
