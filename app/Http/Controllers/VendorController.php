<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vendor::all();
        return view('backend.vendor.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max_position = Vendor::max('position');

        return view('backend_old.vendor.create',[
            'max_position' => $max_position
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên nhà cung cấp.',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name'));
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/vendor/';
            $file->move($path_upload,$file_name);
            $vendor->image = $path_upload.$file_name;
        }

        $vendor->website = $request->input('website');
        $vendor->address = $request->input('address');

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position = $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $vendor->is_active = $is_active;

        $vendor->save();

        return redirect()->route('admin.vendor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findorfail($id);
        return view('backend.vendor.edit',[
           'data' => $vendor
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên nhà cung cấp.',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $vendor = Vendor::findorFail($id);
        $vendor->name = $request->input('name');
        $vendor->email = $request->input('email');
        $vendor->phone = $request->input('phone');

        if($request->hasFile('new_image')){
            @unlink(public_path($vendor->image));
            $file = $request->file('new_image');
            $file_name = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/vendor/';
            $file->move($path_upload,$file_name);
            $vendor->image = $path_upload.$file_name;
        }

        $vendor->website = $request->input('website');
        $vendor->address = $request->input('address');

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position = $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $vendor->is_active = $is_active;

        $vendor->save();

        return redirect()->route('admin.vendor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        // DELETE FROM ten_bang WHERE id = 33 -> execute command
        $isDelete = Vendor::destroy($id);

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
