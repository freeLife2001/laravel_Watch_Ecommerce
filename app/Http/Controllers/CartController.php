<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductBill;
use App\Models\Bill;
use Illuminate\Http\Request;
use Cart, Session, Auth,DB;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    // trang giỏ hàng
    public function cart()
    {
        $data = Cart::content();
        return view('frontend.cart.cart', compact('data'));
    }


    // thêm sản phẩm vào giỏ hàng
    public function create(Request $request)
    {
        $id = $request->product_id;
//       dd($id);
        $product_info = Product::find($id);
        //       dd($product_info);
        if (empty($product_info)) {
            return back()->with('error', 'Sản phẩm không tồn tại');
        }
        if ($product_info['id'] == 0) {
            $price = $product_info['price'];
        } else {
            $price = $product_info['price_discount'];
        }
        $option = [
            'avatar' => $product_info['avatar'],
            'price' => $product_info['price'],
            'total' => $product_info['total']
        ];

        $cart = Cart::add($product_info['id'], $product_info['name'], 1, $price, $option);
        if ($cart) {
            $data = Cart::content();
            Session::put('total', $data);
            return back()->with('success', 'Thêm vào giỏ thành công');
        } else {
            return back()->with('error', 'Thêm vào giỏ thất bại');
        }

    }


    // cập nhật số lượng sản phẩm trong giỏ hàng
    public function update($id, $total)
    {
        Cart::update($id, $total);
        $data = Cart::content();
        Session::put('total', $data);
        return back()->with('success', 'Cập nhật giỏ thành công');
    }


    // xóa 1 sản phẩm trong giỏ hàng
    public function delete($id)
    {
        Cart::remove($id);
        $data = Cart::content();
        Session::put('total', $data);
        return back()->with('success', 'Xóa khỏi giỏ thành công');
    }


    // xóa tất cả sản phẩm trong giỏ hàng
    public function destroy()
    {
        Cart::destroy();
    }


    // tạo đơn hàng
    public function createBill(Request $request)
    {
        $bill = json_decode($request->bill);
        $total = $request->total;
        $price = $request->price;

        if (Auth::user()) {
            $user_buy = Auth::user()->name;
            $user_info = Auth::user()->id;
        } else {
            $user_buy = 'Khách lẻ' . rand();
            $user_info = null;
        }

        $i = 0;
        foreach ($bill as $item) {
            $i++;
            $list_product[$item->total] = $item->id;

        }
        DB::beginTransaction();

        try {
            $name = $user_buy . '-' . date('d/m/Y H:i:s');
            $bill_create = new Bill;
            $bill_create->name = $name;
            $bill_create->total = $total;
            $bill_create->price = $price;
            $bill_create->product_list = json_encode($list_product);
            $bill_create->user_info = $user_info;
            $bill_create->save();

            foreach ($bill as $item) {
                $product = Product::find($item->id);
                if ($product['price_discount']<=0){
                    $price=$product['price'];
                }else{
                    $price=$product['price_discount'];
                }

                if ($product) {
                    $end = $product['total'] - $item->total;
                    if ($end >= 0) {
                        $product->total = $end;
                        $product->sold = $item->total;
                        if ($product->save()){
                            ProductBill::create([
                                'total'=>$item->total,
                                'product_id'=>$item->id,
                                'bill_id'=>$bill_create->id,
                                'value'=>$item->total*$price
                            ]);
                        }
                    }
                }
            }

            // lưu đơn hàng xong thì xóa hết sản phẩm
            $this->destroy();
            Session::put('total', '0');
            DB::commit();
            // all good
        } catch (\Exception $e) {
            return back()->with('error', 'Tạo đơn hàng thất bại');
            DB::rollback();
        }


        return back()->with('success', 'Tạo đơn hàng thành công');
    }

}
