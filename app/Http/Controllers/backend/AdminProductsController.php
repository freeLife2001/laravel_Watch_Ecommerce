<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\Product;
use DB;
use Auth;
use Illuminate\Http\Request;

class AdminProductsController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('backend.products.index', compact('data'));
    }

    public function create()
    {
        $tags_db = Tag::select('id', 'name')->get()->toArray();
        foreach ($tags_db as $key => $item) {
            $tags[$item['id']] = $item['name'];
        }
        $category_db = Category::select('id', 'name')->get()->toArray();
        foreach ($category_db as $key => $item) {
            $category[$item['id']] = $item['name'];
        }
        return view('backend.products.create', compact('tags', 'category'));
    }

    public function insert(ProductCreateRequest $request)
    {
        $category = $request->category;
        if ($category != '') {
            $category_list = explode(',', $category);
        } else {
            session()->flash('error', 'Chưa chọn chuyên mục !');
            return back();
        }
        $tag = $request->tag;
        if ($tag != '') {
            $tag_list = explode(',', $tag);
        }
        $name = ucwords($request->name);
        $avatar = $request->avatar;
        $price = $request->price;
        $price_discount = $request->price_discount;
        $total = $request->total;
        $content = $request->contents;
        $product = Product::create([
            'name' => $name,
            'avatar' => $avatar,
            'total' => $total,
            'price' => $price,
            'price_discount' => $price_discount,
            'contents' => $content
        ]);
        if ($product) {
            //thêm vào bảng product_category
            foreach ($category_list as $item) {
                $category_info = Category::select('id')->where('name', $item)->first()->toArray();
                if (!empty($category_info)) {
                    $category_id = $category_info['id'];
                } else {
                    $category_info = Category::create(['name' => $item, 'type' => '0']);
                    if ($category_info) {
                        $category_id = $category_info->id;
                    }
                }
                ProductCategory::create([
                    'category_id' => $category_id,
                    'product_id' => $product->id
                ]);
            }
            //thêm vào bảng product_tag
            if (!empty($tag_list)) {
                foreach ($tag_list as $item) {
                    $tag_info = Tag::select('id')->where('name', $item)->first()->toArray();
                    if (!empty($tag_info)) {
                        $tag_id = $tag_info['id'];
                    } else {
                        $tag_info = Tag::create(['name' => $item, 'type' => '0']);
                        if ($tag_info) {
                            $tag_id = $tag_info->id;
                        }
                    }
                    ProductTag::create([
                        'tag_id' => $tag_id,
                        'product_id' => $product->id
                    ]);
                }
            }

        }
        session()->flash('success', 'Tạo thành công !');
        return redirect()->route('products.index');
    }

    public function view($id)
    {
        $data = Product::find($id);
        $category_db = ProductCategory::join('category', 'category.id', 'product_category.category_id')->where('product_category.product_id', $id)->get(['name'])->toArray();
        foreach ($category_db as $key => $item) {
            $category[$key] = $item['name'];
        }
        $category_list = '';
        if (!empty($category)) {
            $category_list = implode(',', $category);
        }
        $tag = ProductTag::join('tag', 'tag.id', 'product_tag.tag_id')->where('product_id', $id)->get()->toArray();
        $tag_list = '';
        if (!empty($tag)) {
            $tag_list = implode(',', $tag);
        }
        return view('backend.products.view', compact('data', 'category_list', 'tag_list'));
    }

    public function edit($id)
    {
        //category
        //lấy toàn bộ category trong db ra
        $category_list_db = Category::select('id', 'name')->get()->toArray();
        foreach ($category_list_db as $key => $item) {
            $category[$item['id']] = $item['name'];
        }
        //lấy ra category đã gán
        $category_used_db = ProductCategory::join('category', 'category.id', 'product_category.category_id')->where('product_category.product_id', $id)->get(['name'])->toArray();
        foreach ($category_used_db as $key => $item) {
            $category_used[$key] = $item['name'];
        }
        $category_used_list = '';
        if (!empty($category_used)) {
            $category_used_list = implode(',', $category_used);
        }
        //tag
        $tag_list_db = Tag::select('id', 'name')->get()->toArray();
        foreach ($tag_list_db as $key => $item) {
            $tag[$item['id']] = $item['name'];
        }
        $tag_used_db = ProductTag::join('tag', 'tag.id', 'product_tag.tag_id')->where('product_id', $id)->get()->toArray();
        foreach ($tag_used_db as $key => $item) {
            $tag_used[$item['id']] = $item['name'];
        }
        $tag_used_list = '';
        if (!empty($tag_used)) {
            $tag_used_list = implode(',', $tag_used);
        }
        //dữ liệu sản phẩm
        $data = Product::find($id);
        return view('backend.products.edit', compact('data', 'category', 'category_used_list', 'tag', 'tag_used_list'));
    }

    public function update(Request $request, $id)
    {
        if (strlen($request->name) == 0) {
            session()->flash('error', 'Tên sản phẩm không được để trống !');
            return back();
        }
        $category = $request->category;
        if ($category != '') {
            $category_list = explode(',', $category);
        } else {
            session()->flash('error', 'Chưa chọn chuyên mục !');
            return back();
        }
        $data = Product::find($id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->price_discount = $request->price_discount;
        $data->total = $request->total;
        $data->contents = $request->contents;
        $data->avatar = $request->avatar;
//        dd($data);
        if ($data->save()) {
            $category_delete = ProductCategory::where('product_id', $id)->delete();
            if ($category_delete) {
                foreach ($category_list as $item) {
                    $category_info = Category::select('id')->where('name', $item)->first()->toArray();
                    if (!empty($category_info)) {
                        $category_id = $category_info['id'];
                    } else {
                        $category_info = Category::create(['name' => $item, 'type' => '0']);
                        if ($category_info) {
                            $category_id = $category_info->id;
                        }
                    }
                    ProductCategory::create([
                        'category_id' => $category_id,
                        'product_id' => $id
                    ]);
                }
            }
            $tag_delete = ProductTag::where('product_id', $id)->delete();
            if ($tag_delete) {
                $tag = $request->tag;
                if (strlen($tag) > 0) {
                    $tag_list = explode(',', $tag);
                    if (!empty($tag_list)) {
                        foreach ($tag_list as $item) {
                            $tag_info = Tag::select('id')->where('name', $item)->first()->toArray();
                            if (!empty($tag_info)) {
                                $tag_id = $tag_info['id'];
                            } else {
                                $tag_info = Tag::create(['name' => $item, 'type' => '0']);
                                if ($tag_info) {
                                    $tag_id = $tag_info->id;
                                }
                            }
                            ProductTag::create([
                                'tag_id' => $tag_id,
                                'product_id' => $id
                            ]);
                        }
                    }
                }
            }
        }
        session()->flash('success', 'Cập nhật thành công !');
        return back();
    }

    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect()->route('products.index');
    }

}
