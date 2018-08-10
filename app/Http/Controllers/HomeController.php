<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // Trang chủ
    public function index()

    {

        $new = Product::orderBy('id', 'desc')->take(10)->get();

        //giảm giá
        $discount_big = Product::orderBy('id', 'desc')->where('price_discount', '>', 0)->first();
        $discount = Product::orderBy('id', 'desc')->where('price_discount', '>', 0)->skip(1)->take(4)->get();

        //bán chạy
        $best_sell = Product::orderBy('sold', 'desc')->get();

        //tag
        $tags = Tag::all();
        $images = Product::select('avatar')->orderBy('id', 'desc')->take(count($tags))->get();

        $image_list = [];
        foreach ($images as $item) {
            $image_list[] = $item['avatar'];
        }
        foreach ($tags as $key => $item) {
            $k = array_rand($image_list);
            $v = $image_list[$k];

            $total_product = ProductTag::where('tag_id', $item['id'])->count();
            if ($total_product > 0) {
                $tag_list[$key]['name'] = $item['name'];
                $tag_list[$key]['total_product'] = $total_product;
                $tag_list[$key]['avatar'] = $v;
            }

        }
        //post
        $posts = Post::join('users', 'users.id', 'post.user_id')->select('post.*', 'users.name as user_create')->orderBy('id', 'desc')->take(3)->get();
        return view('frontend.home.index', compact('new', 'discount', 'discount_big', 'best_sell', 'tag_list', 'posts'));
    }


    // tìm kiếm
    public function search(Request $request)
    {
        $key_word = $request->key_word;
        if (strlen($key_word) == 0) {
            return back();
        } else {
            $product_list = Product::where('name', 'like', '%' . $key_word . '%')->paginate(6);
            return view('frontend.home.search', compact('product_list'));
        }
    }


    // chi tiết sản phẩm
    public function view($id, $slug, Request $request)
    {
        $product = Product::find($id);
        $category_list = Category::join('product_category', 'product_category.category_id', 'category.id')
            ->where('product_category.product_id', $id)
            ->select('category.name', 'category.id')
            ->get()
            ;
        $tag_list = Tag::join('product_tag', 'product_tag.tag_id', 'tag.id')
            ->where('product_tag.product_id', $id)
            ->select('tag.id', 'tag.name')
            ->get()
            ;
        return view('frontend.home.view', compact('product', 'category_list', 'tag_list'));
    }


    // danh sách sản phẩm theo chuyên mục
    public function productByCategory($id, $slug, Request $request)
    {
        $product_list = Product::join('product_category', 'product_category.product_id', 'product.id')
            ->orderBy('product.id', 'desc')
            ->where('category_id', $id)
            ->paginate(8);
        return view('frontend.home.search', compact('product_list'));
    }


    // hiển thị trang danh sách bài viết
    public function blog()
    {
        $product_list = Post::join('users', 'users.id', 'post.user_id')
            ->select('post.*', 'users.name as user_create')
            ->paginate(6);
        return view('frontend.home.post', compact('product_list'));
    }


    // trang chi tiết bài viết
    public function postView($id)
    {
        $data = Post::join('users', 'users.id', 'post.user_id')->select('post.*', 'users.name as user_create')->find($id);
        $post_list = Post::join('users', 'users.id', 'post.user_id')
            ->select('post.*', 'users.name as user_create')
            ->orderBy('id', 'desc')
            ->take(5)
            ->get()
            ;
        return view('frontend.posts.view', compact('data', 'post_list'));
    }
}
