<?php

namespace App\Http\Controllers;

use App\Article;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_count=Product::count();
        $order_count=Order::count();
        $customer_count=User::count();
        $article_count=Article::count();
//        $data = Product::all();
//        $countProduct = Product::count();
//        dd($countProduct);
        $data = Product::latest()->paginate(10);    // Lấy dữ liệu phân trang
        $users = User::all();
        $orders = Order::latest()->paginate(5);
        $data1 = [
            'product_count'=>$product_count,
            'order_count'=>$order_count,
            'customer_count'=>$customer_count,
            'article_count'=>$article_count,
            'data'=>$data,
            'users'=>$users,
            'orders'=>$orders
        ];
        return view('backend.dashboard.index', $data1);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
