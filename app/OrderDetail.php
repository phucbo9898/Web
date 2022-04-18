<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_detail"; // chi dinh ten CSDL

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\Order', 'id', 'order_id');
    }
}
