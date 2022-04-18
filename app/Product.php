<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class Product extends Model
{
    use ElasticquentTrait;

    protected $mappingProperties = array(
        'name' => array(
            'type' => 'string',
            'analyzer' => 'standard'
        )
    );

    // định nghĩa quan hệ giữa bảng danh muc- sản phảm
    // một sản phẩm  thuộc về 1 danh mục
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
