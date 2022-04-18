<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function brand(){
        return $this->belongsTo("App\Brand", 'brand_id');
    }
}
