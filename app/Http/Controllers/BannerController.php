<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Cách 1: Lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
        // $data = Banner::latest()->paginate(10);

        //Cách 3: Lấy dữ và phân trang - mỗi trang 10 bản ghi
//        $data = Banner::paginate(10);
//        Kiểm tra dữ liệu
//        dd($data);
        //Cách 2: Lấy toàn bộ dữ liệu
        $data = Banner::all();
        return view('backend.banner.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max_position = Banner::max('position');

        return view('backend.banner.create',[
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
        //step1: validate du lieu
        $request->validate(
            [
                'title' => 'required|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
            ],
            [
                'title.required' => 'Bạn cần phải nhập vào tiêu đề',
                'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            ]

        );
        //step2: Khoi tao modal va gan gia tri form cho nhung thuoc tinh cua đối tuong (cot trong CSDL)
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title')); //slug

        if($request->hasFile('image')){ // Kiem tra xem co image duoc chon khong
            //get File
            $file = $request->file('image');
            // Dat ten cho file image
            $filename = time().'_'.$file->getClientOriginalName();  //$file->getClientOriginalName() == ten anh
            //Dinh nghia duong dan se upload file len
            $path_upload = 'upload/banner/';  //upload/brand; upload/vendor
            // Thuc hien upload file
            $file->move($path_upload,$filename);
            // Luu lai ten
            $banner->image = $path_upload.$filename;

        }
        // url
        $banner->url = $request->input('url');
        // target
        $banner->target = $request->input('target');
        // Loai
        $banner->type = $request->input('type');
        //Trang thai
        $is_active = 0;
        if($request->has('is_active')){ //Kiem tra xem is_active co ton tai khong
            $is_active = $request->input('is_active');
        }
        //Trang thai
        $banner->is_active = $is_active;
        //Vi tri
        $position=0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $banner->position = $position;
        //Mo ta

        $banner->description = $request->input('description');
        //Luu

        $banner->save();

        //Chuyen huong ve trang danh sach
        return redirect()->route('admin.banner.index');
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
//        dd($id);
//      Cách 1: Lấy chi tiết banner theo id
//      $banner = Banner::find($id);
        //Cách 2: Trả về dữ liệu banner (object), nếu không trả về lỗi
        $banner = Banner::findorFail($id);
        return view('backend.banner.edit', [
            'data' => $banner
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ],[
            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);


        $banner = Banner::findorFail($id);
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));

        if($request->hasFile('new_image')) { // Kiểm tra xem có ảnh mới được chọn không
            //Hàm xóa file ảnh cũ
            @unlink(public_path($banner->image)); // Hàm unlink là của PHP không phải của Laravel,
            // thêm @ vào có tác dụng bỏ qua lỗi cho dù có bị lỗi cũng bỏ qua và chạy tiếp dòng code tiếp theo
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName();
            //Đường dẫn
            $path_upload = 'upload/banner/';
            //upload
            $file->move($path_upload,$filename);

            $banner->image = $path_upload.$filename; // gán giá trị của ảnh mới cho thuộc tính image của đối tượng
        }

        $banner->url = $request->input('url');
        $banner->target = $request->input('target');
        $banner->type = $request->input('type');

        $is_active = 0;
        if($request->has('is_active')){ // Kiểm tra is_active tồn tại
            $is_active = $request->input('is_active');
        }
        $banner->is_active = $is_active;

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $banner->position = $position;

        $banner->description = $request->input('description');
        // Lưu thông tin thay đổi
        $banner->save();

        return redirect()->route('banner.index');
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
        $isDelete = Banner::destroy($id);

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

