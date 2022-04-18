<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function parent(){
        return $this->belongsTo("App\Category", 'parent_id');
    }

    // Định nghĩa quan hệ -  1 danh mục có nhiều sản phẩm
    public function products()
    {
        return $this->hasMany('App\Product');
    }


    public function articles(){
        return $this->hasMany('App\Article');
    }
}
