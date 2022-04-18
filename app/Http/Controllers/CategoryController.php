<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

        return view('backend.category.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 1. lấy toàn bộ dữ danh mục
        $data = Category::all();

        return view('backend.category.create',[
            'data' => $data,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên danh mục.',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $category = new Category();

        $category->name = $request->input('name'); // Bạn cần phải nhập
        $category->slug = Str::slug($request->input('name')); // ban-can-phai-nhap

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/category/';
            $file->move($path_upload,$filename);

            $category->image = $path_upload.$filename;
        }

        $category->parent_id = $request->input('parent_id');
        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $category->position = $position;

        $category->type = $request->input('type');

        $category->save();

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //        echo 'Trang show';
        $category = Category::findorFail($id);
        return  view('backend.category.show', ['data' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::all();
        $category = Category::findorFail($id);
        return view('backend.category.edit',[
            'data' => $category,
            'category' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên danh mục.',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $category = Category::findorFail($id);
        $category->parent_id = $request->input('parent_id');
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));

        if($request->hasFile('new_image')){
            @unlink(public_path($category->image));
            $file = $request->file('new_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/category/';
            $file->move($path_upload,$filename);
            $category->image = $path_upload.$filename;
        }

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $category->position  = $position;

        $category->type = $request->input('type');
        $category->save();

        return  redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Category::destroy($id);

        if ($isDelete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json([
            'isSuccess' => $isSuccess
        ], $statusCode);
    }
}
