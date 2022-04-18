<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('backend.article.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        // Lấy danh mục tin tức : ĐK type = 2
        $categories = Category::where(['type' => 2])->get();
        $max_position = Article::max('position');

        return view('backend.article.create',[
            'max_position' => $max_position,
            'users' => $users,
            'categories' => $categories
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
            'title' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'summary' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'summary.required' => 'Bạn cần phải nhập vào mô tả vắn tắt',
            'description.required' => 'Bạn cần phải nhập vào mô tả chi tiết',
        ]);

        $article = new Article();
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->user_id = $request->input('user_id');
        $article->category_id = $request->input('category_id');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/article/';
            $file->move($path_upload,$filename);
            $article->image = $path_upload.$filename;
        }

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->type = $request->input('type');

        $position = 0;
        if ($request->has('position')){
            $position = $request->input('position');
        }
        $article->position = $position;

        $is_active = 0;
        if ($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $article->is_active = $is_active;


        $article->url = $request->input('url');

        $article->save();

         return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findorFail($id);
        return view('backend.article.show', ['data' => $article ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where(['type' => 2])->get();
        $article = Article::findorFail($id);

        return view('backend.article.edit',[
           'data' => $article,
            'categories' => $categories
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'summary' => 'required',
            'description' => 'required',
        ],[
            'title.required' => 'Bạn cần phải nhập vào tiêu đề',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
            'summary.required' => 'Bạn cần phải nhập vào mô tả vắn tắt',
            'description.required' => 'Bạn cần phải nhập vào mô tả chi tiết',
        ]);

        $article = Article::findorFail($id);
        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));
        $article->user_id = $request->input('user_id');
        $article->category_id = $request->input('category_id');

        if($request->hasFile('new_image')){
            @unlink(public_path($article->image));
            $file = $request->file('new_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path_upload = 'upload/article/';
            $file->move($path_upload,$filename);
            $article->image = $path_upload.$filename;
        }

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->type = $request->input('type');

        $position = 0;
        if($request->has('position')){
            $position = $request->input('position');
        }
        $article->position = $position;

        $is_active = 0;
        if($request->has('is_active')){
            $is_active = $request->input('is_active');
        }
        $article->is_active = $is_active;

        $article->url = $request->input('url');

        $article->save();

        return redirect()->route('admin.article.index');
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
        $isDelete = Article::destroy($id);

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
