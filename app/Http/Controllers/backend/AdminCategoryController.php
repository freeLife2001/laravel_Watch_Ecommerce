<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use DB;
use Auth;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('backend.category.index', compact('category'));

    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function insert(CategoryRequest $request)
    {
        $input = $request->all();
        Category::create($input);
        session()->flash('success', 'Tạo thành công !');
        return redirect()->route('category.index');
    }

    public function view($id)
    {
        $category = Category::find($id);
        return view('backend.category.view', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->type = $request->type;
        $category->save();
        if ($category) {
            session()->flash('success', 'cập nhật thành công !');
            return redirect()->route('category.index');
        } else {
            session()->flash('error', 'cập nhật thất bại !');
            return back();
        }

    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('success', 'Xóa thành công !');
        return redirect()->route('category.index');
    }

}
